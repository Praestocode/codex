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
        Schema::create('contatti_contatti_ruoli', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idContatto');
            $table->unsignedBigInteger('idContattoRuolo');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idContatto')->references('idContatto')->on('contatti');
            $table->foreign('idContattoRuolo')->references('idContattoRuolo')->on('contatti_ruoli');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti_contatti_ruoli');
    }
};

