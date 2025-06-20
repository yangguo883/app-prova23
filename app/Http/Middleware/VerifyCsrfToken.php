<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Le URI che dovranno essere escluse dalla verifica CSRF.
     *
     * @var array
     */
    protected $except = [
        'api/*',
    ];
}
