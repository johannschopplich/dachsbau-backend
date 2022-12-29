<?php

return [
    // Trigger Netlify build after site or page is updated
    '*.*.after' => function (\Kirby\Cms\Event $event) {
        if (!in_array($event->type(), ['site', 'page'])) {
            return;
        }

        $url = env('NETLIFY_BUILD_URL');

        if (empty($url)) {
            return;
        }

        try {
            $response = \Kirby\Http\Remote::request($url, ['method' => 'POST']);
            kirbylog("Triggered build. Response: {$response->content()}");
        } catch (\Exception $e) {
            kirbylog("Request to {$url} failed", 'error');
            kirbylog($e->getMessage(), 'error');

            // Forward exception to the Kirby Panel
            throw $e;
        }
    }
];
