<?php

return [
    'plausible' => fn ($kirby) => [
        'label' => 'Analytics',
        'icon' => 'road-sign',
        'disabled' => false,
        'menu' => true,
        'link' => 'plausible',
        'views' => [
            [
                'pattern' => 'plausible',
                'action'  => fn () => [
                    'component' => 'k-plausible-view',
                    'title' => 'Analytics',
                    'props' => [
                        'sharedLink' => env('PLAUSIBLE_SHARED_LINK')
                    ]
                ]
            ]
        ]
    ]
];
