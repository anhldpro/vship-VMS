<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id');
            $table->integer('itinerary_id');
            $table->string('date_start');
            $table->string('time_start');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('code');
            $table->tinyInteger('status')->default(2)->comment('1: Đã thanh toán, 0: Đã hủy, 2: Chưa thanh toán');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_tickets');
    }
}
