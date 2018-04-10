<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactCarCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_car_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->integer('phonenumber');
            $table->string('email');
            $table->integer('car_id');
            $table->integer('itinerary_id');
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
        Schema::dropIfExists('contact_car_companies');
    }
}
