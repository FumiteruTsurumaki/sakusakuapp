<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('name');
            $table->string('email')->nullable()->change();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->change();
            $table->rememberToken();
            $table->timestamps();
            $table->unique(['provider_id', 'provider_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('users', function (Blueprint $table) {

      $table->string('email')->nullable(false)->change();
      $table->string('password')->nullable(false)->change();

     });
    }
}
