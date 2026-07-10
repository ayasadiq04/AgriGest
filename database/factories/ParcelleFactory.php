<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParcelleFactory extends Factory
{
    /**
     * Nom du modèle correspondant (déductible automatiquement,
     * mais explicite ici pour la clarté pédagogique).
     */
    protected $model = \App\Models\Parcelle::class;

    /**
     * Définit l'état par défaut du modèle.
     */
    public function definition(): array
    {
        $cultures = ['Blé', 'Maïs', 'Orge', 'Tournesol', 'Colza', 'Pomme de terre', 'Luzerne', 'Vigne'];

        return [
            'nom' => 'Parcelle ' . $this->faker->unique()->numberBetween(1, 500),
            'culture' => $this->faker->randomElement($cultures),
            'superficie' => $this->faker->randomFloat(2, 0.5, 25),
            'date_plantation' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'statut' => $this->faker->randomElement(['active', 'en_repos', 'recoltee']),
        ];
    }
}