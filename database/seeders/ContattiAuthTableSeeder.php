<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ContattoAuth;

class ContattiAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Esempio di dati di esempio per il seeding
        $utenti = [
            [
                'idContatto' => 1,
                'user' => 'Virgilio',
            ],
            [
                'idContatto' => 2,
                'user' => 'Riccardo',
            ],
            [
                'idContatto' => 3,
                'user' => 'Sofia',
            ],
            [
                'idContatto' => 5,
                'user' => 'Marco',
            ],
        ];


        foreach ($utenti as $utente) {
            ContattoAuth::create([
                'idContatto' => $utente['idContatto'],
                'user' => $utente['user'],
                'secretJWT' => NULL,
                'inizioSfida' => NULL,
                'obbligoCambio' => 3, // Impostiamo sempre obbligoCambio a "3"
            ]);
        }
    }
}


