<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContattoAbilita;

class ContattiAbilitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoAbilita::create(["idContattoAbilita" => 1, "nome" => "Visualizzare", "skill" => "visualizzare"]);
        ContattoAbilita::create(["idContattoAbilita" => 2, "nome" => "Creare","skill" => "creare"]);
        ContattoAbilita::create(["idContattoAbilita" => 3, "nome" => "Aggiornare", "skill" => "aggiornare"]);
        ContattoAbilita::create(["idContattoAbilita" => 4, "nome" => "Eliminare", "skill" => "eliminare"]);
    }
}

