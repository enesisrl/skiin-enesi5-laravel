<?php


/*

-----
Caricamento dei moduli:
I file di configurazione dei moduli
vengono caricati qui in modo da sfruttare il caching di Laravel
-----

*/

return [
    'saveCopyInSentFolder' => env('NOTIFICATIONS_SAVE_COPY_IN_SENT_FOLDER',false),
    'sentFolderName' => env('NOTIFICATIONS_SENT_FOLDER_NAME','INBOX.Sent')
];