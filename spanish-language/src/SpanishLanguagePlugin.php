<?php

namespace Killerbite95\SpanishLanguage;

use Filament\Contracts\Plugin;
use Filament\Panel;

class SpanishLanguagePlugin implements Plugin
{
    public function getId(): string
    {
        return 'spanish-language';
    }

    public function register(Panel $panel): void {}

    public function boot(Panel $panel): void {}
}
