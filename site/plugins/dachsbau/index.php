<?php

Kirby\Cms\App::plugin('johannschopplich/dachsbau', [
    'pageMethods' => [
        'cover' => function () {
            return $this->content()->cover()->toFile() ?? $this->image();
        }
    ]
]);
