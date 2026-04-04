<?php

namespace Killerbite95\ServerPerPage;

use Filament\Contracts\Plugin;
use Filament\Panel;

class ServerPerPagePlugin implements Plugin
{
    public function getId(): string
    {
        return 'server-per-page';
    }

    public function register(Panel $panel): void {}

    public function boot(Panel $panel): void {}
}
