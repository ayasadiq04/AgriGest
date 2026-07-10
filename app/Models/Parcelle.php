<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;

    /**
     * Champs autorisés pour l'assignation de masse (formulaires CRUD).
     */
    protected $fillable = [
        'nom',
        'culture',
        'superficie',
        'date_plantation',
        'statut',
    ];

    /**
     * Conversion automatique des types.
     */
    protected $casts = [
        'date_plantation' => 'date',
        'superficie' => 'decimal:2',
    ];

    /**
     * Libellés lisibles pour le statut (utile dans les vues Blade).
     */
    public static function statuts(): array
    {
        return [
            'active' => 'Active',
            'en_repos' => 'En repos',
            'recoltee' => 'Récoltée',
        ];
    }

    public function statutLibelle(): string
    {
        return self::statuts()[$this->statut] ?? $this->statut;
    }
}