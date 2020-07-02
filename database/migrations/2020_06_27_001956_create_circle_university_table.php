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
          /**
           * id
           * 大学id
           * サークルid
           */
           $table->increments('id');
           $table->integer('university_id')->constrained;
           $table->integer('circle_id')->constrained;
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
