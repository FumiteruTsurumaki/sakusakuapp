<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircleUniversityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('circle_university', function (Blueprint $table) {
           $table->increments('id')->comment('id');
           $table->integer('university_id')->constrained->comment('大学id');
           $table->integer('circle_id')->constrained->comment('サークルid');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circle_university');
    }
}
