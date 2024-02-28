<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContattoContattoRuolo;

class ContattiContattiRuoliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattoContattoRuolo::create(["id" => 1, "idContatto" => 1, "idContattoRuolo" => 1]);
        ContattoContattoRuolo::create(["id" => 2, "idContatto" => 2, "idContattoRuolo" => 1]);
        ContattoContattoRuolo::create(["id" => 3, "idContatto" => 3, "idContattoRuolo" => 2]);
        ContattoContattoRuolo::create(["id" => 4, "idContatto" => 4, "idContattoRuolo" => 3]);
    }
}
