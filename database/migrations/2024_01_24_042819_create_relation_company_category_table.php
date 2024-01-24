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
        Schema::create('relation_company_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id")->comment("Se for do tipo 'Empresa'.");
            $table->unsignedBigInteger("category_id");

            $table->foreign("customer_id")->references("id")->on("customers");
            $table->foreign("category_id")->references("id")->on("schedule_category");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relation_company_category');
    }
};
