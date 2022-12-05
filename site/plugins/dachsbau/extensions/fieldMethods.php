<?php

return [
    /**
     * Resolves images of a blocks field
     *
     * @kql-allowed
     */
    'toResolvedBlocks' => function (\Kirby\Cms\Field $field) {
        /** @var \Kirby\Cms\Blocks $blocks */
        $blocks = $field->toBlocks();

        $parsedBlocks = $blocks->map(function ($block) {
            /** @var \Kirby\Cms\Block $block */
            if ($block->type() === 'image') {
                /** @var \Kirby\Cms\File|null $image */
                $image = $block->content()->get('image')->toFile();

                if ($image) {
                    // Replace the image field with the resolved image
                    $block->content()->update([
                        'image' => [
                            'url'    => $image->url(),
                            'width'  => $image->width(),
                            'height' => $image->height(),
                            'srcset' => $image->srcset(),
                            'alt'    => $image->alt()->value()
                        ]
                    ]);
                }
            }

            return $block;
        });

        return $parsedBlocks;
    }
];
