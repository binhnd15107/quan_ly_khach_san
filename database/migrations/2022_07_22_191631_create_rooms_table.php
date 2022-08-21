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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('type_room_id');
            $table->foreign('type_room_id')->references('id')->on('type_rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->integer('current_status')->default(0)->comment('0  no full , 1 full');
            $table->longText('describe');
            $table->integer('status')->default(0)->comment('1 là xóa mềm , 0 là chưa xóa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
