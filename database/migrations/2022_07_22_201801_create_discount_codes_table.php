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
        Schema::create('discount_codes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->longText('describe')->nullable();
            $table->date('start_time');
            $table->date('end_time');
            $table->integer('discount_rate');
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
        Schema::dropIfExists('discount_codes');
    }
};
