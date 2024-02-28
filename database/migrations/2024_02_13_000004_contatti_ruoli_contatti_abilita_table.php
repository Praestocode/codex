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
        Schema::create('contattiRuoli_contattiAbilita', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idContattoAbilita');
            $table->unsignedBigInteger('idContattoRuolo');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idContattoAbilita')->references('idContattoAbilita')->on('contatti_abilita');
            $table->foreign('idContattoRuolo')->references('idContattoRuolo')->on('contatti_ruoli');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contattiRuoli_contattiAbilita');
    }
};

