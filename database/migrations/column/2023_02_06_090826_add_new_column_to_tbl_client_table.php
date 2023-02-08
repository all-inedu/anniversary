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
        Schema::table('tbl_client', function (Blueprint $table) {
            
            $table->unsignedBigInteger('lead_source_id')->after('graduate_from')->nullable();
            $table->foreign('lead_source_id')->references('id')->on('tbl_lead_source')->onUpdate('cascade')->onDelete('cascade');
            $table->string('lead_other')->after('lead_source_id')->nullable();

            $table->unsignedBigInteger('challenge_id')->after('lead_source_id')->nullable();
            $table->foreign('challenge_id')->references('id')->on('tbl_biggest_challenge')->onUpdate('cascade')->onDelete('cascade');
            $table->string('challenge_other')->after('challenge_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_client', function (Blueprint $table) {
            //
        });
    }
};
