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
        Schema::create('ondas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('Bateria')->unsigned();
            $table->unsignedBiginteger('Surfista')->unsigned();

            $table->foreign('Bateria')->references('id')->on('baterias')->onDelete('cascade');
            $table->foreign('Surfista')->references('número')->on('surfistas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ondas');
    }
};
