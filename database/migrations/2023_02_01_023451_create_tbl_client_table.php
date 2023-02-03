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
        Schema::create('tbl_client', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 40)->unique();
            $table->string('fullname');
            $table->string('email_address');
            $table->string('phone_number');
            $table->enum('client_type', ['student', 'parent', 'teacher/counsellor']);
            // $table->string('address');
            $table->integer('grade');
            $table->string('graduate_from');
            $table->string('country_destination');
            $table->unsignedBigInteger('lead_source_id');
            $table->foreign('lead_source_id')->references('id')->on('tbl_lead_source')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('challenge_id');
            $table->foreign('challenge_id')->references('id')->on('tbl_biggest_challenge')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('first_time');
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
        Schema::dropIfExists('tbl_client');
    }
};
