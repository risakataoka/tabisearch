@extends('layouts.app')

@section('title','インデックスページ | TABIサーチ')
@section('content')
<!--bootstrapで幅を指定-->
<div class="">
  <div class="bg-slider">
    <div class="">
     <div class="row">
      <div class="col-md-8 rectangle-transparent">
          <p>ツアー広告などを省いて純粋な旅行情報を入手したい人へ</br>
          TABIsearch（タビサーチ）はトラベル情報検索システムです</p>
      </div>
    </div>
         <div class="row">
            <div class="col-md-8">
          <!--form actionでsearchアクションを取得-->
                    <form action="{{ action('TabiController@search') }}" method="get">
                      <label>タイトルを検索する</label>
                        <div class="form-group row">
                          <div class="col col-9">
                  <!--検索フォームを表示-->
                              <input type="text" class="form-control" name="cond_title" placeholder="例）台湾">
                          </div>
                          <div class="col col-3">
                              {{ csrf_field() }}
                              <input type="submit" class="btn btn-primary btn-block" value="検索">
                          </div>
                        </div>
                   </form>
                    <!--↑ここまではテキストの内容-->
              </div>
            </div>
        <div class="row">
          <div class="rectangle-wide">
            <p>「TABI LABO」や「地球の歩き方」など</br>
              複数の人気旅行メディア情報をカンタン一括検索で一覧表示できます</p>
          </div>
        </div>
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
