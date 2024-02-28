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
        Schema::create('contatti', function (Blueprint $table) {
            $table->id('idContatto');
            $table->unsignedBigInteger('idContattoStato');
            $table->unsignedBigInteger('idContattoRuolo');
            $table->string('nome', 45);
            $table->string('cognome', 45);
            $table->unsignedTinyInteger('sesso')->unsigned()->nullable();
            $table->string('codiceFiscale', 45);
            $table->string('partitaIva', 45)->nullable();
            $table->string('cittadinanza', 45);
            $table->tinyInteger('idNazioneNascita')->length(4);
            $table->string('cittaNascita', 45);
            $table->string('provinciaNascita', 45);
            $table->date('dataNascita');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idContattoStato')->references('idContattoStato')->on('contatti_stati');
            $table->foreign('idContattoRuolo')->references('idContattoRuolo')->on('contatti_ruoli');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti');
    }
};
