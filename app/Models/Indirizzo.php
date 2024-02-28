<?php

namespace App\Models;
use App\Models\TipologiaIndirizzo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indirizzo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "indirizzi";
    protected $primaryKey = "idIndirizzo";

    protected $fillable = [
        'idContatto',
        'idTipologiaIndirizzo',
        'idNazione',
        'idComune',
        'indirizzo',
        'civico',
        'cap',
        'localita',
    ];

    // FUNZIONE PER RITORNO DI APPARTENENZA
    public function tipologiaIndirizzi()
    {
        return $this->belongsTo(TipologiaIndirizzo::class, 'idTipologiaIndirizzo', 'idTipologiaIndirizzo');
    }
}
