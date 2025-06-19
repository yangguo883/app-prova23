<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Il percorso "home" dell'applicazione.
     *
     * Questo percorso viene utilizzato da Laravel per reindirizzare
     * gli utenti dopo il login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Definisci il binding dei modelli, i pattern delle rotte, ecc.
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Carica le rotte API con il prefisso "api"
            Route::middleware('api')
                 ->prefix('api')
                 ->group(base_path('routes/api.php'));

            // Carica le rotte web (se ne hai e se le usi)
            Route::middleware('web')
                 ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configura i rate limiter per l'applicazione.
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
