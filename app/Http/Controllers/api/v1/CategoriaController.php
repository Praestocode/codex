<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CategoriaCollection;
use App\Http\Resources\v1\CategoriaResource;
use App\Http\Requests\v1\CategoriaUpdateRequest;
use App\Http\Requests\v1\CategoriaStoreRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Categoria;

class CategoriaController extends Controller
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
            // Recupera tutte le categorie
            $categorie = Categoria::all();
            
            // Restituisce una collezione di oggetti Categoria
            return new CategoriaCollection($categorie);
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
            $categoria = Categoria::find($id);
            
            if ($categoria) {
                // Se la categoria è presente, restituisce un'istanza di CategoriaResource per visualizzare la singola risorsa
                return new CategoriaResource($categoria);
            } else {
                // Se la categoria non è presente, restituisce un errore 404 (Not Found) con un messaggio personalizzato
                abort(404, "Categoria inesistente");
            }
        } else {
            // Se l'utente non ha il permesso, restituisce un errore 403 (accesso negato) con un messaggio
            abort(403, "E' necessaria la registrazione.");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaStoreRequest $request)
    {
        if (Gate::allows('amministratore')) {
            $data = $request->validated();
            $categoria = Categoria::create($data);
            return new CategoriaResource($categoria);
        } else {
            abort(403, 'Non hai i permessi per eseguire questa azione');
        }
    }

    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        if (Gate::allows("amministratore")) {
            $data = $request->validated();
            $categoria->fill($data);
            $categoria->save();
            return new CategoriaResource($categoria);
        } else {
            abort(403, 'Non hai i permessi per eseguire questa azione');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        if (Gate::allows('amministratore')) {
            $categoria->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'Non hai i permessi per eseguire questa azione');
        }
    }
}
