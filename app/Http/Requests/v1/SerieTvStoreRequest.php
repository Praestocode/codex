<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class SerieTvStoreRequest extends FormRequest
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
            "idSerieTv" => "required|integer",
            "idCategoria" => "required|integer",
            "titolo" => "required|string",
            "descrizione" => "required|string",
            "totaleStagioni" => "required|integer",
            "numeroEpisodio" => "required|integer",
            "regista" => "required|string",
            "attori" => "required|string",
            "annoInizio" => "required|integer",
            "annoFine" => "required|integer",
            "idImmagine" => "required|integer",
            "idFilmato" => "required|integer",
        ];
    }
}