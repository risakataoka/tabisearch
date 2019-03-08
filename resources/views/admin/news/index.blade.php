@extends('layouts.app')

@section('title','ログイン後インデックスページ | TABIサーチ')
@section('content')
<!--bootstrapで幅を指定-->
<div class="">
  <div class="bg-slider">
      <div class="col-md-8">
    <!--form actionでsearchアクションを取得-->
              <form action="{{ action('AdminController@adminSearch') }}" method="get">
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
              <!--↓以下内容を透過して隠す-->

        </div>
            <!--3つめbootstrap終わり-->
        <!--<div class="low">
          <div class="col-md-auto" >
            <div class="border-top" >閲覧履歴</div>
              <div class="table table-default">
                <ul>
                  @foreach (Auth::user()->browsinghistories as $history)
                        <li><a href="{{ $history->link }}">{{ $history->title }}</a></li>
                  @endforeach
                </ul>
            </div>
          </div>
      </div>-->
  </div>
</div>

<!-- /browsinghistoriy/create -->
<!--<script>
        $(function(){
            // Ajax button click
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
            $('.link').on('click',function(){
                $.ajax({
                    url:'/browsinghistoriy/create',
                    type:'POST',
                    data:{
                        'link':$(this).attr("href"),
                        'title':$(this).text()
                    }
                })
                // Ajaxリクエストが成功した時発動
                .done( (data) => {
                    // $('.result').html(data);
                    console.log(data);
                })
                // Ajaxリクエストが失敗した時発動
                .fail( (data) => {
                    // $('.result').html(data);
                    console.log(data);
                })
                // Ajaxリクエストが成功・失敗どちらでも発動
                .always( (data) => {
                  console.log("成功");
                });
            });
        });
</script>-->
<!--背景画像スライドショー-->
<script>
jQuery(function($) {
    $('.bg-slider').bgSwitcher({
        images: ['/image/bg-slider/bg1.jpg','/image/bg-slider/bg2.jpg','/image/bg-slider/bg3.jpg'], // 切り替える背景画像を指定
    });
});
</script>

@endsection
