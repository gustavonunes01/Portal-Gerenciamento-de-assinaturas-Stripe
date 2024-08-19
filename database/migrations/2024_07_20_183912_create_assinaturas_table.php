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
        Schema::create('assinaturas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("passaporte_id");
            $table->string("subscription_id");
            $table->string("plan_id")->comment("Plano selecionado da assinatura")->nullable();
            $table->unsignedBigInteger("unidade_id")->comment("Unidade de atuação.")->nullable();
            $table->enum("status", ['incomplete', 'incomplete_expired', 'trialing', 'active', 'past_due', 'canceled', 'unpaid', 'paused'])->nullable();
            $table->string("valor")->comment("Valor que a assinatura ira pagar.")->nullable();

            $table->foreign("passaporte_id", "fk_assinaturas_passaporte_id")->references("id")->on("passaporte_user");
            $table->foreign("unidade_id", "fk_assinaturas_unidade_id")->references("id")->on("unidades");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assinaturas');
    }
};
