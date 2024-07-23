<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdministrateurRequest extends FormRequest
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
            // 'user_id' => 'required|exists:users,id',
            'ville_id' => 'required|exists:villes,id',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'contact' => 'required|string:administrateurs,contact,',
            'email' => 'required|email:administrateurs,email,',
            'adresse' => 'nullable|string|max:255',
            'sexe' => 'required|string|in:M,F',
            'lien_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            // 'user_id.required' => 'Le champ utilisateur est requis.',
            // 'user_id.exists' => 'L\'utilisateur sélectionné n\'existe pas.',
            'ville_id.required' => 'Le champ ville est requis.',
            'ville_id.exists' => 'La ville sélectionnée n\'existe pas.',
            'nom.required' => 'Le champ nom est requis.',
            'prenom.required' => 'Le champ prénom est requis.',
            'contact.required' => 'Le champ contact est requis.',
            // 'contact.unique' => 'Le contact doit être unique.',
            'email.required' => 'Le champ email est requis.',
            'email.email' => 'Le champ email doit être une adresse email valide.',
            // // 'email.unique' => 'L\'email doit être unique.',
            'sexe.required' => 'Le champ sexe est requis.',
            'sexe.in' => 'Le champ sexe doit être soit Homme soit Femme.',
            'lien_photo.image' => 'Le fichier doit être une image.',
            'lien_photo.mimes' => 'Le fichier doit être de type jpeg, png, jpg.',
            'lien_photo.max' => 'La taille de l\'image ne doit pas dépasser 2MB.',
        ];
    }
}
