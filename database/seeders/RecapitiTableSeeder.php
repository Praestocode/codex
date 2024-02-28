<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recapito;

class RecapitiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recapito::create(
            [
                'idRecapito' => 1,
                'idContatto' => 1,
                'idTipologiaRecapito' => 1,
                'recapito' => "+39 334 272 2744",
            ]
        );
        Recapito::create(
            [
                'idRecapito' => 2,
                'idContatto' => 1,
                'idTipologiaRecapito' => 2,
                'recapito' => "+41 76 730 84 44",
            ]
        );

        Recapito::create(
            [
                'idRecapito' => 3,
                'idContatto' => 2,
                'idTipologiaRecapito' => 2,
                'recapito' => "+39 342 778 8500",
            ]
        );

        Recapito::create(
            [
                'idRecapito' => 4,
                'idContatto' => 3,
                'idTipologiaRecapito' => 3,
                'recapito' => "sofiamadio00@gmail.com",
            ]
        );

        Recapito::create(
            [
                'idRecapito' => 5,
                'idContatto' => 4,
                'idTipologiaRecapito' => 3,
                'recapito' => "lucadeamicis@gmail.com",
            ]
        );
    }
}
