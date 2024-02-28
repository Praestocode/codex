<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContattoAuth extends Model
{
    use HasFactory;

    protected $table = "contatti_auth";
    protected $primaryKey = "idContattoAuth";

    protected $fillable = [
        "idContatto",
        "user",
        "secretJWT",
        "inizioSfida",
        "obbligoCambio",
    ];


    // PUBLIC
    /**
     * Controlla se esiste l'utente passato
     * 
     * @param strin $user
     * @return boolean
     */
    public static function esisteUtenteValidoPerLogin($user)
    {
        echo "Valore di \$user ricevuto: " . $user . PHP_EOL;
        $tmp = DB::table('contatti')->join('contatti_auth', 'contatti.idContatto', '=', 'contatti_auth.idContatto')->where('contatti.idContattoStato', '=', 1)->where('contatti_auth.user', '=', $user)->select('contatti_auth.idContatto')->get()->count();
        return ($tmp > 0) ? true : false;
    }
}
