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
        Schema::create('episodi', function (Blueprint $table) {
            $table->id('idEpisodio');
            $table->unsignedBigInteger('idSerieTv');
            $table->string('titolo');
            $table->string('descrizione', 5000);
            $table->integer('numeroStagione');
            $table->integer('numeroEpisodio');
            $table->integer('durata');
            $table->smallInteger('anno');
            $table->integer('idImmagine')->nullable();
            $table->integer('idFilmato')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idSerieTv')->references('idSerieTv')->on('serieTv');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodi');
    }
};