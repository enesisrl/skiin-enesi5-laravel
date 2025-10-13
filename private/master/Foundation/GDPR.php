<?php

namespace Master\Foundation;

use Enesisrl\RestServices\Response;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GDPR extends \Enesisrl\RestServices\Client
{
    protected array $config;
    public string $projectUid;
    public string $username;
    private string $password;
    public string $appURL;
    private string $tokenDirectory;

    /**
     * Costruttore della classe.
     *
     * Inizializza la configurazione necessaria verificando la presenza di parametri richiesti
     * come username, password, directory dei token, Project UID e URL dell'applicazione.
     * Se uno dei parametri richiesti non è configurato, viene sollevata un'eccezione.
     *
     * @return void
     * @throws Exception Se uno dei parametri richiesti non è configurato.
     */
    public function __construct()
    {
        parent::__construct();

        $this->initializeDebugMode();
        $this->validateConfiguration();
        $this->loadConfiguration();
        $this->ensureTokenDirectoryExists();
    }

    /**
     * Inizializza la modalità debug se configurata.
     *
     * @return void
     */
    private function initializeDebugMode(): void
    {
        if (config('gdpr.rest_ene_si_api_debug')) {
            $this->setDebug(true);
        }
    }

    /**
     * Valida che tutti i parametri di configurazione richiesti siano presenti.
     *
     * @return void
     * @throws Exception Se uno dei parametri richiesti non è configurato.
     */
    private function validateConfiguration(): void
    {
        $requiredConfigs = [
            'username' => 'Username not set',
            'password' => 'Password not set',
            'rest_ene_si_tokens_directory' => 'Tokens directory not set',
            'projectUid' => 'Project UID not set',
            'appURL' => 'App URL not set'
        ];

        foreach ($requiredConfigs as $configKey => $errorMessage) {
            if (!config("gdpr.{$configKey}")) {
                throw new Exception($errorMessage);
            }
        }
    }

    /**
     * Carica la configurazione nelle proprietà della classe.
     *
     * @return void
     */
    private function loadConfiguration(): void
    {
        $this->projectUid = config('gdpr.projectUid');
        $this->username = config('gdpr.username');
        $this->password = config('gdpr.password');
        $this->appURL = config('gdpr.appURL');
        $this->tokenDirectory = public_path(rtrim(config('gdpr.rest_ene_si_tokens_directory'), "/"));
    }

    /**
     * Verifica l'esistenza della directory dei token e la crea se necessario.
     *
     * @return void
     * @throws Exception Se non è possibile creare la directory.
     */
    private function ensureTokenDirectoryExists(): void
    {
        if (!is_dir($this->tokenDirectory)) {
            if (!mkdir($this->tokenDirectory, 0755, true) && !is_dir($this->tokenDirectory)) {
                throw new Exception("Impossibile creare la directory dei token: {$this->tokenDirectory}");
            }
            $this->log("Directory dei token creata: {$this->tokenDirectory}", 'info');
        }
    }

    /**
     * Autentica un utente utilizzando le credenziali e gestisce il token necessario per l'accesso.
     *
     * Se il token non esiste o non è valido,
     * effettua il login e genera un nuovo token, oppure elimina quello scaduto. Salva il token per l'autenticazione futura.
     *
     * @return bool Restituisce true se l'autenticazione è andata a buon fine.
     * @throws Exception Se il login fallisce o il token è scaduto.
     */
    public function auth(): bool
    {
        $tokenFile = $this->getTokenFilePath();

        $token = $this->getExistingToken($tokenFile);

        if (!$token) {
            return $this->performLogin($tokenFile);
        }

        $isValid = false;
        try {
            $isValid = $this->validateExistingToken($token, $tokenFile);
        } catch (Exception $exception) {
            $this->deleteToken();
            return $this->performLogin($tokenFile);
        }

        return $isValid;
    }

    /**
     * Ottiene il percorso del file token per l'utente corrente.
     *
     * @return string Il percorso completo del file token.
     */
    private function getTokenFilePath(): string
    {
        $tokenFileName = Str::slug($this->username, "_");
        return "{$this->tokenDirectory}/{$tokenFileName}";
    }

    /**
     * Recupera il token esistente dal file se presente.
     *
     * @param string $tokenFile Il percorso del file token.
     * @return string|null Il token se presente, null altrimenti.
     */
    private function getExistingToken(string $tokenFile): ?string
    {
        if (!file_exists($tokenFile)) {
            return null;
        }

        $token = file_get_contents($tokenFile);
        return $token ?: null;
    }

    /**
     * Effettua il login e salva il nuovo token.
     *
     * @param string $tokenFile Il percorso del file dove salvare il token.
     * @return bool True se il login è riuscito.
     * @throws Exception Se il login fallisce.
     */
    private function performLogin(string $tokenFile): bool
    {
        $response = $this->login($this->username, $this->password);

        if (!$response->token) {
            throw new Exception('Login fallito: token non ricevuto dal server');
        }

        if (!file_put_contents($tokenFile, $response->token)) {
            throw new Exception("Impossibile salvare il token nel file: {$tokenFile}");
        }

        $this->log("Nuovo token salvato per l'utente: {$this->username}", 'info');
        return true;
    }

    /**
     * Valida il token esistente verificandolo con il server.
     *
     * @param string $token Il token da validare.
     * @param string $tokenFile Il percorso del file token.
     * @return bool True se il token è valido.
     * @throws Exception Se il token è scaduto.
     */
    private function validateExistingToken(string $token, string $tokenFile): bool
    {
        $this->setToken($token);
        $response = $this->get('/api/v2/verify-token');
        if ($response->error) {
            if (unlink($tokenFile)) {
                $this->log("Token scaduto rimosso per l'utente: {$this->username}", 'warning');
            }
            throw new Exception('Token scaduto. È necessario effettuare nuovamente il login.');
        }else{
            $this->log("Token valido per l'utente: {$this->username}", 'success');
        }

        return true;
    }

    /**
     * Registra un messaggio di log nel canale specificato con il livello indicato.
     *
     * In base al tipo di messaggio passato, questo metodo utilizza il livello di log
     * corrispondente per registrare il messaggio nel canale 'gdpr'.
     *
     * @param string $msg Il messaggio da registrare nel log.
     * @param string $type Il livello di log da utilizzare. Può essere uno dei seguenti valori:
     *                     'error', 'debug', 'warning', 'alert', 'critical', 'emergency', 'notice', oppure 'info'.
     *                     Il valore predefinito è 'info'.
     *
     * @return void
     */
    public function log(string $msg, string $type = 'info'): void
    {
        $logger = Log::channel('gdpr');

        $validLogLevels = [
            'error' => fn() => $logger->error($msg),
            'debug' => fn() => $logger->debug($msg),
            'warning' => fn() => $logger->warning($msg),
            'alert' => fn() => $logger->alert($msg),
            'critical' => fn() => $logger->critical($msg),
            'emergency' => fn() => $logger->emergency($msg),
            'notice' => fn() => $logger->notice($msg),
        ];

        if (isset($validLogLevels[$type])) {
            $validLogLevels[$type]();
        } else {
            $logger->info($msg);
        }
    }

    /**
     * Aggiunge un nuovo consenso inviando i dati forniti al server tramite una richiesta POST.
     *
     * Verifica che i dati forniti non siano vuoti, quindi li combina con i dati predefiniti
     * del progetto e invia una richiesta al server. Se la risposta del server non è valida
     * o mancano informazioni importanti come `data` o `consentId`, viene loggato un errore
     * e il metodo ritorna `false`.
     *
     * @param array $data I dati da inviare per la registrazione del consenso.
     * @return mixed L'output del server in caso di successo o `false` in caso di errore.
     * @throws Exception
     */
    public function add(array $data): mixed
    {
        if (empty($data)) {
            $this->log("Add: dati mancanti per la registrazione del consenso", "warning");
            return false;
        }

        $url = "/api/v2/consent-register/add";
        $requestData = $this->prepareConsentData($data);
        $serverOutput = $this->post($url, $requestData);

        if (!$this->isValidConsentResponse($serverOutput)) {
            $this->log("Add: risposta del server non valida\n" . print_r($requestData, true), "error");
            return false;
        }

        return $serverOutput;
    }

    /**
     * Prepara i dati del consenso combinandoli con i dati del progetto.
     *
     * @param array $data I dati forniti dall'utente.
     * @return array I dati completi per la richiesta.
     */
    private function prepareConsentData(array $data): array
    {
        return array_merge_recursive([
            "projectUid" => $this->projectUid,
            "proof" => [
                "url" => $this->appURL,
            ]
        ], $data);
    }

    /**
     * Verifica se la risposta del server per il consenso è valida.
     *
     * @param mixed $serverOutput La risposta del server.
     * @return bool True se la risposta è valida.
     */
    private function isValidConsentResponse(mixed $serverOutput): bool
    {
        return is_object($serverOutput) &&
            (property_exists($serverOutput, 'data') || property_exists($serverOutput, 'consentId'));
    }

    /**
     * Recupera il consenso associato all'ID fornito, interagendo con un endpoint API.
     *
     * @param mixed $consentId Identificativo del consenso da recuperare. Deve essere valido e non vuoto.
     * @return false|Response Restituisce un oggetto di tipo Response se il consenso viene recuperato con successo, altrimenti false in caso di errore o dati non validi.
     * @throws Exception
     */
    public function getConsent(mixed $consentId): false|Response
    {
        if (empty($consentId)) {
            $this->log("Get consent: ID consenso mancante", "warning");
            return false;
        }

        $url = "/api/v2/consent-register/search";
        $data = [
            "id" => $consentId,
            "first" => 1
        ];

        $serverOutput = $this->post($url, $data);

        if (!$this->isValidResponse($serverOutput)) {
            $this->log("Recupero consenso fallito per ID: {$consentId}", "error");
            return false;
        }

        return $serverOutput;
    }

    /**
     * Verifica se la risposta del server è valida.
     *
     * @param mixed $serverOutput La risposta del server.
     * @return bool True se la risposta è valida.
     */
    private function isValidResponse(mixed $serverOutput): bool
    {
        return is_object($serverOutput) && property_exists($serverOutput, 'data');
    }

    /**
     * Revoca il consenso associato ai dati forniti, interagendo con un endpoint API.
     *
     * @param array $data Dati necessari per la richiesta di revoca. Deve contenere almeno le informazioni richieste dall'API.
     * @return bool Restituisce true se la revoca è avvenuta con successo, altrimenti false.
     * @throws Exception
     */
    public function revoke(array $data): bool
    {
        if (empty($data)) {
            $this->log("Revoke: dati mancanti per la revoca del consenso", "warning");
            return false;
        }

        $url = '/api/v2/consent-register/revoke';
        $requestData = $this->prepareRevokeData($data);
        $serverOutput = $this->post($url, $requestData);

        if (!is_object($serverOutput)) {
            $this->log("Revoca fallita: risposta del server non valida", "error");
            return false;
        }

        if ($this->isRevokeSuccessful($serverOutput)) {
            $this->log("Consenso revocato con successo", "info");
            return true;
        }

        $this->log("Revoca fallita\n" . print_r($requestData, true), "error");
        return false;
    }

    /**
     * Prepara i dati per la richiesta di revoca.
     *
     * @param array $data I dati forniti dall'utente.
     * @return array I dati completi per la richiesta di revoca.
     */
    private function prepareRevokeData(array $data): array
    {
        return array_merge_recursive([
            "proof" => [
                "url" => $this->appURL
            ]
        ], $data);
    }

    /**
     * Verifica se la revoca è stata completata con successo.
     *
     * @param object $serverOutput La risposta del server.
     * @return bool True se la revoca è riuscita.
     */
    private function isRevokeSuccessful(object $serverOutput): bool
    {
        return isset($serverOutput->revoked) && $serverOutput->revoked === "1";
    }

    /**
     * Recupera le informazioni relative a un determinato PID, interagendo con un endpoint API.
     *
     * @param mixed $pid Identificativo del PID che deve essere utilizzato per la richiesta. Deve essere fornito e non vuoto.
     * @return false|Response Restituisce i dati ottenuti dalla chiamata API se la richiesta ha successo, altrimenti false.
     * @throws Exception
     */
    public function getInfo(mixed $pid): false|Response
    {
        if (empty($pid)) {
            $this->log("Get info: parametro PID mancante", "warning");
            return false;
        }

        $url = '/api/v2/consent-register/information/get';
        $data = [
            "pid" => $pid
        ];

        $serverOutput = $this->post($url, $data);

        if (!$this->isValidResponse($serverOutput)) {
            $this->log("Recupero informazioni consenso fallito per PID: {$pid}", "error");
            return false;
        }

        return $serverOutput;
    }

    public function deleteToken(){
        $tokenFile = $this->getTokenFilePath();
        $token = $this->getExistingToken($tokenFile);
        if ($token) {
            unlink($tokenFile);
        }
    }

}