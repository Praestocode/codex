<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContattoPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContattiPasswordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            ContattoPassword::create([
                "idContattoPassword" => 1,
                "idContatto" => 1,
                'psw' => hash('sha256', 'ciao123'),
            ]);

            ContattoPassword::create([
                "idContattoPassword" => 2,
                "idContatto" => 2,
                'psw' => hash('sha256', 'Password123'),
            ]);
    
            ContattoPassword::create([
                "idContattoPassword" => 3,
                "idContatto" => 3,
                'psw' => hash('sha256', 'Psw102030'),
            ]);

            ContattoPassword::create([
                "idContattoPassword" => 4,
                "idContatto" => 5,
                'psw' => hash('sha256', 'SecretPSW210'),
            ]);
    }
}
