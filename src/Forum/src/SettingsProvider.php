<?php

declare(strict_types=1);

namespace Forum;

final class SettingsProvider
{
    public function __invoke(): array
    {
        return [
            static::class => [],
        ];
    }
}
