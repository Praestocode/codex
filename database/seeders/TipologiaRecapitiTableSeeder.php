<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipologiaRecapito;

class TipologiaRecapitiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipologiaRecapito::create(["idTipologiaRecapito" => 1, "nome" => "Cellulare Personale"]);
        TipologiaRecapito::create(["idTipologiaRecapito" => 2, "nome" => "Cellulare Lavoro"]);
        TipologiaRecapito::create(["idTipologiaRecapito" => 3, "nome" => "Email Personale"]);
        TipologiaRecapito::create(["idTipologiaRecapito" => 4, "nome" => "Email Lavoro"]);
        TipologiaRecapito::create(["idTipologiaRecapito" => 5, "nome" => "Pec"]);
        TipologiaRecapito::create(["idTipologiaRecapito" => 6, "nome" => "Fax"]);
    }
}
