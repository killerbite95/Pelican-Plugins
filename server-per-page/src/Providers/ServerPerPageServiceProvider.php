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

        /**
         * On initial mount: if Filament's session has no per-page value stored yet
         * (first visit or expired session), restore the user's saved DB preference
         * and inject it into the session so Filament picks it up in
         * getDefaultTableRecordsPerPageSelectOption().
         *
         * We also set the property directly to cover the case where bootedInteractsWithTable()
         * already ran before this event fires.
         */
        Livewire::listen('component.mount', function ($component) use ($sessionKey) {
            if (!($component instanceof ListServers)) {
                return;
            }

            $user = auth()->user();
            if (!$user) {
                return;
            }

            $savedPerPage = $this->getSavedPerPage($user, $sessionKey);

            if ($savedPerPage === null) {
                return;
            }

            // Inject into session so Filament reads it on next boot cycle.
            session()->put($sessionKey, $savedPerPage);

            // Also set directly in case bootedInteractsWithTable() already ran.
            $component->tableRecordsPerPage = $savedPerPage;
        });

        /**
         * On every dehydrate (before response is sent to browser): persist the
         * current per-page value to the user's customization JSON in the DB so
         * it survives session expiry and works across devices.
         */
        Livewire::listen('component.dehydrate', function ($component) {
            if (!($component instanceof ListServers)) {
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

            $customization = $this->getCustomizationArray($user);

            // Avoid unnecessary DB writes on polling or other interactions.
            if ((int) ($customization['server_per_page'] ?? 0) === $perPage) {
                return;
            }

            $customization['server_per_page'] = $perPage;
            $user->customization = json_encode($customization);
            $user->saveQuietly();
        });
    }

    /**
     * Read the user's saved per-page from their DB customization.
     * Returns null if the session already has a value (Filament handles it).
     */
    private function getSavedPerPage(mixed $user, string $sessionKey): ?int
    {
        // Session already has a value — Filament's built-in session persistence
        // is working. We only need to act when the session is empty (first visit
        // or expired session).
        if (session()->has($sessionKey)) {
            return null;
        }

        $customization = $this->getCustomizationArray($user);

        $usingGrid = $user->getCustomization(CustomizationKey::DashboardLayout) === 'grid';

        $default     = $usingGrid ? self::DEFAULT_GRID : self::DEFAULT_TABLE;
        $pageOptions = $usingGrid ? self::GRID_OPTIONS : self::TABLE_OPTIONS;

        $saved = (int) ($customization['server_per_page'] ?? $default);

        // Ensure the saved value is valid for the current layout mode.
        if (!in_array($saved, $pageOptions, true)) {
            $saved = $default;
        }

        return $saved;
    }

    private function getCustomizationArray(mixed $user): array
    {
        $raw = $user->customization;

        return (is_string($raw) ? json_decode($raw, true) : $raw) ?? [];
    }
}
