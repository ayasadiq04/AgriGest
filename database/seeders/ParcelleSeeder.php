<?php

namespace Database\Seeders;

use App\Models\Parcelle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParcelleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * US6 — Préremplir la base avec des parcelles fictives,
     * réparties sur les trois statuts pour tester la recherche et le filtre.
     */
    public function run(): void
    {
        $parcelles = [
            ['nom' => 'Parcelle Nord', 'culture' => 'Maïs', 'superficie' => 3.5, 'statut' => 'en culture'],
            ['nom' => 'Parcelle Sud', 'culture' => 'Blé', 'superficie' => 5.25, 'statut' => 'récoltée'],
            ['nom' => 'Champ des Moulins', 'culture' => 'Maïs', 'superficie' => 8.0, 'statut' => 'en culture'],
            ['nom' => 'Parcelle Est', 'culture' => 'Tournesol', 'superficie' => 2.75, 'statut' => 'en jachère'],
            ['nom' => 'Grand Pré', 'culture' => 'Orge', 'superficie' => 12.4, 'statut' => 'récoltée'],
            ['nom' => 'Petit Pré', 'culture' => 'Pomme de terre', 'superficie' => 1.2, 'statut' => 'en culture'],
            ['nom' => 'Jardin de la ferme', 'culture' => 'Colza', 'superficie' => 4.6, 'statut' => 'en jachère'],
            ['nom' => 'Parcelle Ouest', 'culture' => 'Blé', 'superficie' => 6.9, 'statut' => 'en culture'],
        ];

        foreach ($parcelles as $index => $parcelle) {
            $parcelle['date_plantation'] = now()->subMonths(rand(1, 18))->format('Y-m-d');

            if ($index === 0) {
                Parcelle::create($parcelle);
                continue;
            }

            Parcelle::factory()->create($parcelle);
        }
    }
}
