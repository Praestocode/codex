<?php

namespace App\Models;
use App\Models\SerieTv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    use HasFactory;

    protected $table = "episodi";
    protected $primaryKey = "idEpisodio";

    protected $fillable = [
        'idSerieTv',
        'titolo',
        'descrizione',
        'numeroStagione',
        'numeroEpisodio',
        'durata',
        'anno',
        'idImmagine',
        'idFilmato',
    ];

    // FUNZIONE PER RITORNO DI APPARTENENZA
    public function serieTv()
    {
        return $this->belongsTo(SerieTv::class, 'idSerieTv', 'idSerieTv');
    }
}

