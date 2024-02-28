<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::create(
            [
                'idFilm' => 1,
                'idCategoria' => 1,
                'titolo' => 'John Wick',
                'descrizione' => 'Il leggendario assassino John Wick si è allontanato dal mondo della violenza dopo aver sposato con l\'amore della propria vita. Quando la donna muore improvvisamente, il giovane cade nello sconforto più profondo. Il perfido criminale Iosef Tarasov decide di tormentarlo rubandogli l\'automobile ed uccidendogli il cane. Per l\'uomo è l\'ora della vendetta.',
                'durata' => 120,
                'regista' => 'Chad Stahelski',
                'attori' => 'Keanu Reeves, Lance Reddick, Ian McShane, John Leguizamo, Alfie Allen, Bridget Moynahan, Adrianne Palicki, Michael Nyqvist',
                'anno' => 2015,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Film::create(
            [
                'idFilm' => 2,
                'idCategoria' => 1,
                'titolo' => 'Il Padrino',
                'descrizione' => 'Il Padrino è un film del 1972 diretto da Francis Ford Coppola, basato sul romanzo omonimo di Mario Puzo. Il film racconta la storia di una famiglia mafiosa italo-americana guidata da Don Vito Corleone e delle sue lotte per mantenere il potere nella New York degli anni \'40.',
                'durata' => 175,
                'regista' => 'Francis Ford Coppola',
                'attori' => 'Marlon Brando, Al Pacino, James Caan, Robert Duvall, Diane Keaton',
                'anno' => 1972,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Film::create(
            [
                'idFilm' => 3,
                'idCategoria' => 4,
                'titolo' => 'Inception',
                'descrizione' => 'Inception è un film del 2010 diretto da Christopher Nolan, interpretato da Leonardo DiCaprio, distribuito da Warner Bros. Pictures e realizzato con la collaborazione di Legendary Pictures. La pellicola, di genere fantascientifico e thriller psicologico, è incentrata sul concetto di "inserire idee" nei sogni delle persone.',
                'durata' => 148,
                'regista' => 'Christopher Nolan',
                'attori' => 'Leonardo DiCaprio, Ken Watanabe, Joseph Gordon-Levitt, Marion Cotillard, Ellen Page, Tom Hardy, Cillian Murphy, Tom Berenger, Michael Caine',
                'anno' => 2010,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Film::create(
            [
                'idFilm' => 4,
                'idCategoria' => 4,
                'titolo' => 'Interstellar',
                'descrizione' => 'Interstellar è un film del 2014 diretto da Christopher Nolan. La pellicola, basata su un soggetto dell\'astronomo Kip Thorne e scritta dallo stesso regista insieme al fratello Jonathan, ha come interpreti principali Matthew McConaughey, Anne Hathaway, Jessica Chastain, Bill Irwin, Ellen Burstyn, Matt Damon e Michael Caine.',
                'durata' => 169,
                'regista' => 'Christopher Nolan',
                'attori' => 'Matthew McConaughey, Anne Hathaway, Jessica Chastain, Bill Irwin, Ellen Burstyn, Matt Damon, Michael Caine',
                'anno' => 2014,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Film::create(
            [
                'idFilm' => 5,
                'idCategoria' => 2,
                'titolo' => 'Una settimana da Dio',
                'descrizione' => 'Una settimana da Dio è un film del 2003 diretto da Tom Shadyac e interpretato da Jim Carrey e Morgan Freeman. La trama segue la storia di un uomo egoista e cinico, interpretato da Jim Carrey, che riceve il potere divino per una settimana da parte di Dio, interpretato da Morgan Freeman.',
                'durata' => 101,
                'regista' => 'Tom Shadyac',
                'attori' => 'Jim Carrey, Morgan Freeman, Jennifer Aniston, Philip Baker Hall, Catherine Bell',
                'anno' => 2003,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Film::create(
            [
                'idFilm' => 6,
                'idCategoria' => 9,
                'titolo' => 'La La Land',
                'descrizione' => 'La La Land è un film del 2016 scritto e diretto da Damien Chazelle. Il film racconta la storia d\'amore tra un musicista jazz, interpretato da Ryan Gosling, e un\'aspirante attrice, interpretata da Emma Stone, che si sviluppa a Los Angeles, la città delle stelle.',
                'durata' => 128,
                'regista' => 'Damien Chazelle',
                'attori' => 'Ryan Gosling, Emma Stone, John Legend, Rosemarie DeWitt',
                'anno' => 2016,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );
    }
}

