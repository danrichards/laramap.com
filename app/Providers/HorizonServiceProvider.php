<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Laravel\Horizon\Horizon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class HorizonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Horizon::auth(function (Request $request) {
            if (app()->environment('local')) {
                return true;
            }

            if (Auth::check()) {
                $user = auth()->user();
                if (! $user->is_admin) {
                    return false;
                }

                return true;
            } else {
                return redirect('/login');
            }
        });

        Horizon::routeMailNotificationsTo('florian@mapawa.de');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
