<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class EpisodioStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "idEpisodio" => "required|integer",
            "idSerieTv" => "required|integer",
            "titolo" => "required|string",
            "descrizione" => "required|string",
            "numeroStagione" => "required|integer",
            "numeroEpisodio" => "required|integer",
            "durata" => "required|integer",
            "anno" => "required|integer",
            "idImmagine" => "required|integer",
            "idFilmato" => "required|integer",
        ];
    }
}