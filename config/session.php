<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Driver della Sessione
    |--------------------------------------------------------------------------
    |
    | In questo esempio usiamo il driver "file" per memorizzare la sessione su 
    | disco, che va bene per lo sviluppo.
    |
    */

    'driver' => 'file',

    /*
    |--------------------------------------------------------------------------
    | Durata della Sessione
    |--------------------------------------------------------------------------
    |
    | Specifica il numero di minuti che desideri mantenere la sessione 
    | inattiva prima che scada.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Cifratura della Sessione
    |--------------------------------------------------------------------------
    |
    | Se desideri cifrare i dati della sessione, imposta questa opzione su true.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Percorso dei File di Sessione
    |--------------------------------------------------------------------------
    |
    | Quando usi il driver "file", i file di sessione vengono salvati qui.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Connessione e Tabella della Sessione
    |--------------------------------------------------------------------------
    |
    | Quando usi driver come "database" o "redis", puoi specificare qui la 
    | connessione o la tabella.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Store della Sessione
    |--------------------------------------------------------------------------
    |
    | Per i driver di sessione basati sulla cache (come redis), puoi specificare 
    | quale store usare.
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Lottery di Pulizia della Sessione
    |--------------------------------------------------------------------------
    |
    | Specifica le probabilità che una richiesta casuale faccia pulizia delle vecchie 
    | sessioni.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nome del Cookie della Sessione
    |--------------------------------------------------------------------------
    |
    | Qui puoi cambiare il nome del cookie che viene creato per la sessione.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Percorso del Cookie della Sessione
    |--------------------------------------------------------------------------
    |
    | Il percorso in cui il cookie è disponibile; solitamente il percorso radice.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Dominio del Cookie della Sessione
    |--------------------------------------------------------------------------
    |
    | Imposta il dominio del cookie. Per lo sviluppo in locale, imposta a "localhost".
    |
    */

    'domain' => env('SESSION_DOMAIN', 'localhost'),

    /*
    |--------------------------------------------------------------------------
    | Cookie Sicuri
    |--------------------------------------------------------------------------
    |
    | Se usi HTTPS, imposta questa opzione su true. In locale normalmente è false.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE', false),

    /*
    |--------------------------------------------------------------------------
    | Solo Accesso HTTP
    |--------------------------------------------------------------------------
    |
    | Impostando questo valore su true, il cookie sarà accessibile solo tramite 
    | le richieste HTTP e non tramite JavaScript.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | Imposta il comportamento del cookie per le richieste cross-site. "lax" è un buon 
    | compromesso per la maggior parte dei casi.
    |
    | Puoi usare: "lax", "strict", "none", oppure lasciare null.
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Partizionati
    |--------------------------------------------------------------------------
    |
    | Se impostato su true, il cookie sarà legato al sito di primo livello in un contesto 
    | cross-site. Di solito si lascia false.
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];
