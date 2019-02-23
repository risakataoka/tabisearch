@extends('layouts.app')

@section('title','スクレイピングテスト | TABIサーチ')
@section('content')
<!--bootstrapで幅を指定-->
<div class="col-md-8" style="margin-left: 16.666%;">
<!--form actionでsearchアクションを取得-->
  <form action="{{ action('TestsController@search') }}" method="get">
    <label>タイトルを検索する</label>
    <div class="form-group row">
        <div class="col col-9">
<!--検索フォームを表示-->
            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
        </div>
        <div class="col col-3">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary btn-block" value="検索">
        </div>
    </div>
  </form>
  <!--↑ここまではテキストの内容-->
  <!--bootstrapのcardで外枠を作成-->
  <div class="card card-default">
    <p>{{ $media_title }}</p>
  <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
    @if(isset($titles))
      @if(is_array($titles))
  <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
        @for($i=0;$i < count($titles);$i++)
          <div class="card-body">
  <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
            <a href="{{ $links[$i] }}" class="row" target="_blank">
              <div class="col-md-2">
                <img src="{{ $image_paths[$i] }}" alt="" style="width:100%;">
              </div>
              <div class="col-md-10">
                <h3>{{ $titles[$i] }}</h3>
              </div>
            </a>
          </div>
        @endfor
      @endif
    @endif
  </div>
</div>
@endsection
