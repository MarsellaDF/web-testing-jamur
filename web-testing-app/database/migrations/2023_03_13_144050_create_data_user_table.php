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
        Schema::create('data_user', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->integer('sumbu_x');
            $table->integer('sumbu_y');
            $table->string('id_menu');
            $table->string('id_skenario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_user');
    }
};