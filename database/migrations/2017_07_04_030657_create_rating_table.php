<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id');
            $table->integer('itinerary_id');
            $table->date('departDate');
            $table->string('name',255);
            $table->string('email',255);
            $table->text('comment');
            $table->smallInteger('overall_rating');
            $table->smallInteger('quality_rating');
            $table->smallInteger('intime_rating');
            $table->smallInteger('service_rating');
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
        Schema::dropIfExists('rating');
    }
}
