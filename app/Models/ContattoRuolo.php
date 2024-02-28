<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContattoAbilita;
use Illuminate\Support\Facades\SoftDeletes;

class ContattoRuolo extends Model
{
    use HasFactory;

    protected $table = "contatti_ruoli";
    protected $primaryKey = "idContattoRuolo";

    protected $fillable = [
        "ruolo",
    ];

    // PUBLIC
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function abilita()
    {
        return $this->belongsToMany(ContattoAbilita::class, 'contattiRuoli_contattiAbilita' , 'idContattoRuolo', 'idContattoAbilita');
    }
    //-------------------------------------------------------------------------------------------------------------------------------
    /**
     * Aggiungi le abilita per il ruolo sulla tabella contattiRuoli_contattiAbilita
     * 
     * @param integer $idRuolo
     * @param string|array $idAbilita
     * @return Collection
     */
    public static function aggiungiRuoloAbilita($idRuolo, $idAbilita)
    {
        $ruolo = ContattoRuolo::where("idContattoRuolo", $idRuolo)->firstOrFail();
        if (is_string($idAbilita)) {
            $tmp = explode(',', $idAbilita);
        } else {
            $tmp = $idAbilita;
        }
        $ruolo->abilita()->attach($tmp);
        return $ruolo->abilita;
    }
}