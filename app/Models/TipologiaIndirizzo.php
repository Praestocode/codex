<?php

namespace App\Models;
use App\Models\Indirizzo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipologiaIndirizzo extends Model
{
    use HasFactory;

    protected $table = "tipologia_indirizzi";
    protected $primaryKey = "idTipologiaIndirizzo";

    protected $fillable = [
        'idTipologiaIndirizzo',
        'nome',
    ];

    //ELENCO INDIRIZZI
    public function elencoIndirizzi()
    {
        return $this->hasMany(Indirizzo::class, 'idTipologiaIndirizzo', 'idTipologiaIndirizzo');
    }
}
