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
        Schema::create('tbl_booking_univ', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('univ_id');
            $table->foreign('univ_id')->references('id')->on('tbl_university')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('tbl_booking')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_booking_univ');
    }
};
