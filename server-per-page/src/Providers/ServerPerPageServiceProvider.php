<?php

namespace Killerbite95\ServerPerPage\Providers;

use App\Enums\CustomizationKey;
use App\Filament\App\Resources\Servers\Pages\ListServers;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ServerPerPageServiceProvider extends ServiceProvider
{
    /**
     * Grid and table mode allowed per-page options, mirroring ListServers::table().
     */
    private const GRID_OPTIONS  = [10, 20, 30, 40];
    private const TABLE_OPTIONS = [10, 20, 50, 100];

    /**
     * Default per-page values when the user has no saved preference.
     */
    private const DEFAULT_GRID  = 40;
    private const DEFAULT_TABLE = 50;

    public function register(): void {}

    public function boot(): void
    {
        // Session key that Filament uses internally for this component's per-page value.
        // See Filament\Tables\Concerns\CanPaginateRecords::getTablePerPageSessionKey()
        $sessionKey = 'tables.' . md5(ListServers::class) . '_per_page';

        // Flag to prevent dehydrate from saving during the same request where we
        // restored the value from DB (otherwise a brand-new session would overwrite
        // the DB with the temporary default before dehydrate has the correct value).
        $justRestored = false;

        /**
         * RESTORE: On initial mount (new session / incognito), inject the user's
         * saved DB preference into the session so Filament picks it up, and also
         * set the property directly since bootedInteractsWithTable() already ran
         * with an empty session and defaulted to 10.
         */
        Livewire::listen('component.mount', function ($component) use ($sessionKey, &$justRestored) {
            if (!($component instanceof ListServers)) {
                return;
            }

            $user = auth()->user();
            if (!$user) {
                return;
            }

            // Session already has a value — Filament handles persistence from here.
            if (session()->has($sessionKey)) {
                return;
            }

            $customization = $this->getCustomizationArray($user);
            $usingGrid     = $user->getCustomization(CustomizationKey::DashboardLayout) === 'grid';
            $pageOptions   = $usingGrid ? self::GRID_OPTIONS  : self::TABLE_OPTIONS;
            $default       = $usingGrid ? self::DEFAULT_GRID  : self::DEFAULT_TABLE;

            $saved = (int) ($customization['server_per_page'] ?? $default);

            if (!in_array($saved, $pageOptions, true)) {
                $saved = $default;
            }

            // Inject into session so Filament reads it on subsequent requests.
            session()->put($sessionKey, $saved);

            // Set directly on the component — bootedInteractsWithTable() already ran
            // with an empty session, so we must override its default value here.
            $component->tableRecordsPerPage = $saved;

            // Signal to the dehydrate listener that we just restored; it should
            // not overwrite the DB in the same request.
            $justRestored = true;
        });

        /**
         * SAVE: component.dehydrate fires within the normal HTTP request lifecycle,
         * so auth()->user() is always available. At this point the Livewire component
         * property already reflects the user's current selection (set by Filament's
         * updatedTableRecordsPerPage()). We persist it to DB so it survives session
         * expiry and can be restored across devices / incognito windows.
         *
         * We skip the write when:
         *  - this same request just restored the value (avoid resetting DB to default)
         *  - the DB already stores the same value (avoid unnecessary writes)
         */
        Livewire::listen('component.dehydrate', function ($component) use (&$justRestored) {
            if (!($component instanceof ListServers)) {
                return;
            }

            if ($justRestored) {
                return;
            }

            $user = auth()->user();
            if (!$user) {
                return;
            }

            $perPage = (int) ($component->tableRecordsPerPage ?? 0);
            if ($perPage <= 0) {
                return;
            }

            // Only persist values that belong to the current layout's option list.
            $usingGrid    = $user->getCustomization(CustomizationKey::DashboardLayout) === 'grid';
            $validOptions = $usingGrid ? self::GRID_OPTIONS : self::TABLE_OPTIONS;
            if (!in_array($perPage, $validOptions, true)) {
                return;
            }

            $customization = $this->getCustomizationArray($user);

            // Skip DB write if the value is already in sync.
            if ((int) ($customization['server_per_page'] ?? 0) === $perPage) {
                return;
            }

            $customization['server_per_page'] = $perPage;
            $user->customization = json_encode($customization);
            $user->saveQuietly();
        });
    }

    private function getCustomizationArray(mixed $user): array
    {
        $raw = $user->customization;

        return (is_string($raw) ? json_decode($raw, true) : $raw) ?? [];
    }
}
