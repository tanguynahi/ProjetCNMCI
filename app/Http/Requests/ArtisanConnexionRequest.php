<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtisanConnexionRequest extends FormRequest
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
            'user_id' => 'exists:users,id',
            'contact' => 'required|string|exists|min:10|max:15|users,contact',
            // 'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function messages(): array
    {
        return [
            'contact.required' => 'Le champ contact est obligatoire.',
            'contact.string' => 'Le contact doit être une chaîne de caractères.',
            'contact.min' => 'Le contact doit comporter au moins 10 caractères.',
            'contact.max' => 'Le contact ne peut pas dépasser 15 caractères.',
            'contact.exists' => 'Aucun compte associé à ce Numero .',
            // 'email.email' => 'Veuillez entrer une adresse email valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}
