<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaiementInscriptionRequest extends FormRequest
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
            "activite_artisan_id" => "required|integer|exists:activite_artisans,id",
            "chambre_regionale_id" => "required|integer|exists:chambre_regionales,id",
            "artisan_id" => "required|integer|exists:artisans,id",
            "facturation_id_1" => "required|integer|exists:facturations,id",
            "facturation_id_2" => "required|integer",
            "faturationinscription" => "required|integer",
            "montant_initial" => "required|integer",
        ];
    }

    public function messages(): array
    {
        return [
            'activite_artisan_id.required' => 'L\'ID de l\'activité artisanale est obligatoire.',
            'activite_artisan_id.integer' => 'L\'ID de l\'activité artisanale doit être un entier.',
            'activite_artisan_id.exists' => 'L\'ID de l\'activité artisanale n\'existe pas dans la base de données.',

            'chambre_regionale_id.required' => 'L\'ID de la chambre régionale est obligatoire.',
            'chambre_regionale_id.integer' => 'L\'ID de la chambre régionale doit être un entier.',
            'chambre_regionale_id.exists' => 'L\'ID de la chambre régionale n\'existe pas dans la base de données.',

            'artisan_id.required' => 'L\'ID de l\'artisan est obligatoire.',
            'artisan_id.integer' => 'L\'ID de l\'artisan doit être un entier.',
            'artisan_id.exists' => 'L\'ID de l\'artisan n\'existe pas dans la base de données.',

            'facturation_id_1.required' => 'L\'ID de la facturation 1 est obligatoire.',
            'facturation_id_1.integer' => 'L\'ID de la facturation 1 doit être un entier.',
            'facturation_id_1.exists' => 'L\'ID de la facturation 1 n\'existe pas dans la base de données.',

            'facturation_id_2.required' => 'L\'ID de la facturation 2 est obligatoire.',
            'facturation_id_2.integer' => 'L\'ID de la facturation 2 doit être un entier.',


            'faturationinscription.required' => 'Le montant total à payer est obligatoire.',
            'faturationinscription.integer' => 'Le montant total à payer doit être un entier.',

            'montant_initial.required' => 'Le montant initial est obligatoire.',
            'montant_initial.integer' => 'Le montant initial doit être un entier.',
        ];
    }


    // $request->validate([
    //     "activite_artisan_id" => "required|integer|exists:activite_artisans,id",
    //     "chambre_regionale_id" => "required|integer|exists:chambre_regionales,id",
    //     "artisan_id" => "required|integer|exists:artisans,id",
    //     "facturation_id_1" => "required|integer|exists:facturations,id",
    //     // "facturation_id_2" => "required|integer",
    //     "faturationinscription" => "required|integer",
    //     "montant_initial" => "required|integer",
    // ],[
    //     'activite_artisan_id.required' => 'L\'ID de l\'activité artisanale est obligatoire.',
    //     'activite_artisan_id.integer' => 'L\'ID de l\'activité artisanale doit être un entier.',
    //     'activite_artisan_id.exists' => 'L\'ID de l\'activité artisanale n\'existe pas dans la base de données.',

    //     'chambre_regionale_id.required' => 'L\'ID de la chambre régionale est obligatoire.',
    //     'chambre_regionale_id.integer' => 'L\'ID de la chambre régionale doit être un entier.',
    //     'chambre_regionale_id.exists' => 'L\'ID de la chambre régionale n\'existe pas dans la base de données.',

    //     'artisan_id.required' => 'L\'ID de l\'artisan est obligatoire.',
    //     'artisan_id.integer' => 'L\'ID de l\'artisan doit être un entier.',
    //     'artisan_id.exists' => 'L\'ID de l\'artisan n\'existe pas dans la base de données.',

    //     'facturation_id_1.required' => 'L\'ID de la facturation 1 est obligatoire.',
    //     'facturation_id_1.integer' => 'L\'ID de la facturation 1 doit être un entier.',
    //     'facturation_id_1.exists' => 'L\'ID de la facturation 1 n\'existe pas dans la base de données.',

    //     // 'facturation_id_2.required' => 'L\'ID de la facturation 2 est obligatoire.',
    //     // 'facturation_id_2.integer' => 'L\'ID de la facturation 2 doit être un entier.',


    //     'faturationinscription.required' => 'Le montant total à payer est obligatoire.',
    //     'faturationinscription.integer' => 'Le montant total à payer doit être un entier.',

    //     'montant_initial.required' => 'Le montant initial est obligatoire.',
    //     'montant_initial.integer' => 'Le montant initial doit être un entier.',
    // ]);
}
