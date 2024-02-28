<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SerieTv;

class SerieTvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SerieTv::create(
            [
                'idSerieTv' => 1,
                'idCategoria' => 4,
                'titolo' => 'Stranger Things',
                'descrizione' => 'Stranger Things è una serie televisiva statunitense di fantascienza ideata dai fratelli Duffer e prodotta da Netflix. La trama è ambientata negli anni ottanta nella cittadina immaginaria di Hawkins, nell\'Indiana, e vede come protagonisti un gruppo di ragazzi che si trova ad affrontare situazioni sovrannaturali e misteri, in particolare la scomparsa di uno di loro e l\'apparizione di una bambina con poteri telecinetici.',
                'totaleStagioni' => 4,
                'numeroEpisodio' => null,
                'regista' => 'The Duffer Brothers',
                'attori' => 'Winona Ryder, David Harbour, Finn Wolfhard, Millie Bobby Brown, Gaten Matarazzo, Caleb McLaughlin, Natalia Dyer, Charlie Heaton, Cara Buono, Matthew Modine',
                'annoInizio' => 2016,
                'annoFine' => null,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        SerieTv::create(
            [
                'idSerieTv' => 2,
                'idCategoria' => 5,
                'titolo' => 'The Haunting of Hill House',
                'descrizione' => 'The Haunting of Hill House è una serie televisiva statunitense di genere horror creata da Mike Flanagan. La trama è basata sul romanzo del 1959 L\'incubo di Hill House di Shirley Jackson. La serie segue la storia di una famiglia che cresce nella famigerata Hill House, con eventi soprannaturali che li perseguitano ancora da adulti.',
                'totaleStagioni' => 2,
                'numeroEpisodio' => null,
                'regista' => 'Mike Flanagan',
                'attori' => 'Michiel Huisman, Elizabeth Reaser, Oliver Jackson-Cohen, Kate Siegel, Victoria Pedretti, Carla Gugino, Henry Thomas, Timothy Hutton',
                'annoInizio' => 2018,
                'annoFine' => null,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        SerieTv::create(
            [
                'idSerieTv' => 3,
                'idCategoria' => 4,
                'titolo' => 'Black Mirror',
                'descrizione' => 'Black Mirror è una serie televisiva britannica di genere antologico, creata da Charlie Brooker. Ogni episodio presenta una storia indipendente, spesso incentrata sulle implicazioni oscure e impreviste della tecnologia moderna, portando spesso a conclusioni distopiche o surreali.',
                'totaleStagioni' => 5,
                'numeroEpisodio' => null,
                'regista' => 'Charlie Brooker',
                'attori' => 'Variano per ogni episodio',
                'annoInizio' => 2011,
                'annoFine' => null,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        SerieTv::create(
            [
                'idSerieTv' => 4,
                'idCategoria' => 2,
                'titolo' => 'Brooklyn Nine-Nine',
                'descrizione' => 'Brooklyn Nine-Nine è una serie televisiva statunitense di genere commedia creata da Michael Schur e Dan Goor. La serie segue le vicende del distretto di polizia del 99º distretto di New York, con un mix di umorismo, azione e situazioni eccentriche.',
                'totaleStagioni' => 8,
                'numeroEpisodio' => null,
                'regista' => 'Variano per ogni episodio',
                'attori' => 'Andy Samberg, Stephanie Beatriz, Terry Crews, Melissa Fumero, Joe Lo Truglio, Chelsea Peretti, Andre Braugher',
                'annoInizio' => 2013,
                'annoFine' => 2021,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );
        
        SerieTv::create(
            [
                'idSerieTv' => 5,
                'idCategoria' => 2,
                'titolo' => 'The Office',
                'descrizione' => 'The Office è una serie televisiva statunitense di genere commedia creata da Greg Daniels. La serie è stata girata in stile mockumentary e segue le vicende quotidiane degli impiegati di un ufficio di vendite della Dunder Mifflin, un\'azienda di forniture per ufficio.',
                'totaleStagioni' => 9,
                'numeroEpisodio' => null,
                'regista' => 'Variano per ogni episodio',
                'attori' => 'Steve Carell, Rainn Wilson, John Krasinski, Jenna Fischer, Mindy Kaling, B.J. Novak, Ellie Kemper, Ed Helms',
                'annoInizio' => 2005,
                'annoFine' => 2013,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

    }    
}
