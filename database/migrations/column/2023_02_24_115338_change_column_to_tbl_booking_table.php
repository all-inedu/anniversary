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
        Schema::table('tbl_booking', function (Blueprint $table) {
            $table->renameColumn('reminder', 'reminder_H7');
            $table->integer('reminder_H1')->after('reminder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_booking', function (Blueprint $table) {
            //
        });
    }
};
