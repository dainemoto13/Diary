<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToDiaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diaries', function (Blueprint $table) {
            // 11/18追加
            // diariesテーブルにuser_idを追加
            $table->integer('user_id')->unsigned();

            // foreign：外部キー（フォーリンキー）
            // diariesテーブルのuser_idに入る値は、
            // 必ずusersテーブルのどこかのレコードのidと一致する
            $table->foreign('user_id')->references('id')->on('users');
            // 11/18終了
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diaries', function (Blueprint $table) {
            //
        });
    }
}
