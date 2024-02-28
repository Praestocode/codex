<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\SoftDeletes;

class ContattoContattoRuolo extends Model
{
    use HasFactory;

    protected $table = "contatti_contatti_ruoli";
    protected $primaryKey = "id";

    protected $fillable = [
        "idContatto",
        "idContattoRuolo",
    ];
}