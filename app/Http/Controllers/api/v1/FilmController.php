<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmResource;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Http\Requests\v1\FilmStoreRequest;
use App\Models\Film;
use Illuminate\Support\Facades\Gate;

class FilmController extends Controller
{
    // FUNZIONE INDEX
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verifica se l'utente attuale ha il permesso di "visualizzare"
        if(Gate::allows("visualizzare"))
        {
            // Recupera tutte i film
            $film = Film::all();
            
            // Restituisce una collezione di oggetti Film
            return new FilmCollection($film);
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403, "E' necessaria la registrazione.");
        }
    }

    // FUNZIONE SHOW
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Verifica se l'utente attuale ha il permesso di "visualizzare"
        if (Gate::allows("visualizzare")) {
            // Verifica se la categoria con l'ID specificato esiste
            $film = Film::find($id);
            
            if ($film) {
                // Se il Film è presente, restituisce un'istanza di FilmResource per visualizzare la singola risorsa
                return new FilmResource($film);
            } else {
                // Se il Film non è presente, restituisce un errore 404 (Not Found) con un messaggio personalizzato
                abort(404, "Film inesistente");
            }
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403, "E' necessaria la registrazione.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmStoreRequest $request)
    {
        if(Gate::allows("amministratore")){
            $dati = $request->validated();
            $film = Film::create($dati);
            return new FilmResource($film);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilmUpdateRequest $request, Film $film)
    {
        if(Gate::allows("amministratore")){
            $dati = $request->validated();
            $film->fill($dati);
            $film->save();
            return new FilmResource($film);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        if(Gate::allows("amministratore")){
            $film->delete();
            return response()->noContent();
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }
}
