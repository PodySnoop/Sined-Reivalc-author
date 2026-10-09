<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chansons', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('image')->nullable();
            $table->string('sujet')->nullable();
            $table->longText('paroles')->nullable();
            $table->string('audio')->nullable(); // fichier pour le bouton play
            $table->string('telechargement')->nullable(); // fichier pour le bouton télécharger
            $table->string('genre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chansons');
    }
};