<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeActiviteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'branche_activite_id' => "required|integer",
            'libelle' => 'required|string|min:3',
            'description' => "nullable|string|min:3",
        ];
    }
    public function messages(): array
    {
        return [
            'branche_activite_id.required' => 'Le champ Branche Activité est obligatoire.',
            'branche_activite_id.integer' => 'Le champ Branche Activité doit être un nombre entier.',
            'libelle.required' => 'Le champ Libellé est obligatoire.',
            'libelle.string' => 'Le champ Libellé doit être une chaîne de caractères.',
            'libelle.min' => 'Le champ Libellé doit comporter au moins :min caractères.',
            'description.string' => 'Le champ Description doit être une chaîne de caractères.',
            'description.min' => 'Le champ Description doit comporter au moins :min caractères.',
        ];
    }
}
