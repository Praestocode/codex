<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieTvResource extends JsonResource
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
            'idSerieTv' => $this->idSerieTv,
            'idCategoria' => $this->idCategoria,
            'titolo' => $this->titolo,
            'descrizione' => $this->descrizione,
            'totaleStagioni' => $this->totaleStagioni,
            'numeroEpisodio' => $this->numeroEpisodio,
            'regista' => $this->regista,
            'attori' => $this->attori,
            'annoInizio' => $this->annoInizio,
            'annoFine' => $this->annoFine,
            'idImmagine' => $this->idImmagine,
            'idFilmato' => $this->idFilmato,
        ];
    }
}
