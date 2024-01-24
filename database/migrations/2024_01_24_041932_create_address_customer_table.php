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
        Schema::create('address_customer', function (Blueprint $table) {
            $table->id();
            $table->string("street");
            $table->string("neighborhood");
            $table->string("city");
            $table->string("state_slug");
            $table->string("complement")->nullable();
            $table->boolean("is_primary")->comment("Se for endereco primario")->default(0);

            $table->unsignedBigInteger("customer_id");
            $table->string("slug")->nullable()->comment("Nome ou apelido do endereco.");

            $table->foreign("customer_id")->references("id")->on("customers");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_customer');
    }
};
