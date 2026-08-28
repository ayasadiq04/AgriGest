<?php

namespace Database\Factories;

use App\Models\Parcelle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Parcelle>
 */
class ParcelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->unique()->randomElement([
                'Parcelle Nord', 'Parcelle Sud', 'Parcelle Est', 'Parcelle Ouest',
                'Champ des Moulins', 'Jardin de la ferme', 'Grand Pré', 'Petit Pré',
            ]),
            'culture' => fake()->randomElement(['Maïs', 'Blé', 'Orge', 'Tournesol', 'Colza', 'Pomme de terre']),
            'superficie' => fake()->randomFloat(2, 0.5, 15),
            'date_plantation' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'statut' => fake()->randomElement(array_keys(Parcelle::statuts())),
        ];
    }
}
