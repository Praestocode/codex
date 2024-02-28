<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comune;

class ComuniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/comuni.csv");
        $file = fopen($csv, "r");
        while (($data = fgetcsv($file, 200, ",")) !== false) {
            $provincia = $data[3]; // Assume il valore dal terzo elemento
            if (empty($provincia)) {
                $provincia = $data[4]; // Se è vuoto, prende il valore dal quarto elemento
            }
            Comune::create([
                "comune" => $data[1],
                "regione" => $data[2],
                "provincia" => $provincia,
                "siglaProv" => $data[5],
                "codiceCatastale" => $data[6],
                "cap" => $data[9],
            ]);
        }
        fclose($file);
    }
}