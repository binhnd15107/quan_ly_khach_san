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
        Schema::create('code_type_rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('type_room_id')->nullable();
            $table->foreign('type_room_id')->references('id')->on('type_rooms')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('code_type_rooms');
    }
};
