<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParcelleRequest extends FormRequest
{
    /**
     * Autorisation : ici pas de restriction spécifique par utilisateur
     * (à adapter plus tard avec des policies/rôles si besoin).
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation communes à la création et à la modification.
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'culture' => ['required', 'string', 'max:255'],
            'superficie' => ['required', 'numeric', 'min:0.01'],
            'date_plantation' => ['required', 'date', 'before_or_equal:today'],
            'statut' => ['required', 'in:active,en_repos,recoltee'],
        ];
    }

    /**
     * Messages d'erreur personnalisés et explicites pour l'exploitant.
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de la parcelle est obligatoire.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'culture.required' => 'Veuillez indiquer la culture de la parcelle.',
            'superficie.required' => 'La superficie est obligatoire.',
            'superficie.numeric' => 'La superficie doit être un nombre (ex : 3.5).',
            'superficie.min' => 'La superficie doit être supérieure à 0.',
            'date_plantation.required' => 'La date de plantation est obligatoire.',
            'date_plantation.date' => 'La date de plantation doit être une date valide.',
            'date_plantation.before_or_equal' => 'La date de plantation ne peut pas être dans le futur.',
            'statut.required' => 'Veuillez sélectionner un statut.',
            'statut.in' => 'Le statut sélectionné est invalide.',
        ];
    }
}