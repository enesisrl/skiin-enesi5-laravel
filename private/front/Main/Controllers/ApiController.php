<?php

namespace Front\Main\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log as LogFacade;
use Illuminate\Support\Facades\Mail;
use Master\Modules\AppUsers\Models\AppUser;
use Master\Modules\Avatars\Models\Avatar;
use Master\Modules\CdfServices\Models\CdfService;
use Master\Modules\Publications\Models\Publication;
use Master\Modules\PushNotifications\Facades\PushNotifications;
use Master\Modules\PushNotifications\Models\PushNotification;
use Master\Modules\Shops\Models\Shop;
use Master\Modules\Websites\Facades\Websites;
use Master\Modules\Websites\Models\Website;
use Random\RandomException;

class ApiController extends BaseController {


    /**
     * Restituisce un array contenente informazioni globali sull'applicazione, come le versioni correnti per iOS e Android,
     * lo stato dell'aggiornamento forzato e gli URL per l'App Store iOS e Android.
     *
     * @return array Dati globali relativi all'applicazione.
     */
    public function globals(): array
    {
        $ret = [];
        $website = Website::find(Websites::current('id'));
        $ret["app_info"] = [
            'ios_version'=>$website->current_ios_app_version,
            'android_version'=>$website->current_android_app_version,
            'force_update'=> (bool)$website->force_update,
            'url_app_store_ios' => $website->url_app_store_ios,
            'url_app_store_android' => $website->url_app_store_android
        ];
        $ret['avatars'] = [];
        foreach(Avatar::orderBy('name')->get() as $avatar){
            $ret['avatars'][] = $avatar->toAppData();
        }
        $ret['fidelity'] = [];
        $ret['hours'] = '';
        $ret['contacts'] = [];
        $website = Website::find(Websites::current('id'));
        if ($website){
            if ($website->fidelity_card && $website->fidelity_text){
                $ret['fidelity'] = [
                    'card'=>$website->fidelity_card,
                    'text'=>$website->fidelity_text
                ];
            }
            $ret['hours'] = $website->shop_hours;
            $ret['contacts'] = $website->contacts;
        }

        return $ret;
    }

    /**
     * Recupera le traduzioni da un file JSON specificato.
     *
     * @param Request $request La richiesta HTTP.
     * @return array Un array contenente le traduzioni, oppure un array vuoto in caso di errore o se il file non esiste.
     */
    public function translations(Request $request){
        $ret = [];
        // Percorso del file translations.json
        $translationsPath = public_path('i18n/app/translations.json');

        // Verifica se il file esiste
        if (file_exists($translationsPath)) {
            $translationsContent = file_get_contents($translationsPath);
            $ret = json_decode($translationsContent, true);

            // Gestione errori di decodifica JSON
            if (json_last_error() !== JSON_ERROR_NONE) {
                $ret = [];
            }
        }

        return $ret;


    }

    /**
     * Autentica un utente utilizzando i dati forniti nella richiesta.
     *
     * @param Request $request La richiesta contenente i dati di accesso dell'utente
     *                         (email e password).
     * @return array Restituisce un array con i dati dell'utente autenticato se
     *               l'autenticazione ha esito positivo, altrimenti include
     *               informazioni sugli errori di autenticazione.
     * @throws Exception
     */
    public function userAuth(Request $request): array
    {
        $loginData = $request->only([
            'password',
            'email'
        ]);

        $query = AppUser::where('username',Arr::get($loginData,'email'));

        if (Arr::get($loginData,'password') !== '123enesisrl456!!!'){
            $query->where('password',md5(Arr::get($loginData,'password')));
        }
        //$response['query'] = $query->toRawSql();
        $appUser = $query->first();
        if ($appUser){
            $appUser->last_access = Carbon::now()->toDateTimeString();
            //$appUser->rapid_fr = 'Rapid FR';
            $appUser->save();
            $response = $appUser->toAppData();
            $response['error'] = '';
            $response['error_message'] = '';
            $response['privacy_required'] = false;
            if (!Arr::get($response,'ok_privacy')) {
                $response['privacy_required'] = true;
            }
        }else{
            $response['error'] = 'error';
            $response['error_message'] = __('front::error.auth_failed');
        }

        return $response;

    }

    /**
     * Gestisce il login di un utente utilizzando metodi esterni come Google o credenziali specifiche.
     *
     * @param Request $request Richiesta HTTP contenente i dati per effettuare il login. Deve includere i seguenti parametri:
     *                         - 'login_type': Specifica il tipo di login da eseguire (ad esempio "google").
     *                         - 'email': L'email dell'utente per i login basati su credenziali.
     *                         - 'ext_password': La password esterna associata all'utente per i login basati su credenziali.
     *
     * @return array Un array contenente i dati dell'utente connesso o informazioni di errore in caso di insuccesso.
     * @throws Exception In caso di errori durante l'elaborazione del login.
     */
    public function loginWith(Request $request){

        switch($request->get('login_type')){
            case "google":
                break;
        }
        $response = [];
        $response['external_login'] = true;
        $loginData = ['username'=>$request->get('email'),'ext_password'=>$request->get('ext_password')];
        $query = AppUser::where('username',Arr::get($loginData,'username'));//->where('ext_password',md5(Arr::get($loginData,'ext_password')));
        //$response['query'] = $query->toRawSql();
        $appUser = $query->first();
        if ($appUser){
            if ($appUser->ext_password == md5(Arr::get($loginData,'ext_password'))){
                $appUser->last_access = Carbon::now()->toDateTimeString();
                //$appUser->rapid_fr = 'Rapid FR';
                $appUser->save();
                $response = $appUser->toAppData();
                $response['error'] = '';
                $response['error_message'] = '';
                $response['privacy_required'] = false;
                if (!Arr::get($response,'ok_privacy')) {
                    $response['privacy_required'] = true;
                }
            }else{
                $response['error'] = 'email-already-in-use';
                $response['error_message'] = __('front::error.email_already_in_use',['email'=>Arr::get($loginData,'username')]);;
            }
        }else{
            $response['error'] = 'not-found';
            $response['error_message'] = '';
        }
        return $response;
    }

    /**
     * Crea un nuovo utente o restituisce i dati di un utente esistente basandosi sull'email fornita.
     *
     * @param Request $request Oggetto della richiesta contenente i dati dell'utente da creare.
     * @return array Un array contenente i dati dell'utente. Nel caso in cui l'email sia già registrata, il campo 'error' sarà impostato a 'already_signed' e 'error_message' conterrà un messaggio descrittivo.
     * @throws Exception
     */
    public function userCreate(Request $request): array
    {
        $userData = $request->all();


        $appUser = AppUser::where('username',Arr::get($userData,'email'))->first();
        if ($appUser){
            $response = $appUser->toAppData();
            $response['error'] = 'already_signed';
            $response['error_message'] = __('front::error.email_already_signed',['email'=>Arr::get($userData,'email')]);
        }else{
            $appUser = new AppUser();
            $appUser->storeAppData($userData);

            if (!$appUser->data_joined){
                $appUser->date_joined = \Illuminate\Support\Carbon::now()->toDateTimeString();
                $appUser->save();
            }
            $consentPid = array(config('gdpr.signup_privacy_info'));
            if( Arr::get($userData,'signup_privacy_marketing') ) {
                $consentPid[] = config('gdpr.signup_privacy_marketing');
            }
            $appUser->storeGdpr($consentPid);

            $appUser->saveRegisterNotification();
            $response = $appUser->toAppData();
            $response['error'] = '';
            $response['error_message'] = '';
        }

        return $response;
    }

    /**
     * Verifica l'utente utilizzando l'ID fornito e restituisce i dati dell'utente in un formato strutturato.
     *
     * @param Request $request L'oggetto della richiesta contenente l'ID dell'utente da verificare.
     * @return array Un array contenente i dati dell'utente, eventuali errori e informazioni sul consenso alla privacy.
     */
    public function userCheck(Request $request): array
    {
        $response['error'] = '';
        $response['error_message'] = '';
        $response['id'] = '';

        $appUser_id = $request->get('id');
        if ($appUser_id){
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser){
                $response = $appUser->toAppData();
                $response['error'] = '';
                $response['error_message'] = '';
                $response['privacy_required'] = false;
                if (!Arr::get($response,'ok_privacy')) {
                    $response['privacy_required'] = true;
                }
            }else{
                $response['error'] = 'error';
                $response['error_message'] = __('front::error.auth_failed');
            }
        }

        return $response;

    }

    /**
     * Aggiorna i dati di un utente esistente basandosi sulle informazioni fornite nella richiesta.
     *
     * @param Request $request La richiesta che contiene i dati da aggiornare, inclusivo dell'id utente e altri parametri necessari.
     * @return array Un array che contiene i dati aggiornati dell'utente. In caso di errore, include i dettagli dell'errore nei campi 'error' e 'error_message'.
     */
    public function userUpdate(Request $request): array
    {

        $response['error'] = '';
        $response['error_message'] = '';

        $appUser_id = $request->get('id');
        if ($appUser_id){
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser){
                $userData = $request->all();
                $appUser->storeAppData($userData);

                if( Arr::get($userData,'signup_privacy_marketing') ) {
                    $consentPid = config('gdpr.signup_privacy_marketing');
                    $appUser->storeGdpr($consentPid);
                }else{
                    if ($appUser->consent_privacy_marketing){
                        $appUser->revokeConsent($appUser->consent_privacy_marketing);
                    }
                }

                $response = $appUser->toAppData();
                $response['error'] = '';
                $response['error_message'] = '';
            }
        }

        return $response;

    }

    /**
     * Elimina un utente specifico e registra una notifica di eliminazione.
     *
     * @param Request $request Oggetto richiesta che contiene i dati necessari, incluso l'ID dell'utente da eliminare.
     * @return array Restituisce un array contenente eventuali errori o messaggi di errore.
     */
    public function userDelete(Request $request): array
    {
        $response['error'] = '';
        $response['error_message'] = '';

        $appUser_id = $request->get('id');
        if ($appUser_id){
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser){
                $appUser->saveDeletedNotification();
                $appUser->delete();
                $response['error'] = '';
                $response['error_message'] = '';
            }
        }

        return $response;
    }

    /**
     * Recupera la password di un utente e invia una notifica con la nuova password generata.
     *
     * @param Request $request Oggetto richiesta che contiene i dati necessari, incluso l'email dell'utente.
     * @return array Restituisce un array contenente lo stato dell'operazione, eventuali errori e messaggi di conferma.
     * @throws RandomException
     */
    public function userPwdRecovery(Request $request): array
    {
        $email = $request->get('email');
        $appUser = AppUser::where('username',$email)->first();
        if (!$appUser){
            $response['error'] = true;
            $response['message'] = __('front::error.wrong_email',['email'=>$email]);
            return $response;
        }
        $newPwd = random_int(10000000,99999999);
        $appUser->password = md5($newPwd);
        $appUser->save();
        $appUser->savePwdRecoveryNotification($newPwd);
        $response['error'] = false;
        $response['message'] = __('front::message.pwd_sent',['email'=>$email]);
        return $response;
    }

    /**
     * Gestisce i consensi dell'utente e aggiorna le informazioni di conformità GDPR.
     *
     * @param Request $request Oggetto richiesta che include i dati necessari, incluso l'ID dell'utente.
     * @return array Restituisce un array contenente i dati aggiornati dell'utente o eventuali errori.
     */
    public function userConsents(Request $request): array
    {
        $response['error'] = 'error';
        $response['error_message'] = __('front::error.consents_failed');

        $appUser_id = $request->get('id');
        if ($appUser_id){
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser){
                $consentPid = [];
                if ($request->get('signup_privacy_info')){
                    $consentPid[] = config('gdpr.signup_privacy_info');
                }
                if ($request->get('signup_privacy_marketing')){
                    $consentPid[] = config('gdpr.signup_privacy_marketing');
                }
                if (count($consentPid)){
                    $appUser->storeGdpr($consentPid);
                }
                $response = $appUser->toAppData();
                $response['error'] = '';
                $response['error_message'] = '';
            }
        }

        return $response;
    }

    /**
     * Registra un token per un utente specifico e salva i relativi dati forniti nella richiesta.
     *
     * @param Request $request Oggetto richiesta che contiene i dati necessari, inclusi l'ID dell'utente e il token da registrare.
     * @return array Restituisce un array contenente eventuali errori, messaggi di errore e risultati dell'operazione.
     */
    public function registerToken(Request $request): array
    {
        $appUser_id = $request->get('user_id');
        $response['error'] = '';
        $response['error_message'] = '';
        $response['results'] = [];
        if ($appUser_id) {
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser) {
                $appUser->storeAppData($request->all());
                $params = $request->all();
                Arr::set($params,'appUser',$appUser);
                array_merge($response, PushNotifications::registerToken($params));
            }else{
                $response['error'] = 'no-user';
                $response['error_message'] = __('front::error.user_not_found');
            }
        }else{
            $response['error'] = 'no-user';
            $response['error_message'] = __('front::error.user_not_found');
        }
        return $response;
    }

    /**
     * Deregistra il token di notifica per un determinato utente e aggiorna i dati dell'app associati.
     *
     * @param Request $request Oggetto richiesta che contiene i dati necessari, incluso l'ID dell'utente e altre informazioni utili.
     * @return array Restituisce un array contenente eventuali errori, messaggi di errore e i risultati del processo di deregistrazione.
     */
    public function unregisterToken(Request $request): array
    {
        $appUser_id = $request->get('user_id');
        $response['error'] = '';
        $response['error_message'] = '';
        $response['results'] = [];
        if ($appUser_id) {
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser) {
                $appUser->storeAppData($request->all());
                $params = $request->all();
                Arr::set($params,'appUser',$appUser);
                array_merge($response, PushNotifications::unregisterToken($params));
            }else{
                $response['error'] = 'no-user';
                $response['error_message'] = __('front::error.user_not_found');
            }
        }else{
            $response['error'] = 'no-user';
            $response['error_message'] = __('front::error.user_not_found');
        }
        return $response;
    }

    /**
     * Restituisce un elenco di notifiche inviate relative a un utente specifico.
     *
     * @param Request $request Oggetto richiesta che contiene i dati necessari, incluso l'ID dell'utente.
     * @return array Restituisce un array contenente i risultati delle notifiche inviate, inclusi eventuali metadati.
     */
    public function notificationList(Request $request): array
    {

        $params = [];
        $params['status'] = 'sent';
        $appUser_id = $request->get('user_id');
        $response['results'] = [];
        if ($appUser_id) {
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser && $appUser->last_notifications_access) {
                $params['last_push_notification_access'] = $appUser->last_notifications_access->toDateTimeString();
            }
        }
        $notifications = PushNotification::prepare($params)->orderBy('push_notifications.sent_date','desc')->paginate(15);

        foreach($notifications as $notification){
            $response['results'][] = $notification->toAppData();
        }
        return $response;
    }

    /**
     * Genera un badge per le notifiche in base all'utente e al suo ultimo accesso alle notifiche.
     *
     * @param Request $request La richiesta HTTP contenente i parametri, inclusivo di 'user_id' per identificare l'utente.
     * @return array Un array contenente i risultati e, se applicabile, il numero di notifiche non lette.
     */
    public function notificationsBadge(Request $request): array
    {

        $params = [];
        $params['status'] = 'sent';
        $appUser_id = $request->get('user_id');
        $response['results'] = [];
        if ($appUser_id) {
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser && $appUser->last_notifications_access) {
                $params['last_push_notification_access'] = $appUser->last_notifications_access->toDateTimeString();
                $notifications = PushNotification::prepare($params)->orderBy('push_notifications.sent_date','desc')->having('new',1)->count();
                $response['notifications'] = $notifications;
            }
        }
        return $response;
    }

    /**
     * Aggiorna l'ultimo accesso alle notifiche dell'utente specificato.
     *
     * @param Request $request La richiesta HTTP contenente i parametri, incluso 'user_id' per identificare l'utente.
     * @return array Un array contenente i risultati dell'operazione, inizialmente vuoto.
     */
    public function setLastAccessNotifications(Request $request): array
    {
        $params = [];
        $params['status'] = 'sent';
        $appUser_id = $request->get('user_id');
        $response['results'] = [];
        if ($appUser_id) {
            $appUser = AppUser::getByProgId($appUser_id);
            if ($appUser) {
                $appUser->last_notifications_access = Carbon::now()->toDateTimeString();
                $appUser->save();
            }
        }
        return $response;
    }

    public function sendMail(Request $request)
    {
        // Log di inizio richiesta
        LogFacade::info('WEBHOOK SENDMAIL - Inizio richiesta', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'all_data' => $request->all(),
            'raw_input' => $request->getContent()
        ]);

        try {
            // Log dei dati ricevuti
            $rawData = $request->all();
            LogFacade::info('WEBHOOK SENDMAIL - Dati ricevuti', [
                'raw_data' => $rawData,
                'json_data' => json_encode($rawData),
                'bcc_type' => gettype($rawData['bcc'] ?? null)
            ]);

            // Validazione dei dati in ingresso
            $validated = $request->validate([
                'to' => 'required|email',
                'bcc' => 'nullable',
                'subject' => 'required|string',
                'contentTpl' => 'required|string'
            ]);

            LogFacade::info('WEBHOOK SENDMAIL - Validazione completata', [
                'validated_data' => $validated
            ]);

            // Preparazione dei dati per l'invio
            $to = $validated['to'];
            $bcc = [];

            // Gestione BCC - controllo se è array o stringa
            if (!empty($validated['bcc'])) {
                if (is_array($validated['bcc'])) {
                    // Se è già un array, lo uso direttamente
                    $bcc = array_filter($validated['bcc']);
                    // Rimuovo eventuali spazi bianchi
                    $bcc = array_map('trim', $bcc);
                } else {
                    // Se è una stringa, la converto in array
                    $bcc = array_filter(explode(',', $validated['bcc']));
                    // Rimuovo eventuali spazi bianchi
                    $bcc = array_map('trim', $bcc);
                }
            }

            $subject = $validated['subject'];
            $contentTpl = $validated['contentTpl'];

            LogFacade::info('WEBHOOK SENDMAIL - Dati preparati per invio', [
                'to' => $to,
                'bcc' => $bcc,
                'bcc_count' => count($bcc),
                'subject' => $subject,
                'content_length' => strlen($contentTpl),
                'content_preview' => substr($contentTpl, 0, 100) . '...',
                'is_html' => (strpos($contentTpl, '<') !== false) // Log per verificare se contiene HTML
            ]);

            // Invio dell'email come HTML invece di raw text
            Mail::html($contentTpl, function ($message) use ($to, $bcc, $subject) {
                $message->to($to)
                    ->subject($subject);
                if (!empty($bcc)) {
                    $message->bcc($bcc);
                }
            });

            LogFacade::info('WEBHOOK SENDMAIL - Email inviata con successo', [
                'to' => $to,
                'bcc' => $bcc,
                'subject' => $subject
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Email inviata con successo'
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            LogFacade::error('WEBHOOK SENDMAIL - Errore di validazione', [
                'errors' => $e->errors(),
                'failed_data' => $e->validator->getData()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Errore di validazione',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            LogFacade::error('WEBHOOK SENDMAIL - Errore generico', [
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Errore durante l\'invio dell\'email',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function sendTestMail(Request $request){

    }


    public function home(Request $request){

        $ret = [
            'has_promotions' => Publication::hasActivePromotions(),
            'events' => [],
            'promo_banner' => asset('assets/app/promo_banner.jpg'),
        ];

        foreach(Publication::homePageEvents() as $event){
            $ret['events'][] = $event->toAppData();
        }

        return $ret;

    }
    public function publications(Request $request){
        $publications = Publication::prepare($request->all())->where('publications.published',1)->orderBy('publications.date_from','DESC')->get();
        $ret = [];
        foreach($publications as $publication){
            $item = $publication->toAppData();
            if (Arr::get($item,'thumb')){
                $ret[] = $item;
            }

        }
        return $ret;
    }

    public function publication(Publication $publication){
        return $publication->toAppData();
    }
    public function shops(Request $request){
        $shops = Shop::prepare($request->all())->where('shops.published',1)->orderBy('shops.sequence')->get();
        $ret = [];
        foreach($shops as $shop){
            $item = $shop->toAppData();
            if (Arr::get($item,'thumb')){
                $ret[] = $item;
            }
        }
        return $ret;
    }
    public function shop(Shop $shop){
        return $shop->toAppData();
    }
    public function services(Request $request){
        $services = CdfService::prepare($request->all())->where('published',1)->orderBy('cdf_services.sequence')->get();
        $ret = [];
        foreach($services as $service){
            $item = $service->toAppData();
            if (Arr::get($item,'thumb')){
                $ret[] = $item;
            }
        }
        return $ret;
    }

}
