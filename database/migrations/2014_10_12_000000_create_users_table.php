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
           /**
            * ユーザーid
            * ユーザー名
            * メールアドレス
            * パスワード
            * トークン
            * 作成日・更新日
            */
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->rememberToken();
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
     Schema::table('users', function (Blueprint $table) {

      $table->string('email')->nullable(false)->change();
      $table->string('password')->nullable(false)->change();

     });
    }
}
