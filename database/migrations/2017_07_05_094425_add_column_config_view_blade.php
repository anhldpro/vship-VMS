<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnConfigViewBlade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_view_blades', function ($table) {
            if (!Schema::hasColumn('config_view_blades', 'status')) {
               $table->tinyInteger('status')->default(1)->comment('1: Open, 0: Closed');
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
        //
    }
}
