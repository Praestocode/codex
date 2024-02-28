<?php

namespace App\Http\Controllers\api\v1;
use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Models\ContattoAuth;
use App\Models\ContattoPassword;
use App\Models\ContattoAccesso;
use App\Models\Configurazione;
use App\Models\ContattoSessione;
use Illuminate\Support\Str;

class AccediController extends Controller
{

    // FUNZIONE SHOW
    /**
     * Punto di ingresso del login
     * 
     * @param string $utente
     * @param string $hash
     * @return AppHelpers\ritornoCustom
     */
    public function show($utente, $hash = null)
    {
        if($hash == null) {
            return AccediController::controlloUtente($utente);
        }else {
            return AccediController::controlloPassword($utente, $hash);
        }
    }

    
    //CONTROLLO UTENTE
    //PROTECTED
    /**
     * Controllo utente
     * 
     * @param string $utente
     * @return AppHelpers\rispostaCustom
     */
    protected static function controlloUtente($utente)
    {
        $sale = hash("sha512", trim(Str::random(200)));
        if (ContattoAuth::esisteUtenteValidoPerLogin($utente)) {
            $auth = ContattoAuth::where('user', $utente) ->first();
            $auth->secretJWT = hash("sha512", trim(Str::random(200)));
            $auth->inizioSfida = time();
            $auth->save();
            $recordPassword = ContattoPassword::passwordAttuale($auth->idContatto);
            $recordPassword->sale = $sale;
            $recordPassword->save();
        }else{
            echo "Non esiste.". PHP_EOL; //non esiste.
        }
        //////////////////// SALE + PASSWORD
        $recordPassword = ContattoPassword::passwordAttuale($auth->idContatto);
        $password = $recordPassword->psw;
        $sale = $recordPassword->sale;
        $passwordNascostaDB = AppHelpers::nascondiPassword($password, $sale);
        return "Unione stringhe 'sale' e 'password': " . $passwordNascostaDB. PHP_EOL;
        //////////////////// SALE + PASSWORD
        $dati = array("sale" => $sale);
        return AppHelpers::rispostaCustom($dati);
    }


    //CONTROLLO PASSWORD
    //------------------------------------------------------------
    /**
     * Punto di ingresso del login
     * 
     * @param string $utente
     * @param string $hash
     * @return AppHelpersrispostaCustom
     */
    protected static function controlloPassword($utente, $hashClient)
    {
    if(ContattoAuth::esisteUtenteValidoPerLogin($utente)) {
        $auth = ContattoAuth::where('user', $utente)->first();
        $secretJWT = $auth->secretJWT;
        $inizioSfida = $auth->inizioSfida;
        $durataSfida = Configurazione::leggiValore("durataSfida");
        $maxTentativi = Configurazione::leggiValore("maxLoginErrati");
        $scadenzaSfida = $inizioSfida + $durataSfida;
        if (time () < $scadenzaSfida) {
            $tentativi = ContattoAccesso::contaTentativi($auth->idContatto);
            if($tentativi < $maxTentativi - 1) {
                $recordPassword = ContattoPassword::passwordAttuale($auth->idContatto);
                $password = $recordPassword->psw;
                $sale = $recordPassword->sale;
                $passwordNascostaDB = AppHelpers::nascondiPassword($password, $sale);
                if ($hashClient == $passwordNascostaDB) {
                    // Creazione token di sessione dopo login
                    $tk = AppHelpers::creaTokenSessione($auth->idContatto, $secretJWT);
                    ContattoAccesso::eliminaTentativi($auth->idContatto);
                    $accesso = ContattoAccesso::aggiungiAccesso($auth->idContatto);
                    ContattoSessione::eliminaSessione($auth->idContatto);
                    ContattoSessione::aggiornaSessione($auth->idContatto, $tk);
                    $dati = array("tk" => $tk);
                    return AppHelpers::rispostaCustom($dati);
                }else{
                    ContattoAccesso::aggiungiTentativoFallito($auth->idContatto);
                    abort(403, "ERR L004 - Password errata");
                }
            } else {
                abort(403, "ERR L003 - Troppi tentativi di login");
            }
        } else {
            ContattoAccesso::aggiungiTentativoFallito($auth->idContatto);
            abort(403, "ERR L002 - Tempo scaduto");
        }
    } else {
        abort(403, "ERR L001");
    }
    }
}
