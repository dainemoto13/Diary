<?php

use Illuminate\Database\Seeder;
// use=require_once
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //配列でサンプルデータを作成
        $diaries = [
            [
                'title' => '初めてのLaravel',
                'body' => '難しいなぁ'
            ],
            [
                'title' => '初めてのセブ',
                'body' => '渋滞がぱねー'
            ],
            [
                'title' =>'初めてのPC',
                'body' => 'ぽちぽち'
            ]
        ];

        //配列でループで回して、テーブルにINSERTする
        // Carbon::now()日付のclass現在時刻を出力
        // 11/18追加 IDが一番若いユーザーを取得
        $user = DB::table('user')->first();

        foreach($diaries as $diary){

            DB::table('diaries')->insert([
                'title' => $diary['title'],
                'body' => $diary['body'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // 11/18追加
                user_id => $user->id,
            ]);
        }
    }
}
