<?php

namespace App\Models;
use App\Models\Recapito;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipologiaRecapito extends Model
{
    use HasFactory;

    protected $table = "tipologia_recapiti";
    protected $primaryKey = "idTipologiaRecapito";

    protected $fillable = [
        'nome',
    ];

    //ELENCO INDIRIZZI
    public function elencoRecapiti()
    {
        return $this->hasMany(Recapito::class, 'idTipologiaRecapito', 'idTipologiaRecapito');
    }
}
