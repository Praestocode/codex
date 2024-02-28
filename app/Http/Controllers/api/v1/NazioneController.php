<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\NazioneCollection;
use App\Http\Resources\v1\NazioneResource;
use App\Http\Requests\v1\NazioneUpdateRequest;
use App\Http\Requests\v1\NazioneStoreRequest;
use App\Models\Nazione;
use Illuminate\Support\Facades\Gate;

class NazioneController extends Controller
{
    // FUNZIONE INDEX
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows("visualizzare2")) {
            $nazione = Nazione::all();
            if(request("continente") != null){
                $nazione = $nazione->where("continente", request("continente"));
            }
            if(request("nazione") != null){
                $nazione = $nazione->where("nazione", request("nazione"));
            }
            if(request("iso3") != null){
                $nazione = $nazione->where("iso3", request("iso3"));
            }
            if(request("prefisso") != null){
                $nazione = $nazione->where("prefissoTelefonico", request("prefisso"));
            }
            return new NazioneCollection($nazione);
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
            // Verifica se la nazione con l'ID specificato esiste
            $nazione = Nazione::find($id);
            
            if ($nazione) {
                // Se la nazione è presente, restituisce un'istanza di nazioneResource per visualizzare la singola risorsa
                return new NazioneResource($nazione);
            } else {
                // Se la nazione non è presente, restituisce un errore 404 (Not Found) con un messaggio personalizzato
                abort(404, "nazione inesistente");
            }
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NazioneStoreRequest $request)
    {
        if(Gate::allows("amministratore")) {
            $dati = $request->validated();
            $nazione = Nazione::create($dati);
            return new NazioneResource($nazione);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NazioneUpdateRequest $request, Nazione $nazione)
    {
        if(Gate::allows("amministratore")) {
            $dati = $request->validated();
            $nazione->fill($dati);
            $nazione->save();
            return new NazioneResource($nazione);
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nazione $nazione)
    {
        if(Gate::allows("amministratore")) {
            $nazione->delete();
            return response()->noContent();
        } else {
            abort(403, "Non hai i permessi per eseguire questa azione.");
        }
    }
}
