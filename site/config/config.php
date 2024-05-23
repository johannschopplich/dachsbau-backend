<?php

return [

    'debug' => env('KIRBY_DEBUG', false),

    'yaml' => [
        'handler' => 'symfony'
    ],
    'date' => [
        'handler' => 'intl'
    ],

    'panel' => [
        'install' => env('KIRBY_PANEL_INSTALL', false),
        'slug' => env('KIRBY_PANEL_SLUG', 'panel'),
        'language' => 'de'
    ],

    'cache' => [
        'pages' => [
            'active' => env('KIRBY_CACHE', false),
            'ignore' => fn (\Kirby\Cms\Page $page) => $page->kirby()->user() !== null
        ]
    ],

    'thumbs' => [
        'format' => 'webp',
        'quality' => 80,
        'presets' => [
            'default' => ['format' => 'webp', 'quality' => 80],
        ],
        'srcsets' => [
            'default' => [360, 720, 1024, 1280, 1536]
        ]
    ],

    // Default to token-based authentication
    'kql' => [
        'auth' => 'bearer'
    ],

    'blocksResolver' => [
        'resolvers' => [
            'text:text' => function (\Kirby\Content\Field $field, \Kirby\Cms\Block $block) {
                return $field->permalinksToUrls()->value();
            }
        ]
    ],

    'headless' => [
        'globalRoutes' => true,
        'token' => env('KIRBY_HEADLESS_API_TOKEN'),

        'panel' => [
            'frontendUrl' => env('KIRBY_HEADLESS_FRONTEND_URL'),
            'redirect' => true
        ],

        'cors' => [
            'allowOrigin' => env('KIRBY_HEADLESS_ALLOW_ORIGIN', '*')
        ]
    ]
];
