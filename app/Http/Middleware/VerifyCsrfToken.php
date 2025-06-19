<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Gli URI che dovrebbero essere esclusi dalla verifica CSRF.
     *
     * Includiamo sia la forma senza slash iniziale che con la barra.
     *
     * @var array
     */
    protected $except = [
        'register',
        '/register',
        'login',
        '/login',
    ];
}
