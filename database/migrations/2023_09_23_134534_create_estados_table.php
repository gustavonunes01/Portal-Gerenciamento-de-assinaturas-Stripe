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
        Schema::create('estados', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('pais_id');
            $table->string('nome', 20);
            $table->string('sigla', 2);
            $table->timestamps();

            $table->foreign('pais_id')->references('id')->on('paises');
        });

        Schema::table('estados', function (Blueprint $table) {
            DB::statement('ALTER SEQUENCE estados_id_seq RESTART WITH 28');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
