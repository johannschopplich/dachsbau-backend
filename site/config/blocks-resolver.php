<?php

use Kirby\Cms\Block;
use Kirby\Content\Field;

$writerResolver = fn (Field $field, Block $block) => $field->resolvePermalinks()->value();

return [
    'resolvers' => [
        'heading:text' => $writerResolver,
        'image:caption' => $writerResolver,
        'list:text' => $writerResolver,
        'quote:text' => $writerResolver,
        'quote:citation' => $writerResolver,
        'text:text' => $writerResolver,
        'section-backers:backers' => function (Field $field, Block $block) {
            $structure = $field->toStructure();

            return $structure->map(function ($item) {
                $image = $item->logo()->toFile();

                return [
                    'title' => $item->title()->value(),
                    'website' => $item->website()->value(),
                    'text' => $item->text()->resolvePermalinks()->value(),
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
