<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Episodio;

class EpisodiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episodio::create(
            [
                'idEpisodio' => 1,
                'idSerieTv' => 5,
                'titolo' => 'La giornata di formazione di Dwight',
                'descrizione' => 'Dwight organizza una giornata di formazione sulla sopravvivenza in ufficio, ma le cose prendono una piega inaspettata quando i dipendenti iniziano a interpretare la formazione come una prova reale di sopravvivenza. Michael si impegna a dimostrare la sua abilità di leadership durante l\'evento, ma finisce per fare più danni che altro.',
                'numeroStagione' => 2,
                'numeroEpisodio' => 1,
                'durata' => 30,
                'anno' => 2005,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Episodio::create(
            [
                'idEpisodio' => 2,
                'idSerieTv' => 3,
                'titolo' => 'Nosedive',
                'descrizione' => 'In un mondo dove ogni interazione sociale è valutata da una rete sociale e le persone sono classificate in base al loro punteggio sociale, una donna ossessionata dal migliorare il suo rating di socialità vede la sua vita sconvolta quando un\'imprevista serie di eventi la porta a una discesa verso il caos.',
                'numeroStagione' => 3,
                'numeroEpisodio' => 1,
                'durata' => 60,
                'anno' => 2016,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Episodio::create(
            [
                'idEpisodio' => 3,
                'idSerieTv' => 4,
                'titolo' => 'Il giorno del ringraziamento',
                'descrizione' => 'Mentre la squadra del 99° distretto si prepara per il loro tradizionale pranzo del Ringraziamento, un ex detenuto li avverte di una minaccia imminente. Inizia una gara contro il tempo per fermare il pericolo e salvare il loro pasto del Ringraziamento.',
                'numeroStagione' => 1,
                'numeroEpisodio' => 10,
                'durata' => 22,
                'anno' => 2013,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );

        Episodio::create(
            [
                'idEpisodio' => 4,
                'idSerieTv' => 5,
                'titolo' => 'Il cliente misterioso',
                'descrizione' => 'Michael e Dwight competono per ottenere l\'attenzione di un misterioso cliente che sta visitando l\'ufficio. Nel frattempo, Jim si imbatte in un vecchio compagno di scuola che lo porta a rivalutare la sua carriera, mentre Pam cerca di convincere Dwight a diventare il suo alleato in un nuovo progetto segreto.',
                'numeroStagione' => 2,
                'numeroEpisodio' => 2,
                'durata' => 30,
                'anno' => 2005,
                'idImmagine' => null,
                'idFilmato' => null,
            ]
        );
        
        
    }
}