<?php

namespace App\Helpers;

use \Firebase\JWT\JWT;
use App\Models\Contatto;


class AppHelpers{

    //PUBLIC
    /**
     * Toglie il required alle rules di aggiornamento
     * 
     * @param array $rules
     * @return array
     */
    public static function aggiornaRegoleHelper($rules)
    {
        $newRules = array_map(function($value) {
            return str_replace("required|", "", $value);
        }, $rules);
    
        return $newRules;
    } 
    
     //------------------------------------------------------------
     /**
      * Controlla se esiste l'utente passato
      *
      * @param boolean $successo TRUE se la richiesta è andata a buon fine
      * @param integer $codice STATUS CODE della richiesta
      * @param array $dati Dati richiesti
      * @param string $messaggio
      * @param array $errori
      * @return array
      */
      public static function rispostaCustom($dati, $msg = null, $err = null)
      {
        $response = array();
        $response["data"] = $dati;
        if ($msg != null) $response["message"] = $msg;
        if ($err !=null) $response["error"] = $err;
        return $response;
      }
    //------------------------------------------------------------
    /**
     * 
     */

     /**
      * Unisci password e sale a fai HASH
      *
      * @param string $password
      * @param string $sale
      * @return string
      */
      public static function nascondiPassword($psw, $sale)
      {
        return hash("sha512", $sale . $psw);
      }
    //------------------------------------------------------------
    /**
     * 
     */

     /**
      * Crea il token di sessione
      *
      * @param integer $idContatto
      * @param string $secretJWT
      * @return string $token
      */
      public static function creaTokenSessione($idContatto, $secretJWT, $usaDa = null, $scade = null)
      {
          $maxTime = 15 * 24 * 60 * 60; //il token scade sempre dopo 15 giorni max
          $recordContatto = Contatto::where("idContatto", $idContatto) -> first();
          $t = time();
          $nbf = ($usaDa == null) ? $t : $usaDa;
          $exp = ($scade == null) ? $nbf + $maxTime : $scade;
          $ruolo = $recordContatto->ruoli[0];
          $idRuolo = $ruolo->idContattoRuolo;
          $abilita = $ruolo->abilita;
          $abilita = $ruolo->abilita->toArray();
          $abilita = array_map(function($arr) {
              return $arr["idContattoAbilita"];
          }, $abilita);
  
          $arr = array(
              "iss" => 'http://localhost:8000',
              "aud" => null,
              "iat" => $t,
              "nbf" => $nbf,
              "exp" => $exp,
              "data" => array(
                  "idContatto" => $idContatto,
                  "idContattoStato" => $recordContatto->idContattoStato,
                  "idContattoRuolo" => $idRuolo,
                  "abilita" => $abilita,
                  "nome" => trim($recordContatto->nome . " " . $recordContatto->cognome)
              )
              );
              $token = JWT::encode($arr, $secretJWT, 'HS256');
              return $token;
      }
}


     
     

