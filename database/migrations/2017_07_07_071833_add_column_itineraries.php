<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnItineraries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itineraries', function ($table) {
            if (!Schema::hasColumn('itineraries', 'station_id_dp','station_id_des')) {
               $table->integer('station_id_dp')->nullable();
               $table->integer('station_id_des')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AddcolumnItinerary');
    }
}
