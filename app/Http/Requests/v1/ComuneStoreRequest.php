<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ComuneStoreRequest extends FormRequest
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
            "idComune" => "required|integer",
            "comune" => "required|string",
            "regione" => "required|string",
            "provincia" => "required|string",
            "siglaProv" => "required|string",
            "codiceCatastale" => "required|string",
            "cap" => "required|integer",
        ];
    }
}
