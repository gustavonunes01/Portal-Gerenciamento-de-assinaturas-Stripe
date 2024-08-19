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
        Schema::create('integradores', function (Blueprint $table) {
            $table->id();
            
            $table->string('codigo', 10);
            $table->string('nome',50);
            $table->boolean('habilitado_prod')->default(false);
            $table->boolean('ativo')->default(true);
            
            $table->text('prod_url')->nullable();
            $table->text('prod_login')->nullable();
            $table->text('prod_senha')->nullable();
            $table->text('prod_token')->nullable();
            $table->text('prod_other')->nullable();

            $table->text('hmlg_url')->nullable();
            $table->text('hmlg_login')->nullable();
            $table->text('hmlg_senha')->nullable();
            $table->text('hmlg_token')->nullable();
            $table->text('hmlg_other')->nullable();

            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integradores');
    }
};
