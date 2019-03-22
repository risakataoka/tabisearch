@extends('layouts.app')

@section('title','検索結果（ログイン後） | TABIサーチ')
@section('content')
<!--bootstrapで幅を指定-->
      <div class="col-md-8">
      <!--form actionでsearchアクションを取得-->
                <form action="{{ action('AdminController@adminSearch') }}" method="get">
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
        </div>
          <!--背景画像と検索キーワード表示-->
        <div class="img_and_keyword">
          <img src="/image/arizona.jpg">
          <p>「{{ $cond_title }}」に該当する記事</p>
        </div>
<!--bootstrapで幅を指定-->
  　　<div class="col-md-8">
                <!--1つめのサイト枠。bootstrapのcardで外枠を作成-->
                <div class="card card-default">
                  <p>{{ $media_title_1 }}</p>
                  <!--検索キーワードに関する記事がなかった場合-->
                    @if(empty($titles_1))
                     <p style="color: red;">検索キーワードに適した記事がありませんでした。</br>現在より多くの情報を取得できるよう改善に努めております。</p>
                    @endif
                    <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
                      @if(isset($titles_1))
                        @if(is_array($titles_1))
                    <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
                          @for($i=0;$i < count($titles_1);$i++)
                            <div class="card-body">
                    <!--リンクを表示します$links[$i]の[$i]がいまいちわからない　idクラス作ってクリックイベントを作る-->
                              <a href="{{ $links_1[$i] }}" class="row link" target="_blank"　>
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
                <!--検索キーワードに関する記事がなかった場合-->
                  @if(empty($titles_2))
                   <p style="color: red;">検索キーワードに適した記事がありませんでした。</br>現在より多くの情報を取得できるよう改善に努めております。</p>
                  @endif
                  <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
                    @if(isset($titles_2))
                      @if(is_array($titles_2))
                  <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
                        @for($i=0;$i < count($titles_2);$i++)
                          <div class="card-body">
                  <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
                            <a href="{{ $links_2[$i] }}" class="row link" target="_blank">
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
                <!--検索キーワードに関する記事がなかった場合-->
                  @if(empty($titles_3))
                   <p style="color: red;">検索キーワードに適した記事がありませんでした。</br>現在より多くの情報を取得できるよう改善に努めております。</p>
                  @endif
                  <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
                    @if(isset($titles_3))
                      @if(is_array($titles_3))
                  <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
                        @for($i=0;$i < count($titles_3);$i++)
                          <div class="card-body">
                  <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
                              <a href="{{ $links_3[$i] }}" class="row link" target="_blank" id="click_event">
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
            <!--4つめbootstrapのcardで外枠を作成-->
            <div class="card card-default">
              <p>{{ $media_title_4 }}</p>
              <!--検索キーワードに関する記事がなかった場合-->
                @if(empty($titles_4))
                 <p style="color: red;">検索キーワードに適した記事がありませんでした。</br>現在より多くの情報を取得できるよう改善に努めております。</p>
                @endif
                <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
                  @if(isset($titles_4))
                    @if(is_array($titles_4))
                <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
                      @for($i=0;$i < count($titles_4);$i++)
                        <div class="card-body">
                <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
                            <a href="{{ $links_4[$i] }}" class="row link" target="_blank" id="click_event">
                              <div class="col-md-2">
                                <img src="{{ $image_paths_4[$i] }}" alt="" style="width:100%;">
                              </div>
                              <div class="col-md-10">
                                <h3>{{ $titles_4[$i] }}</h3>
                              </div>
                            </a>
                        </div>
                      @endfor
                    @endif
                  @endif
            </div>
        <!--4つめbootstrap終わり-->
        <!--5つめbootstrapのcardで外枠を作成-->
        <div class="card card-default">
          <p>{{ $media_title_5 }}</p>
          <!--検索キーワードに関する記事がなかった場合-->
            @if(empty($titles_5))
             <p style="color: red;">検索キーワードに適した記事がありませんでした。</br>現在より多くの情報を取得できるよう改善に努めております。</p>
            @endif
            <!--@$titlesがあるか、@titlesが関数になっているかを確認-->
              @if(isset($titles_5))
                @if(is_array($titles_5))
            <!--$iを配列の1番目からはじめて、$titlesを数えた分まで以下の内容を繰り返します-->
                  @for($i=0;$i < count($titles_5);$i++)
                    <div class="card-body">
            <!--リンクを表示します$links[$i]の[$i]がいまいちわからない-->
                        <a href="{{ $links_5[$i] }}" class="row link" target="_blank" id="click_event">
                          <div class="col-md-2">
                            <img src="{{ $image_paths_5[$i] }}" alt="" style="width:100%;">
                          </div>
                          <div class="col-md-10">
                            <h3>{{ $titles_5[$i] }}</h3>
                          </div>
                        </a>
                    </div>
                  @endfor
                @endif
              @endif
        </div>
    <!--5つめbootstrap終わり-->
     </div>

          <!--<div class="row">-->
            <div class="col-md-auto" >
              <div class="border-top" style="margin-top: 10px;">閲覧履歴</div>
                <div class="table table-default">
                  <ul>
                    @foreach (Auth::user()->browsinghistories as $history)
                          <li><a href="{{ $history->link }}">{{ $history->title }}</a></li>
                    @endforeach
                  </ul>
              </div>
            </div>
        <!--</div>-->
<!-- /browsinghistoriy/create -->
<script>
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
</script>
<!--背景画像スライドショー-->
<script>
jQuery(function($) {
    $('.bg-slider').bgSwitcher({
        images: ['/image/bg-slider/bg1.jpg','/image/bg-slider/bg2.jpg','/image/bg-slider/bg3.jpg'], // 切り替える背景画像を指定
    });
});
</script>

@endsection
