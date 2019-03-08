@extends('layouts.app')

@section('title','インデックスページ | TABIサーチ')
@section('content')
<!--bootstrapで幅を指定-->
<div class="container">
  <div class="bg-slider">
      <div class="col-md-8" style="margin-left: 16.666%;">
      <!--form actionでsearchアクションを取得-->
        <form action="{{ action('TabiController@search') }}" method="get">
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
        <!--1つめbootstrapのcardで外枠を作成-->
        <div class="card card-default">
          <p>{{ $media_title_1 }}</p>
        <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
          @if(isset($titles_1))
            @if(is_array($titles_1))
        <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
              @for($i=0;$i < count($titles_1);$i++)
                <div class="card-body">
        <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
                  <a href="{{ $links_1[$i] }}" class="row" target="_blank">
                    <div class="col-md-2">
                      <img src="{{ $image_paths_1[$i] }}" alt="" style="width:100%;">
                    </div>
                    <div class="col-md-10">
                      <h3>{{ $titles_1[$i] }}</h3>
                    </div>
                  </a>
                </div>
              @endfor
            @endif
          @endif
        </div>
      <!--1つめbootstrap終わり-->
        <!--2つめbootstrapのcardで外枠を作成-->
        <div class="card card-default">
          <p>{{ $media_title_2 }}</p>
        <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
          @if(isset($titles_2))
            @if(is_array($titles_2))
        <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
              @for($i=0;$i < count($titles_2);$i++)
                <div class="card-body">
        <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
                  <a href="{{ $links_2[$i] }}" class="row" target="_blank">
                    <div class="col-md-2">
                      <img src="{{ $image_paths_2[$i] }}" alt="" style="width:100%;">
                    </div>
                    <div class="col-md-10">
                      <h3>{{ $titles_2[$i] }}</h3>
                    </div>
                  </a>
                </div>
              @endfor
            @endif
          @endif
        </div>
        <!--2つめbootstrap終わり-->
        <!--3つめbootstrapのcardで外枠を作成-->
        <div class="card card-default">
          <p>{{ $media_title_3 }}</p>
        <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
          @if(isset($titles_3))
            @if(is_array($titles_3))
        <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
              @for($i=0;$i < count($titles_3);$i++)
                <div class="card-body">
        <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
                  <a href="{{ $links_3[$i] }}" class="row" target="_blank">
                    <div class="col-md-2">
                      <img src="{{ $image_paths_3[$i] }}" alt="" style="width:100%;">
                    </div>
                    <div class="col-md-10">
                      <h3>{{ $titles_3[$i] }}</h3>
                    </div>
                  </a>
                </div>
              @endfor
            @endif
          @endif
        </div>
        <!--3つめbootstrap終わり-->
      </div>
  </div>
</div>
<!--背景画像スライドショー-->
<script>
jQuery(function($) {
    $('.bg-slider').bgSwitcher({
        images: ['/image/bg-slider/bg1.jpg','/image/bg-slider/bg2.jpg','/image/bg-slider/bg3.jpg'], // 切り替える背景画像を指定
    });
});
</script>
@endsection
