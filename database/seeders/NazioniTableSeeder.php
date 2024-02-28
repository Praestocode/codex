<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nazione;

class NazioniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/nazioni.csv");
        $file = fopen($csv, "r");
        while (($data = fgetcsv($file, 200, ",")) !== false) {
            Nazione::create([
                "nazione" => $data[1],
                "continente" => $data[2],
                "iso3" => $data[3],
                "iso2" => $data[4] ,
                "prefissoTelefonico" => $data[5],
            ]);
        }
        fclose($file);
    }
}
