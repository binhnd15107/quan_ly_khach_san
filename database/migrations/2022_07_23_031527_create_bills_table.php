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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('kh_id');
            $table->foreign('kh_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('start_time');
            $table->date('end_time');
            $table->string('total_money');
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
        Schema::dropIfExists('bills');
    }
};
