@extends('layout')

@section('title', '編集')

@section('content')

<section class="container m-5">
  <div class="row justify-content-center">
      <div class="col-8">
        <!-- lalavel表記＠ -->
        <!-- errorsはlalavel使用変数 -->
        @if($errors->any())
          <ul>
            @foreach($errors->all() as $message)

            <li class="alert alert-danger">{{$message}}</li>

            @endforeach
          </ul>
        @endif


      <form action="{{ route('diary.update', ['id' => $diary->id]) }}" method="POST">
      <!-- xxs何ちゃら対策 token値の生成-->
        @csrf
        {{-- @method(put) このformをput送信に置き換える --}}
        {{-- old(編集中のエラー後表示'title', 編集ボタンからの$diary->title --}}
        @method('put')
        <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $diary->title) }}">
        </div>

        <div class="form-group">
        <label for="body">本文</label>
        <textarea id="body" class="form-control" name="body" >{{ old('body', $diary->body) }}</textarea>
        </div>

        <div class="text-right">
        <button type="submit" class="btn btn-primary">編集</button>
        </div>

      </form>

      </div>
  </div>
</section>
@endsection