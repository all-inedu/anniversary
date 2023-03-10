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
        Schema::create('tbl_university', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 40)->unique();
            $table->string('name');
            $table->date('session_start');
            $table->time('time_start');
            $table->text('thumbnail');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('tbl_university');
    }
};
