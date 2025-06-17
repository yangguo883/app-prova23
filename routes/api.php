<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Qui puoi registrare le rotte API per la tua applicazione. Queste
| rotte sono caricate dal RouteServiceProvider e sono assegnate
| al gruppo di middleware "api". Goditi la creazione della tua API!
|
*/

// ✅ Test API base
Route::get('/test', function () {
    return response()->json(['message' => 'API Laravel funzionante!']);
});

// ✅ Esempio API con parametro
Route::get('/saluta/{nome}', function ($nome) {
    return response()->json(['saluto' => "Ciao, $nome!"]);
});

// ✅ Esempio di chiamata autenticata (richiede Passport o Sanctum, vedi nota sotto)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
