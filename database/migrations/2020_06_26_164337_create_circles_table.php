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
            $table->id()->comment('サークルid');
            $table->foreignId('user_id')->constrained()->comment('ユーザーid');
            $table->string('name', 255)->comment('サークル名');
            $table->integer('genre_id')->constrained()->comment('ジャンル');
            $table->text('pr_text')->nullable()->comment('PR文');
            $table->string('line', 255)->nullable()->comment('LINEリンク');
            $table->string('twitter', 255)->nullable()->comment('twitterリンク');
            $table->string('instagram', 255)->nullable()->comment('instagramリンク');
            $table->string('facebook', 255)->nullable()->comment('facebookリンク');
            $table->string('blog', 255)->nullable()->comment('blogリンク');
            $table->timestamps()->comment('作成日・更新日');
            $table->softDeletes()->comment('削除日');
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
