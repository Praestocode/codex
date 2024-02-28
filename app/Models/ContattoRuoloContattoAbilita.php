<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\SoftDeletes;

class ContattoRuoloContattoAbilita extends Model
{
    use HasFactory;

    protected $table = "contattiRuoli_contattiAbilita";
    protected $primaryKey = "id";

    protected $fillable = [
        "idContattoAbilita",
        "idContattoRuolo",
    ];
}