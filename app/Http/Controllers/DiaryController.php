<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Diaryモデルを使用する宣言
use App\Diary;
// CreateDiary(ルール)を使用する宣言
use App\Http\Requests\CreateDiary;

class DiaryController extends Controller
{
    // 一覧画面を表示する
    public function index()
    {
        // diariesテーブルのデータを全件取得
        // 取得した結果を画面で確認
        // php artisan serveでlalavelに出力

        $diaries = Diary::all();
        // dd($diaries);
        // dd() :var_dump と die が同時に実行される

        // views/diaries/index.blae.phpを表示
        //フォルダ名.ファイル名
        return view('diaries.index', [

            // 画面に渡す時 キー => 値
            // diaries.index => $diariesの全件を渡す
            'diaries' => $diaries
        ]);
    }

    // 日記の作成画面を表示する
    public function create()
    {
        return view('diaries.create');
    }

    // 新しい日記の保存をする画面
    public function store(CreateDiary $request)
    {
        // Diaryモデルのインスタンスを作成
        $diary = new Diary();
        // Diaryモデルを使って、DBに日記を保存
        // $diary(インスタンス名)->nameのカラム名 = カラムに設定したい値
        $diary->title = $request->title;
        $diary->body = $request->body;

        // DBに保存実行
        $diary->save();

        // 一覧ページにリダイレクト(二重投稿防止リターンヴィウ)
        return redirect()->route('diary.index');
    }

    // 日記を削除するメソッド
    public function destroy(int $id)
    {
        // Diaryモデルを使用して、IDが一致する日記の取得
        $diary = Diary::find($id);
        // 取得した日記の削除
        $diary->delete();

        // 一覧画面にリダイレクト
        return redirect()->route('diary.index');

    }
}
