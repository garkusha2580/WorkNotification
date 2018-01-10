<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @param Dispatcher $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(
                'MAIN NAVIGATION',
                [
                    'text' => 'Blog',
                    'url' => 'admin/blog',
                    'can' => 'manage-blog',
                ],
                [
                    'text' => 'Pages',
                    'url' => route("home"),
                    'icon' => 'file',
                ],
                [
                    'text' => 'Append to notification',
                    'url' => route("notification.create"),
                    'icon' => 'file',
                ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
