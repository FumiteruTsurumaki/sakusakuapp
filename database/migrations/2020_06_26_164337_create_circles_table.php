<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('circles', function (Blueprint $table) {
           /**
            * サークルid
            * ユーザーid
            * サークル名
            * ジャンル
            * PR文
            * LINEリンク
            * Twitterリンク
            * instagramリンク
            * facebookリンク
            * blogリンク
            * 作成日・更新日
            * 削除日
            */
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained();
            $table->string('name', 255);
            $table->integer('genre_id')->constrained();
            $table->text('pr_text')->nullable();
            $table->string('line', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('blog', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circles');
    }
}
