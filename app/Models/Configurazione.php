<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configurazione extends Model
{
    use HasFactory;

    protected $table = "configurazioni";
    protected $primaryKey = "idConfigurazione";

    protected $fillable = [
        'chiave',
        'valore',
    ];


    public static function leggiValore($chiave)
{
    $configurazione = Configurazione::where('chiave', $chiave)->first();
    if ($configurazione) {
        return $configurazione->valore;
    } else {
        echo ("NON TROVO NULLA");
        return null;
    }
}
}





