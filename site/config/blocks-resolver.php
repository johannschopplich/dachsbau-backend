<?php

use Kirby\Cms\Block;
use Kirby\Content\Field;

return [
    // Custom resolves for `block:field`
    'resolvers' => [
        'text:text' => function (Field $field, Block $block) {
            return $field->permalinksToUrls()->value();
        },
        'section-backers:backers' => function (Field $field, Block $block) {
            $structure = $field->toStructure();

            return $structure->map(function ($item) {
                $image = $item->logo()->toFile();

                return [
                    'title' => $item->title()->value(),
                    'website' => $item->website()->value(),
                    'text' => $item->text()->value(),
                    'logo' => [
                        'url' => $image?->url(),
                        'width' => $image?->width(),
                        'height' => $image?->height()
                    ]
                ];
            })->values();
        }
    ]
];
