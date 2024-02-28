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
        Schema::create('comuni', function (Blueprint $table) {
            $table->id('idComune');
            $table->string('comune', 45);
            $table->string('regione', 45);
            $table->string('provincia', 45);
            $table->string('siglaProv', 45);
            $table->string('codiceCatastale', 45);
            $table->unsignedBigInteger('cap');

            $table->softDeletes();
            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comuni');
    }
};
