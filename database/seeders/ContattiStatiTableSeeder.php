<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContattoStato;

class ContattiStatiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoStato::create([
            "idContattoStato" => 1,
            "stato" => "Attivo",
        ]);

        ContattoStato::create([
            "idContattoStato" => 2,
            "stato" => "Inattivo",
        ]);

        ContattoStato::create([
            "idContattoStato" => 3,
            "stato" => "Sospeso",
        ]);

        ContattoStato::create([
            "idContattoStato" => 4,
            "stato" => "Bannato",
        ]);
    }
}
