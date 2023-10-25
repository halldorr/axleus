<?php

declare(strict_types=1);

namespace ThemeManager;

final class SettingsProvider
{
    public const DEFAULT_THEME = 'default';
    private const SETTINGS_FILE = __DIR__ . '/../../../data/settings/themes.php';
    private string $activeTheme = self::DEFAULT_THEME;
    private $settings;

    public function __construct()
    {
        $settings = require self::SETTINGS_FILE;
        if (! \is_bool($settings) && is_array($settings[static::class])) {
            $this->settings = $settings[static::class]['themes'];
        }
    }

    public function __invoke(): array
    {
        return [
            static::class => [

            ],
        ];
    }

    public function getActiveTheme(): string
    {
        if (is_array($this->settings)) {
            foreach ($this->settings as $theme) {
                if (! $theme['active']) {
                    continue;
                }
                $this->activeTheme = $theme['name'];
            }
        }
        return $this->activeTheme;
    }
}
