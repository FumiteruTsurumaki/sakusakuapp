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
            $table->bigIncrements('id')->comment('ユーザーid');
            $table->string('name')->comment('ユーザー名');
            $table->string('email')->nullable()->change()->comment('メールアドレス');
            $table->string('password')->nullable()->change()->comment('パスワード');
            $table->rememberToken()->comment('トークン');
            $table->timestamps()->comment('作成日・更新日');
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
