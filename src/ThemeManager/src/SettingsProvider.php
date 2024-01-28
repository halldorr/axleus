<?php

declare(strict_types=1);

namespace ThemeManager;

use Axleus\SettingsProvider as Provider;

final class SettingsProvider extends Provider
{
    public const DEFAULT_THEME = 'default';
    public const SETTINGS_FILE = 'themes.php';
    protected ?string $file    = self::SETTINGS_FILE;

    public function __invoke(): array
    {
        return parent::__invoke();
    }
}
