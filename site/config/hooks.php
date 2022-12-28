<?php

$eventHandler = function () {
    $url = env('NETLIFY_BUILD_URL');

    if (empty($url)) {
        return;
    }

    try {
        \Kirby\Http\Remote::request($url, ['method' => 'POST']);
    } catch (\Exception $e) {
        kirbylog("Request to {$url} failed", 'error');
        kirbylog($e->getMessage(), 'error');

        // Forward exception to the Kirby Panel
        throw $e;
    }
};

return [
    'site.update:after' => $eventHandler,
    'page.*:after' => $eventHandler
];
