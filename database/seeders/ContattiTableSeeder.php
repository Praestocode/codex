<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contatto;

class ContattiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contatto::create([
            "idContatto" => 1,
            "idContattoStato" => 1,
            "idContattoRuolo" => 1,
            "nome" => "Virgilio",
            "cognome" => "Polini",
            "sesso" => 0,
            "codiceFiscale" => "PLNVGL1028349920213",
            "partitaIva" => "IT123456789654",
            "cittadinanza" => "Italiana",
            "idNazioneNascita" => 90,
            "cittaNascita" => "San Benedetto del Tronto",
            "provinciaNascita" => "Ascoli Piceno",
            "dataNascita" => "1997-10-10",
            "created_by" => 1,
            "updated_by" => 1,
        ]);

        Contatto::create([
            "idContatto" => 2,
            "idContattoStato" => 1,
            "idContattoRuolo" => 1,
            "nome" => "Riccardo",
            "cognome" => "Giordano",
            "sesso" => 0,
            "codiceFiscale" => "GRDRCD102834992021",
            "partitaIva" => "IT123456789012",
            "cittadinanza" => "Italiana",
            "idNazioneNascita" => 90,
            "cittaNascita" => "Milano",
            "provinciaNascita" => "Milano",
            "dataNascita" => "1997-8-16",
            "created_by" => 1,
            "updated_by" => 1,
        ]);

        Contatto::create([
            "idContatto" => 3,
            "idContattoStato" => 1,
            "idContattoRuolo" => 2,
            "nome" => "Sofia",
            "cognome" => "Amadio",
            "sesso" => 1,
            "codiceFiscale" => "AMDSFAD10283499202",
            "partitaIva" => "IT125256789390",
            "cittadinanza" => "Italiana",
            "idNazioneNascita" => 90,
            "cittaNascita" => "Teramo",
            "provinciaNascita" => "Teramo",
            "dataNascita" => "2000-9-4",
            "created_by" => 1,
            "updated_by" => 1,
        ]);

        Contatto::create([
            "idContatto" => 4,
            "idContattoStato" => 1,
            "idContattoRuolo" => 3,
            "nome" => "Luca",
            "cognome" => "De Amicis",
            "sesso" => 0,
            "codiceFiscale" => "LCADMCD10283723201",
            "partitaIva" => null,
            "cittadinanza" => "Italiana",
            "idNazioneNascita" => 90,
            "cittaNascita" => "San Benedetto del Tronto",
            "provinciaNascita" => "Ascoli Piceno",
            "dataNascita" => "1998-9-23",
            "created_by" => 1,
            "updated_by" => 1,
        ]);

        Contatto::create([
            "idContatto" => 5,
            "idContattoStato" => 4,
            "idContattoRuolo" => 2,
            "nome" => "Marco",
            "cognome" => "Verdi",
            "sesso" => 0,
            "codiceFiscale" => "MRCVRDD10283723201",
            "partitaIva" => null,
            "cittadinanza" => "Italiana",
            "idNazioneNascita" => 90,
            "cittaNascita" => "San Benedetto del Tronto",
            "provinciaNascita" => "Ascoli Piceno",
            "dataNascita" => "1995-8-18",
            "created_by" => 1,
            "updated_by" => 1,
        ]);
    }
}
