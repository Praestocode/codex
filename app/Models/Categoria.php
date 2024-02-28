<?php

namespace App\Models;
use App\Models\Film;
use App\Models\SerieTv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = "categorie";
    protected $primaryKey = "idCategoria";

    protected $fillable = [
        'categoria',
    ];

    //ELENCO FILM
    public function elencoFilm()
    {
        return $this->hasMany(Film::class, 'idCategoria', 'idCategoria');
    }
    //ELENCO SERIE TV
    public function elencoSerieTv()
    {
        return $this->hasMany(SerieTv::class, 'idCategoria', 'idCategoria');
    }
}
