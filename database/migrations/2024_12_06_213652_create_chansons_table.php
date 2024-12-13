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
            $table->engine = 'InnoDB'; // Pour pouvoir utiliser les clés étrangères et les transactions
            $table->bigIncrements('id_chanson'); // Clé primaire automatiquement créée avec "bigIncrements()".
            // "usigned()" nécessaire pour éventuellement pouvoir définir une clé étrangère sur cette colonne.
            $table->integer('no')->nullable();
            $table->string('nom');
            $table->integer('duree')->nullable();
            $table->string('filePath');
            $table->text('parole')->nullable();
            $table->bigInteger('id_album')->unsigned();
            $table->bigInteger('id_langue')->unsigned()->nullable();
            $table->bigInteger('id_genre')->unsigned()->nullable();
            $table->bigInteger('id_user')->unsigned();
            $table->timestamps();

        });

        
        Schema::table('chansons', function (Blueprint $table) {
            $table->foreign('id_album')->references('id_album')->on('albums');
            $table->foreign('id_langue')->references('id_langue')->on('langues');
            $table->foreign('id_genre')->references('id_genre')->on('genres');
            $table->foreign('id_user')->references('id')->on('users');
        
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
