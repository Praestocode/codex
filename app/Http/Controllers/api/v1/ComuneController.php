<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ComuneCollection;
use App\Http\Resources\v1\ComuneResource;
use App\Http\Requests\v1\ComuneUpdateRequest;
use App\Http\Requests\v1\ComuneStoreRequest;
use App\Models\Comune;
use Illuminate\Support\Facades\Gate;

class ComuneController extends Controller
{
    // FUNZIONE INDEX
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows("visualizzare2")) {
            $comune = Comune::all();
            if (request("codiceCat") != null) {
                $comune = $comune->where("codiceCatastale", request("codiceCat"));
            }
            if (request("comune") != null) {
                $comune = $comune->where("comune", request("comune"));
            }
            return new ComuneCollection($comune);
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
            // Verifica se il comune con l'ID specificato esiste
            $comune = Comune::find($id);

            if ($comune) {
                // Se il comune è presente, restituisce un'istanza di ComuneResource per visualizzare la singola risorsa
                return new ComuneResource($comune);
            } else {
                // Se il comune non è presente, restituisce un errore 404 (Not Found) con un messaggio personalizzato
                abort(404, "comune inesistente");
            }
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComuneStoreRequest $request)
    {
        if (Gate::allows("amministratore")) {
            $dati = $request->validated();
            $comune = Comune::create($dati);
            return new ComuneResource($comune);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComuneUpdateRequest $request, Comune $comune)
    {
        if (Gate::allows("amministratore")) {
            $dati = $request->validated();
            $comune->fill($dati);
            $comune->save();
            return new ComuneResource($comune);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comune $comune)
    {
        if (Gate::allows("amministratore")) {
            $comune->delete();
            return response()->noContent();
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }
}

