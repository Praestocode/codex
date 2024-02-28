<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        /* return parent::toArray($request); */
        return $this->getCampi();
    }

    //PROTECTED
    protected function getCampi()
    {
        return[
            'idEpisodio' => $this->idEpisodio,
            'idSerieTv' => $this->idSerieTv,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'numeroStagione' => $this->numeroStagione,
            'numeroEpisodio' => $this->numeroEpisodio,
            'durata' => $this->durata,
            'anno' => $this->anno,
            'idImmagine' => $this->idImmagine,
            'idFilmato' => $this->idFilmato,
        ];
    }
}
