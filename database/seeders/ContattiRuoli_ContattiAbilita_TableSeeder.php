<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContattoRuoloContattoAbilita;

class ContattiRuoli_ContattiAbilita_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoRuoloContattoAbilita::create(["id" => 1, "idContattoAbilita" => 1, "idContattoRuolo" => 1]);
        ContattoRuoloContattoAbilita::create(["id" => 2, "idContattoAbilita" => 2, "idContattoRuolo" => 1]);
        ContattoRuoloContattoAbilita::create(["id" => 3, "idContattoAbilita" => 3, "idContattoRuolo" => 1]);
        ContattoRuoloContattoAbilita::create(["id" => 4, "idContattoAbilita" => 4, "idContattoRuolo" => 1]);

        ContattoRuoloContattoAbilita::create(["id" => 5, "idContattoAbilita" => 1, "idContattoRuolo" => 2]);
        ContattoRuoloContattoAbilita::create(["id" => 6, "idContattoAbilita" => 3, "idContattoRuolo" => 2]);

    }
}

