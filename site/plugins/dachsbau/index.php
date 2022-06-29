<?php

use Kirby\Http\Uri;

\Kirby\Cms\App::plugin('johannschopplich/dachsbau', [
    'pageMethods' => [
        'cover' => function () {
            return $this->content()->cover()->toFile() ?? $this->image();
        },
        'frontendUrl' => function () {
            $host = env('KIRBY_FRONTEND_HOST');

            if (empty($host)) {
                return null;
            }

            $url = new Uri($this->url());
            $url->host = $host;

            return $url;
        }
    ],
    'siteMethods' => [
        'frontendUrl' => function () {
            $host = env('KIRBY_FRONTEND_HOST');

            if (empty($host)) {
                return null;
            }

            $url = kirby()->url('index', true);
            $url->host = $host;

            return $url;
        }
    ]
]);
