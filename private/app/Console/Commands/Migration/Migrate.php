<?php

namespace App\Console\Commands\Migration;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Master\Modules\Acceptances\Models\Acceptance;
use Master\Modules\Acceptances\Models\AcceptanceMaterial;
use Master\Modules\Acceptances\Models\AcceptanceProfit;
use Master\Modules\Acceptances\Models\Receipt;
use Master\Modules\IsoReceipts\Models\IsoReceipt;
use Master\Modules\IsoRentReceipts\Models\IsoRentReceipt;
use Nette\FileNotFoundException;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;

class Migrate extends Command
{
    protected $signature = 'migrate:old-db';
    protected $description = 'Migra i dati dalle vecchie tabelle (mysql_old) alle nuove tabelle';

    protected $signatures_url;

    protected $download_files = false;

    public function handle()
    {

        $this->signatures_url = 'https://skiin.enesi5.it/signatures/';

        $this->info('Svuotamento tabelle...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Receipt::truncate();
        AcceptanceProfit::truncate();
        AcceptanceMaterial::truncate();
        Acceptance::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->info('Tabelle svuotate.');

        foreach(IsoReceipt::all() as $record){
            $record->forceDelete();
        }
        foreach(IsoRentReceipt::all() as $record){
            $record->forceDelete();
        }

        $this->info('Inizio migrazione dati...');

        // Considera solo accettazioni con data_inserimento maggiore di 10 anni fa
        $tenYearsAgo = date('Y-m-d', strtotime('-10 years'));


        // Migrazione accettazione -> Acceptance
        $this->info('Migrazione accettazione...');
        $accCount = 0;
        $query =         DB::connection('mysql_old')->table('accettazione')
            ->select(['accettazione.*',
                'articolo_1.descrizione as articolo_1_descrizione',
                'articolo_2.descrizione as articolo_2_descrizione',
                'articolo_3.descrizione as articolo_3_descrizione',
                'categoria_1.codice_cat as categoria_1_codice',
                'categoria_2.codice_cat as categoria_2_codice',
                'categoria_3.codice_cat as categoria_3_codice',
                'categoria_1.nome as categoria_1_descrizione',
                'categoria_2.nome as categoria_2_descrizione',
                'categoria_3.nome as categoria_3_descrizione',
                'marca_1.marca as marca_1_nome',
                'marca_2.marca as marca_2_nome',
                'marca_3.marca as marca_3_nome',
                'misura_1.misura as misura_1_descrizione',
                'misura_2.misura as misura_2_descrizione',
                'misura_3.misura as misura_3_descrizione',
                'articolo_1.anno as articolo_1_anno',
                'articolo_2.anno as articolo_2_anno',
                'articolo_3.anno as articolo_3_anno',
                'anagrafe.codice as codice_cliente',
                'anagrafe.nome as nome_cliente',
                'anagrafe.cognome as cognome_cliente',
                'anagrafe.codfiscale as cf_cliente',
                'anagrafe.identita as identita_cliente',
                'anagrafe.indirizzo as indirizzo_cliente',
                'anagrafe.cap as cap_cliente',
                'anagrafe.localita as localita_cliente',
                'anagrafe.telefono as telefono_cliente',
                'anagrafe.cellulare as cellulare_cliente',
                'anagrafe.email as email_cliente',
                'province.codice as provincia_cliente',
                'nazioni.descrizione as nazione_cliente',
                'altezza.descrizione as altezza_descrizione',
                'peso.descrizione as peso_descrizione',
                'misura_scarpa.descrizione as misura_scarpa_descrizione',
                'agenzia.nome as agenzia_nome'
            ])
            ->leftJoin('articolo as articolo_1', 'accettazione.id_articolo_1', '=', 'articolo_1.codice_art')
            ->leftJoin('articolo as articolo_2', 'accettazione.id_articolo_2', '=', 'articolo_2.codice_art')
            ->leftJoin('articolo as articolo_3', 'accettazione.id_articolo_3', '=', 'articolo_3.codice_art')
            ->leftJoin('categoria as categoria_1', 'accettazione.id_categoria_1', '=', 'categoria_1.id_categoria')
            ->leftJoin('categoria as categoria_2', 'accettazione.id_categoria_2', '=', 'categoria_2.id_categoria')
            ->leftJoin('categoria as categoria_3', 'accettazione.id_categoria_3', '=', 'categoria_3.id_categoria')
            ->leftJoin('marca as marca_1', 'articolo_1.id_marca', '=', 'marca_1.id_marca')
            ->leftJoin('marca as marca_2', 'articolo_2.id_marca', '=', 'marca_2.id_marca')
            ->leftJoin('marca as marca_3', 'articolo_3.id_marca', '=', 'marca_3.id_marca')
            ->leftJoin('misura as misura_1', 'articolo_1.id_misura', '=', 'misura_1.id_misura')
            ->leftJoin('misura as misura_2', 'articolo_2.id_misura', '=', 'misura_2.id_misura')
            ->leftJoin('misura as misura_3', 'articolo_3.id_misura', '=', 'misura_3.id_misura')
            ->leftJoin('anagrafe as anagrafe', 'accettazione.id_anagrafe', '=', 'anagrafe.id_anagrafe')
            ->leftJoin('cliente as agenzia', 'accettazione.id_cliente', '=', 'agenzia.id_cliente')
            ->leftJoin('province as province', 'anagrafe.id_provincia', '=', 'province.id_provincia')
            ->leftJoin('nazioni as nazioni', 'anagrafe.id_nazione', '=', 'nazioni.id_nazione')
            ->leftJoin('altezza', 'accettazione.id_altezza', '=', 'altezza.id_altezza')
            ->leftJoin('peso', 'accettazione.id_peso', '=', 'peso.id_peso')
            ->leftJoin('misura_scarpa', 'accettazione.id_misura_scarpa', '=', 'misura_scarpa.id_misura_scarpa')
            ->groupBy('accettazione.id_accettazione')
            ->orderBy('accettazione.id_accettazione')
            ->where('accettazione.data_in', '>=', $tenYearsAgo);
        $query->chunk(1000, function($oldAcceptances) use (&$accCount) {
                foreach ($oldAcceptances as $old) {

                    $data = [
                        'barcode' => $old->codice_barre,
                        'agency' => $old->agenzia_nome,
                        'article_1' => $old->id_articolo_1,
                        'article_2' => $old->id_articolo_2,
                        'article_3' => $old->id_articolo_3,
                        'article_1_description' => $old->articolo_1_descrizione,
                        'article_2_description' => $old->articolo_2_descrizione,
                        'article_3_description' => $old->articolo_3_descrizione,
                        'typology_1' => $old->id_tipologia_1,
                        'typology_2' => $old->id_tipologia_2,
                        'typology_3' => $old->id_tipologia_3,
                        'category_1' => $old->id_categoria_1,
                        'category_2' => $old->id_categoria_2,
                        'category_3' => $old->id_categoria_3,
                        'category_1_description' => $old->categoria_1_descrizione,
                        'category_2_description' => $old->categoria_2_descrizione,
                        'category_3_description' => $old->categoria_3_descrizione,
                        'brand_1' => $old->marca_1_nome,
                        'brand_2' => $old->marca_2_nome,
                        'brand_3' => $old->marca_3_nome,
                        'measure_1' => $old->misura_1_descrizione,
                        'measure_2' => $old->misura_2_descrizione,
                        'measure_3' => $old->misura_3_descrizione,
                        'year_1' => $old->articolo_1_anno,
                        'year_2' => $old->articolo_2_anno,
                        'year_3' => $old->articolo_3_anno,
                        'date_in' => $old->data_in,
                        'date_out' => $old->data_out,
                        'site_1' => $old->posto_1,
                        'site_2' => $old->posto_2,
                        'site_3' => $old->posto_3,
                        'name' => $old->nome,
                        'identity' => $old->identita,
                        'seasonal' => $old->stagionale,
                        'reservation' => $old->prenotazione,
                        'discount' => $old->sconto,
                        'note' => $old->note,
                        'height' => $old->altezza_descrizione,
                        'weight' => $old->peso_descrizione,
                        'shoe_measure' => $old->misura_scarpa_descrizione,
                        'customer' => [
                            'code' => $old->codice_cliente,
                            'name' => $old->nome_cliente,
                            'last_name' => $old->cognome_cliente,
                            'fiscal_code' => $old->cf_cliente,
                            'indirizzo' => $old->indirizzo_cliente,
                            'cap' => $old->cap_cliente,
                            'comune' => $old->localita_cliente,
                            'provincia' => $old->provincia_cliente,
                            'stato' => $old->nazione_cliente,
                            'phone' => $old->telefono_cliente,
                            'email' => $old->email_cliente,
                        ],
                        'uo_age' => $old->uo_age,
                        'created_at' => $old->data_inserimento,
                        'updated_at' => $old->data_modifica,
                        'free_ride' => $old->free_ride,
                        'total_days' => $old->n_giorni,
                        'morning' => $old->mattino,
                        'end_time' => $old->ora_fine,
                        'skier_type' => $old->tipo_sciatore,
                        'skier_code' => $old->codice_sciatore,
                        'z_value' => $old->valore_z,
                        'insurance' => $old->assicurazione,
                        'insurance_price' => $old->assicurazione_valore,
                        'refundable' => $old->rimborsabile,
                    ];

                    $acceptance = new Acceptance($data);
                    $acceptance->id = $old->id_accettazione;
                    $acceptance->save();
                    $accCount++;
                    if ($accCount % 1000 === 0) {
                        $this->info("Importati $accCount accettazioni...");
                    }
                }
            });
        $this->info("Totale accettazioni importate: $accCount");

        // Migrazione accettazione_materiale -> AcceptanceMaterial
        $this->info('Migrazione accettazione_materiale...');
        $matCount = 0;

        DB::connection('mysql_old')->table('accettazione_materiale')
            ->select(['accettazione_materiale.*',
                    'articolo.descrizione as articolo_descrizione',
                    'articolo.codice_art as articolo_codice',
                    'categoria.codice_cat as categoria_codice',
                    'categoria.nome as categoria_nome'
                ])
            ->leftJoin('articolo', 'accettazione_materiale.id_articolo', '=', 'articolo.codice_art')
            ->leftJoin('categoria', 'articolo.id_categoria', '=', 'categoria.id_categoria')
            ->join('accettazione', 'accettazione_materiale.id_accettazione', '=', 'accettazione.id_accettazione')
            ->groupBy('accettazione_materiale.id_accettazione_materiale')
            ->orderBy('accettazione_materiale.id_accettazione', 'asc')
            ->where('accettazione.data_in', '>=', $tenYearsAgo)
            ->chunk(1000, function($oldMaterials) use (&$matCount) {
                foreach ($oldMaterials as $old) {
                    if ($old->id_accettazione_materiale) {

                        $data = [
                            'acceptance_id' => $old->id_accettazione,
                            'date_in' => $old->data,
                            'date_out' => $old->data_out,
                            'profit' => $old->resa,
                            'article_code' => $old->articolo_codice,
                            'article_description' => $old->articolo_descrizione,
                            'category' => $old->categoria_codice,
                            'category_description' => $old->categoria_nome
                        ];
                        $acceptanceMaterial = new AcceptanceMaterial($data);
                        $acceptanceMaterial->id = $old->id_accettazione_materiale;
                        $acceptanceMaterial->save();
                    }
                    $matCount++;
                    if ($matCount % 1000 === 0) {
                        $this->info("Importati $matCount materiali...");
                    }
                }
            });
        $this->info("Totale materiali importati: $matCount");

        // Migrazione accettazione_resa -> AcceptanceProfit
        $this->info('Migrazione accettazione_resa...');
        $profitCount = 0;
        DB::connection('mysql_old')->table('accettazione_resa')
            ->select(['accettazione_resa.*',
                    'articolo.descrizione as article_description',
                    'articolo.codice_art as article_code',
                    'categoria.codice_cat as category',
                    'categoria.nome as category_description'
                ])
            ->leftJoin('articolo', 'accettazione_resa.id_articolo', '=', 'articolo.id_articolo')
            ->leftJoin('categoria', 'articolo.id_categoria', '=', 'categoria.id_categoria')
            ->join('accettazione', 'accettazione_resa.id_accettazione', '=', 'accettazione.id_accettazione')
            ->groupBy('accettazione_resa.id')
            ->orderBy('accettazione_resa.id_accettazione', 'asc')
            ->where('accettazione.data_in', '>=', $tenYearsAgo)
            ->chunk(1000, function($oldProfits) use (&$profitCount) {
                foreach ($oldProfits as $old) {
                    $data = [
                        'acceptance_id' => $old->id_accettazione,
                        'category' => $old->category,
                        'category_description' => $old->category_description,
                        'article_code' => $old->article_code,
                        'article_description' => $old->article_description,
                        'profit' => $old->resa,
                        'days' => $old->giorni,
                        'created_at' => $old->data_inserimento,
                    ];

                    $acceptanceProfit = new AcceptanceProfit($data);
                    $acceptanceProfit->id = $old->id;
                    $acceptanceProfit->save();

                    $profitCount++;
                    if ($profitCount % 1000 === 0) {
                        $this->info("Importati $profitCount profitti...");
                    }
                }
            });
        $this->info("Totale profitti importati: $profitCount");

        // Migrazione ricevuta -> Receipt
        $this->info('Migrazione ricevuta...');
        $receiptCount = 0;
        DB::connection('mysql_old')->table('ricevuta')
            ->select(['ricevuta.*',
                      'cliente.nome as agenzia_nome'
                ])->leftJoin('cliente', 'ricevuta.id_cliente', '=', 'cliente.id_cliente')
            ->join('accettazione', 'ricevuta.id_accettazione', '=', 'accettazione.id_accettazione')
            ->where('accettazione.data_in', '>=', $tenYearsAgo)
            ->orderBy('ricevuta.id_accettazione', 'asc')
            ->groupBy('ricevuta.id_ricevuta')
            ->chunk(1000, function($oldReceipts) use (&$receiptCount) {
                foreach ($oldReceipts as $old) {

                    $data = [
                        'acceptance_id' => $old->id_accettazione,
                        'agency' => $old->agenzia_nome,
                        'date' => $old->data,
                        'description' => $old->descrizione,
                        'price' => $old->prezzo
                    ];

                    $receipt = new Receipt($data);
                    $receipt->id = $old->id_ricevuta;
                    $receipt->save();

                    $receiptCount++;
                    if ($receiptCount % 1000 === 0) {
                        $this->info("Importate $receiptCount ricevute...");
                    }
                }
            });
        $this->info("Totale ricevute importate: $receiptCount");

        // Migrazione ricevuta_iso -> IsoReceipt
        $this->info('Migrazione ricevuta_iso...');
        $isoCount = 0;
        DB::connection('mysql_old')->table('ricevuta_iso')
            ->select(['ricevuta_iso.*',
                'altezza.descrizione as altezza_descrizione',
                'peso.descrizione as peso_descrizione',
                'misura_scarpa.descrizione as misura_scarpa_descrizione'
                ])->leftJoin('altezza', 'ricevuta_iso.id_altezza', '=', 'altezza.id_altezza')
            ->leftJoin('peso', 'ricevuta_iso.id_peso', '=', 'peso.id_peso')
            ->leftJoin('misura_scarpa', 'ricevuta_iso.id_misura_scarpa', '=', 'misura_scarpa.id_misura_scarpa')
            ->orderBy('ricevuta_iso.data_inserimento', 'asc')
            ->chunk(1000, function($oldIsoReceipts) use (&$isoCount) {
                foreach ($oldIsoReceipts as $old) {

                    $data = [
                        'first_name' => $old->nome,
                        'last_name' => $old->cognome,
                        'ski' => $old->sci,
                        'height' => $old->altezza_descrizione,
                        'weight' => $old->peso_descrizione,
                        'shoe_measure' => $old->misura_scarpa_descrizione,
                        'uo_age' => $old->uo_age,
                        'skier_type' => $old->tipo_sciatore,
                        'z_value' => $old->valore_z,
                        'created_at' => $old->data_inserimento,
                    ];

                    $isoReceipt = new IsoReceipt($data);
                    $isoReceipt->id = $old->id_ricevuta_iso;
                    $isoReceipt->save();


                    if ($this->download_files) {
                        $signature_pdf = rtrim($this->signatures_url,"/")."/".$old->id_ricevuta_iso.".pdf";
                        $signature_zpl = rtrim($this->signatures_url,"/")."/".$old->id_ricevuta_iso.".zpl";
                        try {
                            $isoReceipt->addMediaFromUrl($signature_pdf)->toMediaCollection('pdf_file');
                        } catch (FileCannotBeAdded|FileNotFoundException $e) {
                            $this->error($e->getMessage());
                        }


                        try {
                            $isoReceipt->addMediaFromUrl($signature_zpl)->toMediaCollection('zpl_file');
                        } catch (FileCannotBeAdded|FileNotFoundException $e) {
                            $this->error($e->getMessage());
                        }
                    }


                    $isoCount++;
                    if ($isoCount % 1000 === 0) {
                        $this->info("Importate $isoCount ricevute ISO...");
                    }
                }
            });
        $this->info("Totale ricevute ISO importate: $isoCount");

        // Migrazione ricevuta_iso_noleggio -> IsoRentReceipt
        $this->info('Migrazione ricevuta_iso_noleggio...');
        $isoRentCount = 0;
        DB::connection('mysql_old')->table('ricevuta_iso_noleggio')
            ->select(['ricevuta_iso_noleggio.*',
                'altezza.descrizione as altezza_descrizione',
                'peso.descrizione as peso_descrizione',
                'misura_scarpa.descrizione as misura_scarpa_descrizione'
            ])->leftJoin('altezza', 'ricevuta_iso_noleggio.id_altezza', '=', 'altezza.id_altezza')
            ->leftJoin('peso', 'ricevuta_iso_noleggio.id_peso', '=', 'peso.id_peso')
            ->leftJoin('misura_scarpa', 'ricevuta_iso_noleggio.id_misura_scarpa', '=', 'misura_scarpa.id_misura_scarpa')
            ->orderBy('ricevuta_iso_noleggio.data_inserimento', 'asc')
            ->chunk(1000, function($oldIsoRentReceipts) use (&$isoRentCount) {
                foreach ($oldIsoRentReceipts as $old) {

                    $data = [
                        'name' => $old->nome,
                        'ski' => $old->sci,
                        'height' => $old->altezza_descrizione,
                        'weight' => $old->peso_descrizione,
                        'shoe_measure' => $old->misura_scarpa_descrizione,
                        'uo_age' => $old->uo_age,
                        'skier_type' => $old->tipo_sciatore,
                        'z_value' => $old->valore_z,
                        'created_at' => $old->data_inserimento,
                    ];

                    $isoRentReceipts = new IsoRentReceipt($data);
                    $isoRentReceipts->id = $old->id_ricevuta_iso_noleggio;
                    $isoRentReceipts->save();

                    if ($this->download_files) {
                        $signature_pdf = rtrim($this->signatures_url, "/") . "/" . $old->id_ricevuta_iso_noleggio . ".pdf";
                        $signature_zpl = rtrim($this->signatures_url, "/") . "/" . $old->id_ricevuta_iso_noleggio . ".zpl";
                        try {
                            $isoRentReceipts->addMediaFromUrl($signature_pdf)->toMediaCollection('pdf_file');
                        } catch (FileCannotBeAdded|FileNotFoundException $e) {
                            $this->error($e->getMessage());
                        }
                        try {
                            $isoRentReceipts->addMediaFromUrl($signature_zpl)->toMediaCollection('zpl_file');
                        } catch (FileCannotBeAdded|FileNotFoundException $e) {
                            $this->error($e->getMessage());
                        }
                    }

                    $isoRentCount++;
                    if ($isoRentCount % 1000 === 0) {
                        $this->info("Importate $isoRentCount ricevute ISO noleggio...");
                    }

                }
            }
        );
        $this->info("Totale ricevute ISO noleggio importate: $isoRentCount");
    }
}
