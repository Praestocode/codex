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
        Schema::create('film', function (Blueprint $table) {
            $table->id('idFilm');
            $table->unsignedBigInteger('idCategoria');
            $table->string('titolo');
            $table->string('descrizione', 5000);
            $table->integer('durata');
            $table->string('regista', 255);
            $table->string('attori', 255);
            $table->smallInteger('anno');
            $table->integer('idImmagine')->nullable();
            $table->integer('idFilmato')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idCategoria')->references('idCategoria')->on('categorie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
