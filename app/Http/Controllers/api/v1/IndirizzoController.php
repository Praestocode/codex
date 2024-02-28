<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\IndirizzoCollection;
use App\Http\Resources\v1\IndirizzoResource;
use App\Http\Requests\v1\IndirizzoUpdateRequest;
use App\Http\Requests\v1\IndirizzoStoreRequest;
use App\Models\Indirizzo;
use Illuminate\Support\Facades\Gate;;

class IndirizzoController extends Controller
{
    // FUNZIONE INDEX
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows("amministratore"))
        {
            $indirizzo = Indirizzo::all();
            if(request("idContatto") != null){
                $indirizzo = $indirizzo->where("idContatto", request("idContatto"));
            }
            if(request("idTipo") != null){
                $indirizzo = $indirizzo->where("idTipologiaIndirizzo", request("idTipo"));
            }
            if(request("idNazione") != null){
                $indirizzo = $indirizzo->where("idNazione", request("idNazione"));
            }
            if(request("idComune") != null){
                $indirizzo = $indirizzo->where("idComune", request("idComune"));
            }
            return new IndirizzoCollection($indirizzo);
        } else {
            abort(403, "Non hai i permessi per visualizzare le risorse di questo tipo");
        }
    }

    //FUNZIONE SHOW
    /**
     * Display the specified resource.
     */
    public function show(Indirizzo $indirizzo)
    {
        if(Gate::allows("amministratore"))
        {
            return new IndirizzoResource ($indirizzo);
        } else {
            abort(403, "Non hai i permessi per visualizzare le risorse di questo tipo");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndirizzoStoreRequest $request)
    {
        if(Gate::allows("amministratore"))
        {
            $dati = $request->validated();
            $indirizzo = Indirizzo::create($dati);
            return new IndirizzoResource($indirizzo);
        } else {
            abort(403, "Non hai i permessi eseguire questa azione.");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndirizzoUpdateRequest $request, Indirizzo $indirizzo)
    {
        if(Gate::allows("amministratore")) {
            $dati = $request->validated();
            $indirizzo->fill($dati);
            $indirizzo->save();
            return new IndirizzoResource($indirizzo);
        } else {
            abort(403, "Non hai i permessi eseguire questa azione.");  
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indirizzo $indirizzo)
    {
        if(Gate::allows("amministratore"))
        {
            $indirizzo->delete();
            return response()->noContent();
        } else {
            abort(403, "Non hai i permessi eseguire questa azione.");
        }
    }
}
