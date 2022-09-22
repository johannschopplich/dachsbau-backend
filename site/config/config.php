<?php

return [

    'debug' => env('KIRBY_DEBUG', false),

    'panel' => [
        'install' => env('KIRBY_PANEL_INSTALL', false),
        'slug' => env('KIRBY_PANEL_SLUG', 'panel'),
        'language' => 'de'
    ],

    'date.handler' => 'intl',

    'cache' => [
        'pages' => [
            'active' => env('KIRBY_CACHE', false),
            'ignore' => fn (\Kirby\Cms\Page $page) => $page->kirby()->user() !== null
        ]
    ],

    'thumbs' => [
        'quality' => '80',
        'srcsets' => [
            'default' => [360, 720, 1024, 1280, 1536]
        ]
    ],

    // Enable basic authentication for the API and thus KQL
    'api' => [
        'basicAuth' => true
    ],

    // Default to token-based authentication
    'kql' => [
        'auth' => 'bearer'
    ],

    // Further Kirby headless options
    'headless' => [
        // Redirect to the Panel if no authorization header is sent, useful for
        // content managers visiting the site
        'autoPanelRedirect' => true
    ]

];
