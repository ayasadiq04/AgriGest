<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
            'en culture' => 'En culture',
            'récoltée' => 'Récoltée',
            'en jachère' => 'En jachère',
        ];
    }

    public function statutLibelle(): string
    {
        return self::statuts()[$this->statut] ?? $this->statut;
    }

    /**
     * Classe CSS valide pour le badge du statut (Slug sans accents).
     */
    public function statutBadge(): string
    {
        return Str::slug($this->statut);
    }
}