<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'register', 'login'],

    'allowed_methods' => ['*'],

    // Qui specifica l’URL della tua SPA
    'allowed_origins' => ['http://localhost:5173'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
