<?php

namespace App\Models;
use App\Models\Categoria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = "film";
    protected $primaryKey = "idFilm";

    protected $fillable = [
        'idFilm',
        'idCategoria',
        'titolo',
        'descrizione',
        'durata',
        'regista',
        'attori',
        'anno',
        'idImmagine',
        'idFilmato',
    ];

    // FUNZIONE PER RITORNO DI APPARTENENZA
    public function Categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }
}
