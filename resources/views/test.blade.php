@extends('layouts.app')

@section('title','スクレイピングテスト | TABIサーチ')
@section('content')
<!--ここに何いれればいいかわからない-->
<div class="col-md-offset-2 col-md-8">
  <form action="{{ action('TestsController@search') }}" method="get">
      <div class="form-group ">
          <label class="col-md-2">タイトル</label>
          <div class="col-md-8">
              <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
          </div>
          <div class="col-md-2">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="検索">
          </div>
      </div>
  </form>
</div>
@endsection
