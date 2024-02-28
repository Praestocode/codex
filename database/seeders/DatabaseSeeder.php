<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ContattiRuoliTableSeeder::class,
            ComuniTableSeeder::class,
            NazioniTableSeeder::class,
            ContattiStatiTableSeeder::class,
            ContattiTableSeeder::class,
            TipologiaIndirizziTableSeeder::class,
            TipologiaRecapitiTableSeeder::class,
            RecapitiTableSeeder::class,
            IndirizziTableSeeder::class,
            CategorieTableSeeder::class,
            FilmTableSeeder::class,
            SerieTvTableSeeder::class,
            EpisodiTableSeeder::class,
            ContattiPasswordTableSeeder::class,
            ContattiAuthTableSeeder::class,
            ConfigurazioniTableSeeder::class,
            ContattiAbilitaTableSeeder::class,
            ContattiContattiRuoliTableSeeder::class,
            ContattiRuoli_ContattiAbilita_TableSeeder::class,
        ]);
    }
}
