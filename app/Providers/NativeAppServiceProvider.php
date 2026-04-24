<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Native\Desktop\Facades\MenuBar;
use Native\Desktop\Facades\Window;
use Native\Desktop\Contracts\ProvidesPhpIni;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        try {
            Artisan::call('migrate', [
                '--force' => true, // Éles módban kötelező a --force!
            ]);
        } catch (\Exception $e) {
            // Logold a hibát, ha nem sikerülne
            logger($e->getMessage());
        }

        MenuBar::create()
            ->icon(public_path('icon.ico'));

        Window::open('main')
            ->width(400)
            ->height(500)
            ->hideMenu()
            ->showDevTools(false);

        //$this->app->usePublicPath(base_path('public'));

        pclose(popen("start /B php artisan schedule:work", "r"));
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
        ];
    }
}
