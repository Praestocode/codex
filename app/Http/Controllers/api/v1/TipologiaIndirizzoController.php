<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TipologiaIndirizzoCollection;
use App\Http\Resources\v1\TipologiaIndirizzoResource;
use App\Http\Requests\v1\TipologiaIndirizzoUpdateRequest;
use App\Http\Requests\v1\TipologiaIndirizzoStoreRequest;
use App\Models\TipologiaIndirizzo;
use Illuminate\Support\Facades\Gate;

class TipologiaIndirizzoController extends Controller
{
    // FUNZIONE INDEX
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows("visualizzare2")){
            $tipologiaIndirizzi = TipologiaIndirizzo::all();
            return new TipologiaIndirizzoCollection($tipologiaIndirizzi);
        } else {
            abort(403);
        }
    }

    // FUNZIONE SHOW
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Verifica se l'utente attuale ha il permesso di "visualizzare"
        if (Gate::allows("visualizzare2")) {
            // Verifica se la tipologia indirizzo con l'ID specificato esiste
            $tipologiaIndirizzo = TipologiaIndirizzo::find($id);
            
            if ($tipologiaIndirizzo) {
                // Se la tipologia indirizzo è presente, restituisce un'istanza di TipologiaIndirizzoResource per visualizzare la singola risorsa
                return new TipologiaIndirizzoResource($tipologiaIndirizzo);
            } else {
                // Se la tipologia indirizzo non è presente, restituisce un errore 404 (Not Found) con un messaggio personalizzato
                abort(404, "tipologia indirizzo inesistente");
            }
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipologiaIndirizzoStoreRequest $request)
    {
        if(Gate::allows("amministratore")) {
            $dati = $request->validated();
            $tipologiaIndirizzo = TipologiaIndirizzo::create($dati);
            return new TipologiaIndirizzoResource($tipologiaIndirizzo);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipologiaIndirizzoUpdateRequest $request, TipologiaIndirizzo $tipologiaIndirizzo)
    {
        if(Gate::allows("amministratore")) {
            $dati = $request->validated();
            $tipologiaIndirizzo->fill($dati);
            $tipologiaIndirizzo->save();
            return new TipologiaIndirizzoResource($tipologiaIndirizzo);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipologiaIndirizzo $tipologiaIndirizzo)
    {
        if(Gate::allows("amministratore")) {
            $tipologiaIndirizzo->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }
}
