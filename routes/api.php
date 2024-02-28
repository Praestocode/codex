<?php

use App\Http\Controllers\api\v1\AccediController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\IndirizzoController;
use App\Http\Controllers\api\v1\TipologiaIndirizzoController;
use App\Http\Controllers\api\v1\NazioneController;
use App\Http\Controllers\api\v1\ComuneController;
use App\Http\Controllers\api\v1\CategoriaController;
use App\Http\Controllers\api\v1\FilmController;
use App\Http\Controllers\api\v1\SerieTvController;
use App\Http\Controllers\api\v1\EpisodioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

if(!defined('_VERS')) {
    define('_VERS', 'v1');
}


//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//


// --------------- API APERTE --------------- API APERTE --------------- API APERTE --------------- API APERTE --------------- API APERTE --------------- //
//AUTENTICAZIONE
Route::middleware(["autenticazione:Amministratore, Utente, Ospite"])->group(function () {
// Rotta per l'autenticazione
Route::get(_VERS . '/accedi/{utente}/{hash?}', [AccediController::class, 'show']);
// Nazioni
Route::get(_VERS . '/nazioni', [NazioneController::class, 'index']); //mostra risorse
Route::get(_VERS . '/nazioni/{nazione}', [NazioneController::class, 'show']); //mostra singola risorsa
// Comuni
Route::get(_VERS . '/comuni', [ComuneController::class, 'index']); //mostra risorse
Route::get(_VERS . '/comuni/{comune}', [ComuneController::class, 'show']); //mostra singola risorsa
// Tipologia_indirizzi
Route::get(_VERS . '/tipologiaIndirizzi', [TipologiaIndirizzoController::class, 'index']); //mostra risorse
Route::get(_VERS . '/tipologiaIndirizzi/{tipologiaIndirizzo}', [TipologiaIndirizzoController::class, 'show']); //mostra singola risorsa
});
// --------------- API APERTE --------------- API APERTE --------------- API APERTE --------------- API APERTE --------------- API APERTE --------------- //


//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//


// --------------- API UTENTE --------------- API UTENTE --------------- API UTENTE --------------- API UTENTE --------------- API UTENTE --------------- //
//AUTENTICAZIONE UTENTE
Route::middleware(["autenticazione:Amministratore, Utente"])->group(function () {
//Categorie
Route::get(_VERS . '/categorie', [CategoriaController::class, 'index']); //mostra risorse
Route::get(_VERS . '/categorie/{categoria}', [CategoriaController::class, 'show']); //mostra singola risorsa
//Film
Route::get(_VERS . '/film', [FilmController::class, 'index']); //mostra risorse
Route::get(_VERS . '/film/{film}', [FilmController::class, 'show']); //mostra singola risorsa
//SerieTv
Route::get(_VERS . '/serieTv', [SerieTvController::class, 'index']); //mostra risorse
Route::get(_VERS . '/serieTv/{serieTv}', [SerieTvController::class, 'show']); //mostra singola risorsa
//Episodi
Route::get(_VERS . '/episodi', [EpisodioController::class, 'index']); //mostra risorse
Route::get(_VERS . '/episodi/{episodio}', [EpisodioController::class, 'show']); //mostra singola risorsa
});
// --------------- API UTENTE --------------- API UTENTE --------------- API UTENTE --------------- API UTENTE --------------- API UTENTE --------------- //


//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//


// --------------- API ADMIN --------------- API ADMIN --------------- API ADMIN --------------- API ADMIN --------------- API ADMIN -------------------- //
Route::middleware(["autenticazione:Amministratore "])->group(function() {
// Categorie
Route::put(_VERS . '/categorie/{categoria}', [CategoriaController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/categorie', [CategoriaController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/categorie/{categoria}', [CategoriaController::class, 'destroy']); //elimina risorsa
// Film
Route::put(_VERS . '/film/{film}', [FilmController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/film', [FilmController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/film/{film}', [FilmController::class, 'destroy']); //elimina risorsa
// Serie Tv
Route::put(_VERS . '/serieTv/{serieTv}', [SerieTvController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/serieTv', [SerieTvController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/serieTv/{serieTv}', [SerieTvController::class, 'destroy']); //elimina risorsa
// Episodi
Route::put(_VERS . '/episodi/{episodio}', [EpisodioController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/episodi', [EpisodioController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/episodi/{episodio}', [EpisodioController::class, 'destroy']); //elimina risorsa
// Indirizzi
Route::get(_VERS . '/indirizzi', [IndirizzoController::class, 'index']); //mostra risorse
Route::get(_VERS . '/indirizzi/{indirizzo}', [IndirizzoController::class, 'show']); //mostra singola risorsa
Route::put(_VERS . '/indirizzi/{indirizzo}', [IndirizzoController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/indirizzi', [IndirizzoController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/indirizzi/{indirizzo}', [IndirizzoController::class, 'destroy']); //elimina risorsa
// Tipologia Indirizzi
Route::put(_VERS . '/tipologiaIndirizzi/{tipologiaIndirizzo}', [TipologiaIndirizzoController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/tipologiaIndirizzi', [TipologiaIndirizzoController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/tipologiaIndirizzi/{tipologiaIndirizzo}', [tipologiaIndirizzoController::class, 'destroy']); //elimina risorsa
// Nazioni
Route::put(_VERS . '/nazioni/{nazione}', [NazioneController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/nazioni', [NazioneController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/nazioni/{nazione}', [NazioneController::class, 'destroy']); //elimina risorsa
// Comuni
Route::put(_VERS . '/comuni/{comune}', [ComuneController::class, 'update']); //modifica risorsa
Route::post(_VERS . '/comuni', [ComuneController::class, 'store']); //aggiunge risorsa
Route::delete(_VERS . '/comuni/{comune}', [ComuneController::class, 'destroy']); //elimina risorsa
});
// --------------- API ADMIN --------------- API ADMIN --------------- API ADMIN --------------- API ADMIN --------------- API ADMIN -------------------- //

//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------------------------------------------------------------------------------//

