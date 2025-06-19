<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Gli URI che dovrebbero essere esclusi dalla verifica CSRF.
     *
     * È possibile aggiungere sia la forma senza barra iniziale che con la barra (per essere sicuri).
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
