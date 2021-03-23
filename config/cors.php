<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'],

    'allowed_methods' => ['GET,POST'],

    'allowed_origins' => ['*.geo.sm'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Application', 'ip'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
