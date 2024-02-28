<?php

namespace App\Models;
use App\Models\Contatto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContattoStato extends Model
{
    use HasFactory;

    protected $table = "contatti_stati";
    protected $primaryKey = "idContattoStato";

    protected $fillable = [
        'stato',
    ];

    //ELENCO CONTATTI PER STATO
    public function elencoContatti()
    {
        return $this->hasMany(Contatto::class, 'idContattoStato', 'idContattoStato');
    }
}

