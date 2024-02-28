<?php

namespace App\Http\Middleware;

use App\Models\Contatto;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\api\v1\AccediController;
use App\Models\ContattoSessione;
use App\Models\Configurazione;

class Autenticazione
{
    /**
     * Handle an incoming request.
     * 
     * @param \Illuminate\Http\Request  $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Responmse|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (request("utente") != null && request("utente") > 0) {
            // Gestione dell'autenticazione tramite parametro "utente" (se fornito)
            $utente = Contatto::where("nome", request("utente"))->first();
            
            if ($utente) {
                if ($utente->idContattoStato == 1 || $utente->idContattoStato == 2) {
                    Auth::login($utente);
                    return $next($request);
                } else {
                    abort(403, "Il tuo account potrebbe essere sospeso o bannato.");
                }
            } else {
                abort(404, "Utente non trovato.");
            }
        } else {
            // Verifica il token nel Bearer
            $token = $request->bearerToken();
            //$token = $_SERVER['HTTP_AUTHORIZATION'];
            //$token = trim(str_replace("Bearer", "", $token));

            if ($token) {
                // Verifica se il token è presente nella tabella contattiSessioni
                $sessione = ContattoSessione::datiSessione($token); // MIA-->ContattoSessione::where("token", $token)->first(); //<--MIA

                if ($sessione != null) {

                    // Otteniamo il timestamp di inizio sessione dalla sessione
                    $inizioSessione = $sessione->inizioSessione;
                    // Stampiamo il timestamp di inizio sessione per il debug
                    //var_dump($inizioSessione);
                    // Otteniamo la durata della sessione dalla configurazione
                    $durataSessione = Configurazione::leggiValore("durataSessione");
                    // Stampiamo la durata della sessione per il debug
                    //echo "Valore della durata della sessione: " . $durataSessione. PHP_EOL;
                    // Calcoliamo il timestamp di scadenza della sessione
                    $scadenzaSessione = $inizioSessione + $durataSessione;
                    // Stampiamo il timestamp di scadenza della sessione per il debug
                    //var_dump($scadenzaSessione). PHP_EOL;       
                    // Verifichiamo se il timestamp corrente è inferiore al timestamp di scadenza della sessione

                    // Trovato un record nella tabella contattiSessioni con il token fornito
                    $utente = Contatto::find($sessione->idContatto);
                    if (time() < $scadenzaSessione){
                        if ($utente) {
                            // Se l'utente associato al token esiste, autenticalo
                            Auth::login($utente);
                            return $next($request);
                        } else {
                            // Se l'utente associato al token non esiste, restituisci un errore
                            abort(403, "Token valido ma utente non trovato.");
                        }
                    } else {
                        abort(403, "Sessione scaduta.");
                    }
                } else {
                    // Nessuna sessione trovata con il token fornito
                    abort(403, "Token non valido.");
                }
            } else {
                // Nessun token fornito nell'intestazione Authorization
                abort(404, "Inserire un token o un utente valido.");
            }
        }
    }
}
