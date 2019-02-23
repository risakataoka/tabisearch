<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class TestsController extends Controller
{
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
         $crawler = Goutte::request('GET', 'https://www.travel.co.jp/guide/ranking/daily/');
         $media_title = $crawler->filter('title')->text();
//記事のタイトルを取得、each()で繰り返し処理、text()で文字列を取得
         $article_titles = $crawler->filter('.rank_item_ttl')->each(function ($node) {
           return $node->text();
         });
         // \Debugbar::info($titles);
//記事のURLを取得、each()で繰り返し処理、attr("href")でリンクを取得
         $article_links = $crawler->filter(".rank_item_ttl a")->each(function ($node) {
           $path = $node->attr("href");
           return "https://www.travel.co.jp". $path;
         });
//アイキャッチ画像を取得、each()で繰り返し処理、attr("src")で画像パスを取得
         $article_image_paths = $crawler->filter(".rank_item_img img")->each(function ($node) {
           return $node->attr("src");
         });


          // \Debugbar::info($image_paths);
//下の意味は？？配列のこと？空白でもできるの？article_は入れなくてもいいのか？
          $titles=[];
          $links=[];
          $image_paths=[];
//ifで$cond_titleが空じゃなかったら$iを配列0（1番目）に設定し、foreach（$article_titlesの1個1個を$titleとして取り出す）で
//$titleの文字列の中に$cond_titleが含まれていたら$titleを$titlesに代入、$article_links[$i]（[$i]がわからない）を$links[]に代入
// 画像も同じで、$1++;で繰り返し処理
         if ($cond_title != ''){
           $i=0;
           foreach($article_titles as $title){
             if (stripos($title,$cond_title) != false){
               $titles[] = $title;
               $links[] = $article_links[$i];
               $image_paths[] = $article_image_paths[$i];
             }
             $i++;
           }
         }
         // \Debugbar::info($article_image_paths);

       return view('test',["cond_title" => $cond_title,
       "titles" => $titles,"links" => $links, "image_paths" => $image_paths, "media_title" => $media_title]);
    }
}
