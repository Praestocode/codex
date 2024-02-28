<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\EpisodioCollection;
use App\Http\Resources\v1\EpisodioResource;
use App\Http\Requests\v1\EpisodioUpdateRequest;
use App\Http\Requests\v1\EpisodioStoreRequest;
use App\Models\Episodio;
use Illuminate\Support\Facades\Gate;

class EpisodioController extends Controller
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
            // Recupera tutti gli episodi
            $episodi = Episodio::all();
            
            // Restituisce una collezione di oggetti Episodi
            return new EpisodioCollection($episodi);
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
            // Verifica se l'episodio con l'ID specificato esiste
            $episodio = Episodio::find($id);
            
            if ($episodio) {
                // Se l'episodio è presente, restituisce un'istanza di EpisodioResource per visualizzare la singola risorsa
                return new EpisodioResource($episodio);
            } else {
                // Se l'episodio non è presente, restituisce un errore 404 (Not Found) con un messaggio personalizzato
                abort(404, "Episodio inesistente");
            }
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403, "E' necessaria la registrazione.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodioStoreRequest $request)
    {
        if(Gate::allows("amministratore")) {
            $dati = $request->validated();
            $episodio = Episodio::create($dati);
            return new EpisodioResource($episodio);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EpisodioUpdateRequest $request, Episodio $episodio)
    {
        if(Gate::allows("amministratore")){
            $dati = $request->validated();
            $episodio->fill($dati);
            $episodio->save();
            return new EpisodioResource($episodio);
        } else {
            abort(403,"Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episodio $episodio)
    {
        if(Gate::allows("amministratore")){
            $episodio->delete();
            return response()->noContent();
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        } 
    }
}
