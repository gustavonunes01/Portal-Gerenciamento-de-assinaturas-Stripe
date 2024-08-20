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
        Schema::create('cadeiras', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->timestamp("horario_disponivel_inicial");
            $table->timestamp("horario_disponivel_fim");
            $table->boolean("ativa")->default(true);
            $table->unsignedBigInteger("unidade_id");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("unidade_id", "fk_cadeiras_unidade_id")->references("id")->on("unidades");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadeiras');
    }
};
