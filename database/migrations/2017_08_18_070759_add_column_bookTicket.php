<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBookTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_tickets', function ($table) {
            if (!Schema::hasColumn('book_tickets', 'ticket_type')) {
                $table->tinyInteger('ticket_type')->comment('1: Vé 1 chiều, 2: Vé 2 chiều');;
                
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
