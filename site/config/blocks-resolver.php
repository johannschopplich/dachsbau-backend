<?php

use Kirby\Cms\Block;
use Kirby\Cms\Page;
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
        },
        // Fills the content-less `section-blog` block with the posts, so the
        // frontend needs no query of its own.
        'section-blog:posts' => function (Field $field, Block $block) {
            $kirby = $block->kirby();
            $urlParser = $kirby->option('permalinksResolver.urlParser');
            $posts = $kirby->page('blog')?->children()->listed();

            if ($posts === null) {
                return [];
            }

            return $posts->map(function (Page $post) use ($kirby, $urlParser) {
                $cover = $post->cover()->toFile();

                return [
                    'title' => $post->title()->value(),
                    'url' => $urlParser($post->url(), $kirby),
                    'description' => $post->description()->value(),
                    'cover' => $cover ? [
                        'width' => $cover->width(),
                        'height' => $cover->height(),
                        'srcset' => $cover->srcset()
                    ] : null
                ];
            })->values();
        }
    ]
];
