<?php

declare(strict_types=1);

namespace Plugin\Demo;

use Plugin\Demo\Demo;
use Plugin\Demo\DemoFactory;

return [
    'dependencies' => [
        'factories'  => [],
        'invokables' => [
            Demo::class => Demo::class,
        ],
    ],
];