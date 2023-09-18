<?php

declare(strict_types=1);

return [
    \Forum\ConfigProvider::class => [
        'serve-forum-from-root' => true,
        'base-uri-segment' => 'forums'
    ],
];