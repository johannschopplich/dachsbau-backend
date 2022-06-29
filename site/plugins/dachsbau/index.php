<?php

use Kirby\Http\Uri;

\Kirby\Cms\App::plugin('johannschopplich/dachsbau', [
    'pageMethods' => [
        'cover' => function () {
            return $this->content()->cover()->toFile() ?? $this->image();
        },
        'frontendUrl' => function () {
            $frontendUrl = env('KIRBY_FRONTEND_URL');

            if (empty($frontendUrl)) {
                return null;
            }

            $url = new Uri($this->url());
            $url->host = $frontendUrl;

            return $url;
        }
    ],
    'siteMethods' => [
        'frontendUrl' => function () {
            $frontendUrl = env('KIRBY_FRONTEND_URL');

            if (empty($frontendUrl)) {
                return null;
            }

            $url = kirby()->url('index', true);
            $url->host = $frontendUrl;

            return $url;
        }
    ]
]);
