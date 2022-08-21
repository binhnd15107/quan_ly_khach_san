<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('discount_code_id')->nullable();
            $table->foreign('discount_code_id')->references('id')->on('discount_codes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_rooms');
    }
};
