<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Configurazione;

class ConfigurazioniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configurazione::create(["idConfigurazione" => 1, "chiave" => "maxLoginErrati", "valore" => 5]);
        Configurazione::create(["idConfigurazione" => 2, "chiave" => "durataSfida", "valore" => 30]);
        Configurazione::create(["idConfigurazione" => 3, "chiave" => "durataSessione", "valore" => 900]);
        Configurazione::create(["idConfigurazione" => 4, "chiave" => "storicoPsw", "valore" => 3]);
    }
}
