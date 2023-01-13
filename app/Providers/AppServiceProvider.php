<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $userPermissions = auth()->user()->getAllPermissions()->pluck('id')->toArray();
                $menus = Menu::with('children')
                    ->where('parent_id', null)
                    ->whereHas('permission', function ($query) use ($userPermissions) {
                        $query->whereIn('id', $userPermissions);
                    })
                    ->orWhere('permission_id', null)
                    ->active()
                    ->orderBy('order')
                    ->get();

                $view->with('menus', $menus);
            }
        });

        Paginator::useBootstrapFive();
    }
}
