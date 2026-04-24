<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Native\Desktop\Events\AutoUpdater\CheckingForUpdate;
use Native\Desktop\Events\AutoUpdater\Error;
use Native\Desktop\Events\AutoUpdater\UpdateAvailable;
use Native\Desktop\Events\AutoUpdater\UpdateDownloaded;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Frissítés ellenőrzésének kezdete
        Event::listen(CheckingForUpdate::class, function () {
            Log::info('NativePHP: Frissítések ellenőrzése elindult...');
        });

        // Ha talált frissítést
        Event::listen(UpdateAvailable::class, function ($event) {
            Log::info('NativePHP: Új frissítés elérhető!');
        });

        // Ha sikeresen letöltötte
        Event::listen(UpdateDownloaded::class, function ($event) {
            Log::info('NativePHP: Frissítés letöltve, telepítésre kész.');
        });

        // Ha hiba történt az ellenőrzés vagy letöltés során
        Event::listen(Error::class, function ($event) {
            Log::error('NativePHP: Frissítési hiba: ' . $event->message);
        });
    }
}
