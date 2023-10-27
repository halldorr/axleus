<?php

declare(strict_types=1);

return [
    \Axleus\SettingsProvider::class => [
        \Forum\SettingsProvider::class => [
            'serve-forum-from-root' => false,
            'base-uri-segment'      => 'community' // if serve-forum-from-root is false, then this sets the segment to route the forum
        ],
    ],
];