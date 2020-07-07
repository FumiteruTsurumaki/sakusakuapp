<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirclePointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_point', function (Blueprint $table) {
            $table->id()->comment('id');
            $table->integer('point_id')->constrained->comment('ポイントid');
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
        Schema::dropIfExists('circle_point');
    }
}
