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
        Schema::create('cadeiras_reservadas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("cadeira_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamp("hora_reserva_inicial");
            $table->timestamp("hora_reserva_fim");

            $table->foreign("user_id", "fk_reservas_user_primary_id")->references("id")->on("users");
            $table->foreign("cadeira_id", "fk_reservas_cadeira_primary_id")->references("id")->on("cadeiras");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadeiras_reservadas');
    }
};
