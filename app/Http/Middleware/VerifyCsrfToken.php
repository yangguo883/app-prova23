<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Gli URI che dovrebbero essere esclusi dalla verifica CSRF.
     *
     * @var array
     */
    protected $except = [
        'register',
        'login',
        // Aggiungi altri endpoint se necessario per disabilitarli temporaneamente
    ];
}
