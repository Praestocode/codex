<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class IndirizzoStoreRequest extends FormRequest
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
            'idContatto' => 'required|integer',
            'idTipologiaIndirizzo' => 'required|integer',
            'idNazione' => 'required|integer',
            'idComune' => 'required|integer',
            'cap' => 'required|string',
            'indirizzo' => 'required|string',
            'civico' => 'required|string',
            'localita' => 'required|string',
        ];
    }
}
