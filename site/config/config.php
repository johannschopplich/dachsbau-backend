<?php

return [

    'debug' => env('KIRBY_DEBUG', false),

    'panel' => [
        'install' => env('KIRBY_PANEL_INSTALL', false),
        'slug' => env('KIRBY_PANEL_SLUG', 'panel'),
        'language' => 'de'
    ],

    'date.handler' => 'intl',

    'hooks' => [
        // Explicitly register catch-all routes only when Kirby and all plugins
        // have been loaded to ensure no other routes are overwritten
        'system.loadPlugins:after' => function () {
            kirby()->extend([
                'api' => require __DIR__ . '/api.php',
                'routes' => require __DIR__ . '/routes.php'
            ]);
        }
    ],

    'cache' => [
        'pages' => [
            'active' => env('KIRBY_CACHE', false),
            'ignore' => fn (\Kirby\Cms\Page $page) => kirby()->user() !== null
        ]
    ],

    // Enable basic auth when using KQL with default `/api/query` endpoint
    'api' => [
        'basicAuth' => true
    ],

    'kql' => [
        'auth' => 'bearer'
    ]

];
