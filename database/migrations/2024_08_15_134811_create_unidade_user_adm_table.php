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
        Schema::create('unidade_user_adm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("unidade_id");
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id", "fk_adm_de_reserva_user_id")->references("id")->on("users");
            $table->foreign("unidade_id", "fk_adm_de_unidade_id")->references("id")->on("unidades");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidade_user_adm');
    }
};
