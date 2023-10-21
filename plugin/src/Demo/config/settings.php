<?php

declare(strict_types=1);

use Plugin\Demo\ConfigProvider;

return [
    'plugin' => [
        ConfigProvider::class => [
            'demo-key-one' => 'demo-value-one',
        ],
    ],
];