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
        Schema::create('contatti_auth', function (Blueprint $table) {
            $table->id('idContattoAuth');
            $table->unsignedBigInteger('idContatto');
            $table->string('user')->unique();
            $table->string('secretJWT')->nullable();
            $table->unsignedBigInteger('inizioSfida')->nullable();
            $table->tinyInteger('obbligoCambio')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idContatto')->references('idContatto')->on('contatti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti_auth');
    }
};
