<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\SerieTvCollection;
use App\Http\Resources\v1\SerieTvResource;
use App\Http\Requests\v1\SerieTvUpdateRequest;
use App\Http\Requests\v1\SerieTvStoreRequest;
use App\Models\SerieTv;
use Illuminate\Support\Facades\Gate;

class SerieTvController extends Controller
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
            // Recupera tutte le SerieTv
            $serieTv = SerieTv::all();
            
            // Restituisce una collezione di oggetti SerieTv
            return new SerieTvCollection($serieTv);
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
            $serieTv = SerieTv::find($id);
            
            if ($serieTv) {
                // Se la SerieTv è presente, restituisce un'istanza di SerieTvResource per visualizzare la singola risorsa
                return new SerieTvResource($serieTv);
            } else {
                // Se la SerieTv non è presente, restituisce un errore 404 (Not Found) con un messaggio personalizzato
                abort(404, "SerieTv inesistente");
            }
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403, "E' necessaria la registrazione.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SerieTvStoreRequest $request)
    {
        if(Gate::allows("amministratore")) {
            $dati = $request->validated();
            $serieTv = SerieTv::create($dati);
            return new SerieTvResource($serieTv);      
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SerieTvUpdateRequest $request, SerieTv $serieTv)
    {
        if(Gate::allows("amministratore")){
            $dati = $request->validated();
            $serieTv->fill($dati);
            $serieTv->save();
            return new SerieTvResource($serieTv);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SerieTv $serieTv)
    {
        if(Gate::allows("amministratore")){
            $serieTv->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }
}
