<!-- layout.blade.phpを読み込む -->
{{-- @extends('layout') --}}
{{-- 11/18追加 --}}
@extends('layouts.app')
{{-- 11/18追加 --}}

@section('title', '一覧')

@section('content')

  {{-- 11/18追加 --}}
  {{-- <a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">新規投稿</a> --}}

  <div class="text-center">
  <a href="{{ route('diary.create') }}" class="btn btn-primary ">新規投稿</a>
  </div>
  {{-- 11/18終了 --}}


  @foreach ($diaries as $diary)
  <div class="m-4 p-4 border border-primary">
    <p>{{$diary->title}}</p>
    <p>{{$diary->body}}</p>
    <p>{{$diary->created_at}}</p>



      {{-- <!-- GET {{}空白をつけない}--> --}}
      <a href="{{ route('diary.edit', ['id' => $diary->id]) }}"class="btn btn-success">編集</a>

   <!-- //削除するためのform (webからの)-->
    <form action="{{ route('diary.destroy', ['id' => $diary->id]) }}" method="POST" class="d-inline">
    @csrf
    <!-- formメソッドではPOST or GET 送信しかできないので＠で記載 -->
    @method('delete')
    <button class="btn btn-danger">削除</button>
    </form>
  </div>
  @endforeach

  @endsection