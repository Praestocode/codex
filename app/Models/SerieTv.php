<?php

namespace App\Models;
use App\Models\Episodio;
use App\Models\Categoria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerieTv extends Model
{
    use HasFactory;

    protected $table = "serieTv";
    protected $primaryKey = "idSerieTv";

    protected $fillable = [
        'idCategoria',
        'titolo',
        'descrizione',
        'totaleStagioni',
        'numeroEpisodio',
        'regista',
        'attori',
        'annoInizio',
        'annoFine',
        'idImmagine',
        'idFilmato',
    ];

    //ELENCO EPISODI
    public function elencoEpisodi()
    {
        return $this->hasMany(Episodio::class, 'idSerieTv', 'idSerieTv');
    }
    // FUNZIONE PER RITORNO DI APPARTENENZA
    public function Categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }
}
