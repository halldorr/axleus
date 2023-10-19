<?php

declare(strict_types=1);

return [
    \Forum\ConfigProvider::class => [
        'serve-forum-from-root' => false,
        'base-uri-segment'      => 'forums' // if serve-forum-from-root is false, then this sets the segment to route the forum
    ],
];