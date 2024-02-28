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
        Schema::create('indirizzi', function (Blueprint $table) {
            $table->id('idIndirizzo');
            $table->unsignedBigInteger('idContatto');
            $table->unsignedBigInteger('idTipologiaIndirizzo');
            $table->unsignedBigInteger('idNazione');
            $table->unsignedBigInteger('idComune');
            $table->string('cap', 15)->nullable();
            $table->string('indirizzo', 255);
            $table->string('civico', 15)->nullable();
            $table->string('localita', 255)->nullable();

            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('idNazione')->references('idNazione')->on('nazioni');
            $table->foreign('idContatto')->references('idContatto')->on('contatti');
            $table->foreign('idComune')->references('idComune')->on('comuni');
            $table->foreign('idTipologiaIndirizzo')->references('idTipologiaIndirizzo')->on('tipologia_indirizzi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirizzi');
    }
};
