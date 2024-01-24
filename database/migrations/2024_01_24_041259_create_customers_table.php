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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("fullname")->comment("Nome do cliente.");
            $table->string("name_fantasy")->comment("Nome Fantasia (Empresa) ou Apelido")->nullable();
            $table->unsignedBigInteger("customer_type_id")->comment("Tipo de usuario");
            $table->boolean("active")->default(1)->comment("Se usuario esta ativo ou nao");
            $table->unsignedBigInteger("user_id");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_type_id')->references('id')->on('customer_type');
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
