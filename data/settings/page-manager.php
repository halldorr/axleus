<?php

declare(strict_types=1);

return [
    \Axleus\SettingsProvider::class => [
        \PageManager\SettingsProvider::class => [
            'single-page-mode' => true,
        ],
    ],
];