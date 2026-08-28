<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Harmoniser les valeurs de statut avec le domaine (spec recherche/filtre).
     */
    public function up(): void
    {
        Schema::table('parcelles', function (Blueprint $table) {
            $table->enum('statut', ['en culture', 'récoltée', 'en jachère'])
                ->default('en culture')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parcelles', function (Blueprint $table) {
            $table->enum('statut', ['active', 'en_repos', 'recoltee'])
                ->default('active')
                ->change();
        });
    }
};
