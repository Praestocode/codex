<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class NazioneStoreRequest extends FormRequest
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
            "idNazione" => "required|integer",
            "nazione" => "required|string",
            "continente" => "required|string",
            "iso2" => "required|string",
            "iso3" => "required|string",
            "prefissoTelefonico" => "required|string",
        ];
    }
}