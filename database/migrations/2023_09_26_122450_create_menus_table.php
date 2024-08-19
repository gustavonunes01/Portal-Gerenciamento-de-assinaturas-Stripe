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
        Schema::create('menus', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nome', 50);
            $table->string('link', 100);
            $table->string('icone', 100)->nullable();
            $table->string('badge', 100)->nullable();
            $table->string('badge_texto', 100)->nullable();

            $table->unsignedSmallInteger('menu_id')->nullable();
            $table->foreign('menu_id')->references('id')->on('menus');
        });

          //Vincular o Menu à Permission N x N
          Schema::create('menu_permission', function (Blueprint $table){
            $table->unsignedSmallInteger('menu_id');
            $table->unsignedBigInteger('permission_id');

            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->primary(['menu_id','permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
