@extends('layouts.app')

@section('title','インデックスページ | TABIサーチ')
@section('content')
<!--bootstrapで幅を指定-->
<div class="">
  <div class="bg-slider">
      <div class="col-md-8">
    <!--form actionでsearchアクションを取得-->
              <form action="{{ action('TabiController@search') }}" method="get">
                <label>タイトルを検索する</label>
                  <div class="form-group row">
                    <div class="col col-9">
            <!--検索フォームを表示-->
                        <input type="text" class="form-control" name="cond_title" placeholder="例）台湾,韓国 グルメ,ホテル">
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
