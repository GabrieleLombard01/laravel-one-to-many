<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100', 'unique:projects'],
            'description' => 'required|string',
            'thumb' => 'nullable|image:jpg,jpeg,png',
            //'category' => 'required|string',
            'status' => 'required|string',
            'type_id' => 'nullable|exists:types,id'
        ];
    }

    public function messages(): array
    {
        return
            [
                'title.required' => 'Attenzione! Il titolo è obbligatorio',
                'title.max' => 'Attenzione! Il titolo deve essere lungo massimo :max caratteri',
                'title.unique' => 'Attenzione! Questo titolo esiste già',

                'description.required' => 'Attenzione! La descrizione è obbligatoria',

                'thumb.image' => "Attenzione! l'immagine dev'essere in formato jpg, jpeg o png",

                'status.required' => "Attenzione! Lo stato è obbligatorio",

                //'category.required' => "Attenzione! Almeno un linguaggio è obbligatorio"

                'type_id.exists' => 'Il tipo indicato non esiste!'
            ];
    }
}
