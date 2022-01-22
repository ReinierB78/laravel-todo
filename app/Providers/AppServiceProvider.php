<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

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
    public function boot(Request $request)
    {

        Schema::defaultStringLength(191);

        $pathArray = $request->segments();

        $adminRoute = config('app.admin_route');

        if(in_array($adminRoute, $pathArray) ) {
            config(['app.app_scope' => 'admin']);
        }

        if(config('app.app_scope') == 'admin') {
            $path = resource_path('admin');
        } else {
            $path = resource_path('frontend');
        }
        // dd($path);
        view()->addLocation($path);
    }
}
