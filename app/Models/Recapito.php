<?php

namespace App\Models;
use App\Models\TipologiaRecapito;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recapito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "recapiti";
    protected $primaryKey = "idRecapito";

    protected $fillable = [
        'idRecapito',
        'idContatto',
        'idTipologiaRecapito',
        'recapito',
    ];

    // FUNZIONE PER RITORNO DI APPARTENENZA
    public function tipologiaRecapito()
    {
        return $this->belongsTo(TipologiaRecapito::class, 'idTipologiaRecapito', 'idTipologiaRecapito');
    }
}