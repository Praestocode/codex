<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContattoRuolo;

class ContattiRuoliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoRuolo::create(["idContattoRuolo" => 1, "ruolo" => "Amministratore"]);
        ContattoRuolo::create(["idContattoRuolo" => 2, "ruolo" => "Utente"]);
        ContattoRuolo::create(["idContattoRuolo" => 3, "ruolo" => "Ospite"]);
    }
}
