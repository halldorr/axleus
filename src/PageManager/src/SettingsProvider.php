<?php

declare(strict_types=1);

namespace PageManager;

use Axleus\SettingsProvider as Provider;

final class SettingsProvider extends Provider
{
    public ?string $file = 'page-manager.php';

    public function __invoke(): array
    {
        return parent::__invoke();
    }
}
