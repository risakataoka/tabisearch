<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use DOMDocument;

class TabiController extends Controller
{
    /*public function index()
    {
      return view('index');
    }*/

    public function searchIndex(Request $request)
    {
      $cond_title = $request->cond_title;
      return view('index');
    }

    public function search(Request $request)
    {
      ////////////////////////////////////////////////////
      // 2019/2/23最終更新日
      // 検索結果の取得
      // ・検索の定義
      // $cond_titleを明記することで検索機能が使えるようになる
      // $crawlerでスクレイピングしたいURLを取得
      // $article_titles
      //
      //
      //
      //
      //
      ////////////////////////////////////////////////////

      $cond_title = $request->cond_title;
      ////////////////////1,LINEトラベル.jpのランキングページのみ
      $crawler_1 = Goutte::request('GET', 'https://www.travel.co.jp/guide/ranking/daily/');
      $media_title_1 = $crawler_1->filter('title')->text();
//記事のタイトルを取得、each()で繰り返し処理、text()で文字列を取得
      $article_titles_1 = $crawler_1->filter('.rank_item_ttl')->each(function ($node) {
        return $node->text();
      });
//記事のURLを取得、each()で繰り返し処理、attr("href")でリンクを取得
      $article_links_1 = $crawler_1->filter(".rank_item_ttl a")->each(function ($node) {
        $path = $node->attr("href");
        return "https://www.travel.co.jp". $path;
      });
//アイキャッチ画像を取得、each()で繰り返し処理、attr("src")で画像パスを取得
      $article_image_paths_1 = $crawler_1->filter(".rank_item_img img")->each(function ($node) {
        return $node->attr("src");
      });
//下の意味は？？配列のこと？空白でもできるの？article_は入れなくてもいいのか？
       $titles_1=[];
       $links_1=[];
       $image_paths_1=[];
//ifで$cond_titleが空じゃなかったら$iを配列0（1番目）に設定し、foreach（$article_titlesの1個1個を$titleとして取り出す）で
//$titleの文字列の中に$cond_titleが含まれていたら$titleを$titlesに代入、$article_links[$i]（[$i]がわからない）を$links[]に代入
// 画像も同じで、$1++;で繰り返し処理
      if ($cond_title != ''){
        $i=0;
        foreach($article_titles_1 as $title_1){
          if (stripos($title_1,$cond_title) != false){
            $titles_1[] = $title_1;
            $links_1[] = $article_links_1[$i];
            $image_paths_1[] = $article_image_paths_1[$i];
          }
          $i++;
        }
      }

       ////////////////////2,地球の歩き方のニュースページのみ
       $crawler_2 = Goutte::request('GET', 'https://www.arukikata.co.jp/guidebook/');
       $media_title_2 = $crawler_2->filter('title')->text();
//記事のタイトルを取得、each()で繰り返し処理、text()で文字列を取得
      $article_titles_2 = $crawler_2->filter('.title_area h2')->each(function ($node) {
        return $node->text();
      });

//記事のURLを取得、each()で繰り返し処理、attr("href")でリンクを取得
      $article_links_2 = $crawler_2->filter("a.img_area")->each(function ($node) {
        return $node->attr("href");
      });
//アイキャッチ画像を取得、each()で繰り返し処理、attr("src")で画像パスを取得
      $article_image_paths_2 = $crawler_2->filter("a.img_area img")->each(function ($node) {
        if (strpos($node->attr('src'),"https://news.arukikata.co.jp/f") !== false){
          return $node->attr('src');
        }
      });
      $article_image_paths_2 = array_values(array_filter($article_image_paths_2, "strlen"));
//下の意味は？？配列のこと？空白でもできるの？article_は入れなくてもいいのか？
       $titles_2=[];
       $links_2=[];
       $image_paths_2=[];
//ifで$cond_titleが空じゃなかったら$iを配列0（1番目）に設定し、foreach（$article_titlesの1個1個を$titleとして取り出す）で
//$titleの文字列の中に$cond_titleが含まれていたら$titleを$titlesに代入、$article_links[$i]（[$i]がわからない）を$links[]に代入
// 画像も同じで、$1++;で繰り返し処理
      if ($cond_title != ''){
        $i=0;
        foreach($article_titles_2 as $title_2){
          if (stripos($title_2,$cond_title) != false){
            $titles_2[] = $title_2;
            $links_2[] = $article_links_2[$i];
            $image_paths_2[] = $article_image_paths_2[$i];
          }
          $i++;
        }
      }


      ////////////////////3,GOTRIPトップの注目記事のみ
      $crawler_3 = Goutte::request('GET', 'https://gotrip.jp/');

      $media_title_3 = $crawler_3->filter('title')->text();
//記事のタイトルを取得、each()で繰り返し処理、text()で文字列を取得
     $article_titles_3 = $crawler_3->filter('.title')->each(function ($node) {
       return $node->text();
     });
//記事のURLを取得、each()で繰り返し処理、attr("href")でリンクを取得
     $article_links_3 = $crawler_3->filter(".title a")->each(function ($node) {
       return $node->attr('href');
     });
//アイキャッチ画像を取得、each()で繰り返し処理、attr("src")で画像パスを取得

     $article_image_paths_3 = $crawler_3->filter("#page .featured-thumbnail img")->each(function ($node) {
       return $node->attr('src');
     });

//下の意味は？？配列のこと？空白でもできるの？article_は入れなくてもいいのか？
      $titles_3=[];
      $links_3=[];
      $image_paths_3=[];
//ifで$cond_titleが空じゃなかったら$iを配列0（1番目）に設定し、foreach（$article_titlesの1個1個を$titleとして取り出す）で
//$titleの文字列の中に$cond_titleが含まれていたら$titleを$titlesに代入、$article_links[$i]（[$i]がわからない）を$links[]に代入
// 画像も同じで、$1++;で繰り返し処理
     if ($cond_title != ''){
       $i=0;
       foreach($article_titles_3 as $title_3){
         if (stripos($title_3,$cond_title) != false){
           $titles_3[] = $title_3;
           $links_3[] = $article_links_3[$i];
           $image_paths_3[] = $article_image_paths_3[$i];
         }
         $i++;
       }
     }
     ////////////////////4,世界新聞
     $crawler_4 = Goutte::request('GET', 'http://sekaishinbun.net/');
     $media_title_4 = $crawler_4->filter('title')->text();
     //記事のタイトルを取得、each()で繰り返し処理、text()で文字列を取得
     $article_titles_4 = $crawler_4->filter('.wpp-post-title')->each(function ($node) {
       return $node->text();
     });
     //記事のURLを取得、each()で繰り返し処理、attr("href")でリンクを取得
     $article_links_4 = $crawler_4->filter(".wpp-post-title")->each(function ($node) {
       return $node->attr("href");
     });
     //アイキャッチ画像を取得、each()で繰り返し処理、attr("src")で画像パスを取得
     $article_image_paths_4 = $crawler_4->filter(".wpp-thumbnail")->each(function ($node) {
       return $node->attr("src");
     });
     //下の意味は？？配列のこと？空白でもできるの？article_は入れなくてもいいのか？
      $titles_4=[];
      $links_4=[];
      $image_paths_4=[];
     //ifで$cond_titleが空じゃなかったら$iを配列0（1番目）に設定し、foreach（$article_titlesの1個1個を$titleとして取り出す）で
     //$titleの文字列の中に$cond_titleが含まれていたら$titleを$titlesに代入、$article_links[$i]（[$i]がわからない）を$links[]に代入
     // 画像も同じで、$1++;で繰り返し処理
     if ($cond_title != ''){
       $i=0;
    \Debugbar::info($article_titles_4,$article_links_4,$article_image_paths_4);
       foreach($article_titles_4 as $title_4){
         if (stripos($title_4,$cond_title) != false){
           $titles_4[] = $title_4;
           $links_4[] = $article_links_4[$i];
           $image_paths_4[] = $article_image_paths_4[$i];
         }
         $i++;
       }
     }
     ////////////////////5,tabi-labo ワールドトピックス一覧
     $crawler_5 = Goutte::request('GET', 'https://tabi-labo.com/feature/worldtopics');
     $media_title_5 = $crawler_5->filter('title')->text();
     //記事のタイトルを取得、each()で繰り返し処理、text()で文字列を取得
     $article_titles_5 = $crawler_5->filter('.list-title')->each(function ($node) {
       return $node->text();
     });
     //記事のURLを取得、each()で繰り返し処理、attr("href")でリンクを取得
     $article_links_5 = $crawler_5->filter(".list-title a")->each(function ($node) {
       $path = $node->attr("href");
       return 'https://tabi-labo.com'.$path;
     });
     //アイキャッチ画像を取得、each()で繰り返し処理、attr("src")で画像パスを取得
     $article_image_paths_5 = $crawler_5->filter(".list-title a")->each(function ($node) {
       return $node->attr("data-image");
     });
     //下の意味は？？配列のこと？空白でもできるの？article_は入れなくてもいいのか？
      $titles_5=[];
      $links_5=[];
      $image_paths_5=[];
     //ifで$cond_titleが空じゃなかったら$iを配列0（1番目）に設定し、foreach（$article_titlesの1個1個を$titleとして取り出す）で
     //$titleの文字列の中に$cond_titleが含まれていたら$titleを$titlesに代入、$article_links[$i]（[$i]がわからない）を$links[]に代入
     // 画像も同じで、$1++;で繰り返し処理
     if ($cond_title != ''){
       $i=0;
    \Debugbar::info($article_titles_5,$article_links_5,$article_image_paths_5);
       foreach($article_titles_5 as $title_5){
         if (stripos($title_5,$cond_title) != false){
           $titles_5[] = $title_5;
           $links_5[] = $article_links_5[$i];
           $image_paths_5[] = $article_image_paths_5[$i];
         }
         $i++;
       }
     }

    return view('result',["cond_title" => $cond_title,
    "titles_1" => $titles_1,"links_1" => $links_1, "image_paths_1" => $image_paths_1, "media_title_1" => $media_title_1,
    "titles_2" => $titles_2,"links_2" => $links_2, "image_paths_2" => $image_paths_2, "media_title_2" => $media_title_2,
    "titles_3" => $titles_3,"links_3" => $links_3, "image_paths_3" => $image_paths_3, "media_title_3" => $media_title_3,
    "titles_4" => $titles_4,"links_4" => $links_4, "image_paths_4" => $image_paths_4, "media_title_4" => $media_title_4,
    "titles_5" => $titles_5,"links_5" => $links_5, "image_paths_5" => $image_paths_5, "media_title_5" => $media_title_5]);
//パジネーション
    //$posts = Post::latest()->paginate(5);
    }
}
