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
        Schema::create('passaporte_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->string("customer_id")->nullable();
            $table->string("cpf")->nullable();
            $table->string("rg")->nullable();
            $table->string("rua")->nullable();
            $table->string("numero")->nullable();
            $table->string("bairro")->nullable();
            $table->string("cidade")->nullable();
            $table->string("complemento")->nullable();
            $table->string("cep")->nullable();
            $table->string("foto")->nullable();
            $table->string("whatsapp")->nullable();

            $table->foreign("user_id", "fk_passaporte_com_user_id")->references("id")->on("users");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passaporte_user');
    }
};
