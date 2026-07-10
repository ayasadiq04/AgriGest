<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration : création de la table "parcelles".
     */
    public function up(): void
    {
        Schema::create('parcelles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('culture');
            $table->decimal('superficie', 8, 2)->comment('Superficie en hectares');
            $table->date('date_plantation');
            $table->enum('statut', ['active', 'en_repos', 'recoltee'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Annule la migration : suppression de la table "parcelles".
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelles');
    }
};