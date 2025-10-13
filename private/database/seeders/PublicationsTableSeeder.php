<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('publications')->delete();
        
        \DB::table('publications')->insert(array (
            0 => 
            array (
                'id' => '4d5c8a0e-4870-40f2-8307-079c37b49b66',
                'progId' => 1002,
                'published' => 1,
                'draft' => 0,
                'sequence' => NULL,
                'type' => 'promotion',
                'homepage' => 1,
                'date_from' => '2025-09-01',
                'date_to' => '2026-04-30',
                'title' => 'Summer Village: è arrivato il divertimento a Campo dei Fiori',
                'text' => '<h3>Il Summer Village è arrivato nella galleria del Centro Commerciale Campo dei Fiori e resterà attivo fino al 7 settembre!</h3> <p><strong>All’interno dell’area troverai gonfiabili, scivoli e saltarelli dedicati al divertimento per tutti i bambini, in uno spazio sicuro e controllato.</strong></p> <p><b>Orari di apertura dell’area giochi:</b></p> <ul> <li>Feriali: dalle 15:00 alle 20:00</li> <li>Festivi e prefestivi: dalle 10:00 alle 13:00 e dalle 15:00 alle 20:00</li> </ul> <p> </p> <p><b>Tariffe di ingresso:</b></p> <ul> <li>€3 per 30 minuti</li> <li>€5 per 1 ora</li> </ul> <p> </p> <p><b>Sconti disponibili:<br> </b>Presentando uno <strong>scontrino del giorno</strong> di un qualsiasi negozio del centro commerciale oppure la fidelity card, si ottiene<strong> 1€ di sconto</strong> sul biglietto d’ingresso.</p> <p style="text-align: center;"><strong>Un’occasione perfetta per regalare un momento di svago durante lo shopping estivo. Ti aspettiamo in galleria per un’estate piena di sorrisi!</strong></p>',
                'created_at' => '2025-09-01 07:09:49',
                'updated_at' => '2025-09-16 06:56:22',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '82dde411-5aad-4a62-b1e5-e0341a412691',
                'progId' => 1001,
                'published' => 1,
                'draft' => 1,
                'sequence' => NULL,
                'type' => NULL,
                'homepage' => NULL,
                'date_from' => NULL,
                'date_to' => NULL,
                'title' => NULL,
                'text' => NULL,
                'created_at' => '2025-09-01 07:08:47',
                'updated_at' => '2025-09-03 09:00:04',
                'deleted_at' => '2025-09-03 09:00:04',
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 'c9d5902c-471f-46dd-902a-849d5cc9d05d',
                'progId' => 1003,
                'published' => 1,
                'draft' => 0,
                'sequence' => NULL,
                'type' => 'promotion',
                'homepage' => 1,
                'date_from' => '2025-09-01',
                'date_to' => '2026-09-01',
                'title' => 'La Casa delle Emozioni arriva a Campo dei Fiori',
                'text' => '<h3><strong>Dal 18 al 24 giugno, preparati a vivere un’esperienza unica con la CASA DELLE EMOZIONI: una stanza immersiva e interattiva dove bambini e adulti potranno esplorare il mondo delle emozioni attraverso giochi, animazioni 3D e attività coinvolgenti.</strong></h3> <p>In compagnia di Allegra e degli altri personaggi creati da Erickson Edizioni, imparerai a riconoscere e vivere emozioni come Gioia, Tristezza, Rabbia, Paura, Imbarazzo, Invidia, Disgusto, Ansia e Noia.</p> <p><strong>> Centro Commerciale Campo dei Fiori</strong><br> <strong>> Dal 18 al 24 giugno</strong><br> <strong>> Ingresso gratuito</strong></p> <p><strong>Orari:</strong><br> 18–20 giugno: ore 14:00 – 19:00<br> 21–22 giugno: ore 11:00 – 13:00 e 15:00 – 19:00<br> 23–24 giugno: ore 14:00 – 19:00</p> <p>Non perdere questa attività educativa, gratuita e divertente per tutta la famiglia! Ti aspettiamo</p> <p> </p>',
                'created_at' => '2025-09-01 07:11:40',
                'updated_at' => '2025-09-16 06:56:18',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => 'f4faef96-3dc6-4b5b-8042-8c28e581f97f',
                'progId' => 1000,
                'published' => 1,
                'draft' => 0,
                'sequence' => NULL,
                'type' => 'promotion',
                'homepage' => 0,
                'date_from' => '2025-09-01',
                'date_to' => '2026-10-11',
                'title' => 'Dal 5 luglio iniziano i Saldi Estivi a Campo dei Fiori!',
                'text' => '<h3>L’estate porta grandi occasioni al Centro Commerciale Campo dei Fiori: <strong>da sabato 5 luglio</strong>, ti aspettano sconti imperdibili su abbigliamento, accessori, beauty, articoli sportivi, casa e tanto altro!</h3> <p><strong>È il momento perfetto per rinnovare il guardaroba, concederti qualche coccola o fare scorta dei tuoi prodotti preferiti… a prezzi eccezionali! </strong></p>',
                'created_at' => '2025-09-01 07:03:30',
                'updated_at' => '2025-09-16 06:55:58',
                'deleted_at' => NULL,
                'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'updated_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}