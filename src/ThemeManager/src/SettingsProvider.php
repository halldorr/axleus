<?php

declare(strict_types=1);

namespace ThemeManager;

use Axleus\SettingsProvider as Provider;

final class SettingsProvider extends Provider
{
    public const DEFAULT_THEME  = 'default';
    protected ?string $file     = 'themes.php';
    private string $activeTheme = self::DEFAULT_THEME;
    private $settings;

    public function __invoke(): array
    {
        return parent::__invoke();
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
