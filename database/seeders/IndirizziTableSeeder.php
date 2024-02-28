<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Indirizzo;

class IndirizziTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Indirizzo::create(
            [
                'idIndirizzo' => 1,
                'idContatto' => 1,
                'idTipologiaIndirizzo' => 1,
                'idNazione' => 90,
                'idComune' =>4999,
                'indirizzo' => 'Via dei Mille',
                'civico' => 93,
                'cap' => 63076,
                'localita' => null,
            ]
        );
        Indirizzo::create(
            [
                'idIndirizzo' => 2,
                'idContatto' => 1,
                'idTipologiaIndirizzo' => 2,
                'idNazione' => 90,
                'idComune' =>4999,
                'indirizzo' => 'Via del lavoro',
                'civico' => 72,
                'cap' => 63076,
                'localita' => null,
            ]
        );

        Indirizzo::create(
            [
                'idIndirizzo' => 3,
                'idContatto' => 2,
                'idTipologiaIndirizzo' => 2,
                'idNazione' => 90,
                'idComune' =>1714,
                'indirizzo' => 'Via Ripamonti',
                'civico' => 4,
                'cap' => 20019,
                'localita' => null,
            ]
        );

        Indirizzo::create(
            [
                'idIndirizzo' => 4,
                'idContatto' => 3,
                'idTipologiaIndirizzo' => 3,
                'idNazione' => 90,
                'idComune' =>4999,
                'indirizzo' => 'Via mare',
                'civico' => 19,
                'cap' => 63076,
                'localita' => null,
            ]
        );
    }
}
