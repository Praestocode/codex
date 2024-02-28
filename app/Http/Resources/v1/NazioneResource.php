<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NazioneResource extends JsonResource
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
            'idNazione' => $this->idNazione,
            'nazione' => $this->nazione,
            'continente' => $this->continente,
            'iso3' => $this->iso3,
            'iso2' => $this->iso2,
            'prefissoTelefonico' => $this->prefissoTelefonico,
        ];
    }
}
