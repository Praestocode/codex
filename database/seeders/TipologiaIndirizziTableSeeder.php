<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipologiaIndirizzo;

class TipologiaIndirizziTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 1, "nome" => "Domicilio"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 2, "nome" => "Ufficio"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 3, "nome" => "Indirizzo spedizioni"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 4, "nome" => "Residenza vacanze"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 5, "nome" => "Sede legale"]);
        TipologiaIndirizzo::create(["idTipologiaIndirizzo" => 6, "nome" => "Sede operativa"]);
    }
}
