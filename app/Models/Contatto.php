<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use App\Models\ContattoRuolo;
use App\Models\ContattoStato;

class Contatto extends Authenticable
{
    use HasFactory, SoftDeletes;

    protected $table = "contatti";
    protected $primaryKey = "idContatto";

    protected $fillable = [
        "idContatto",
        "idContattoStato",
        "idContattoRuolo",
        "nome",
        "cognome",
        "sesso",
        "codiceFiscale",
        "partitaIva",
        "cittadinanza",
        "idNazioneNascita",
        "cittaNascita",
        "provinciaNascita",
        "dataNascita",
        "created_by",
        "updated_by",
    ];

    //PUBLIC
    /**
     * Aggiungi i ruoli per il contatto sulla tabella contatti_contatti_ruoli
     * 
     * @param integer $idContatto
     * @param string|array $idRuoli
     * @return Collection
     */
    public static function aggiungiContattoRuoli($idContatto, $idRuoli)
    {
        $contatto = Contatto::where("idContatto", $idContatto)->firstOrFail();
        if(is_string($idRuoli)) {
            $tmp = explode(',', $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        $contatto->ruoli()->attach($tmp);
        return $contatto->ruoli;
    }
    /**
     * Elimina i ruoli per il contatto sulla tabella contatti_contatti_ruoli
     * 
     * @param integer $idContatto
     * @param string|array $idRuoli
     * @return Collection
     */
    public static function eliminaContattoRuoli($idContatto, $idRuoli)
    {
        $contatto = Contatto::where("idContatto", $idContatto)->firstOrFail();
        if(is_string($idRuoli)) {
            $tmp = explode(',', $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        $contatto->ruoli()->detach($tmp);
        return $contatto->ruoli;
    }
    // PUBLIC FUNCTION RUOLI
    public function ruoli()
    {
        return $this->belongsToMany(ContattoRuolo::class, 'contatti_contatti_ruoli', 'idContatto', 'idContattoRuolo');
    }
    /**
     * Sincronizza i ruoli per il contatto sulla tabella contatti_contatti_ruoli
     * 
     * @param integer $idContatto
     * @param string|array $idRuoli
     * @return Collection
     */
    public static function sincronizzaContattoRuoli($idContatto, $idRuoli)
    {
        $contatto = Contatto::where("idContatto", $idContatto)->firstOrFail();
        if (is_string($idRuoli)) {
            $tmp = explode(',', $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        $contatto->ruoli()->sync($tmp);
        return $contatto->ruoli;
    }
    //-------------------------------------------------------------------------
    // FUNZIONE PER RITORNO DI APPARTENENZA
    public function StatoContatto()
    {
        return $this->belongsTo(ContattoStato::class, 'idContattoStato', 'idContattoStato');
    }
}
