<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class TestsController extends Controller
{
    public function search(Request $request)
    {
         $cond_title = $request->cond_title;
         $crawler = Goutte::request('GET', 'https://www.travel.co.jp/guide/ranking/daily/');
//記事のタイトルを取得したい→成功
         $titles = $crawler->filter('.rank_item_ttl')->each(function ($node) {
           return $node->text();
         });
//$titlesに基づいた記事のURLを取得したい
         $links = $crawler->filter(".rank_item_ttl a")->each(function ($node) {
           return $node->attr("href");
         });
//$titlesに基づいたアイキャッチ画像を取得したい
         $image_paths = $crawler->filter(".rank_item_ttl img")->each(function ($node) {
           return $node->attr("src");
         });
         //  \Debugbar::info($image_paths);

//$titlesのみ表示させる内容になっているが、記事URLと画像も一緒に表示したい
         if ($cond_title != ''){
           foreach($titles as $title){
             if (stripos($title,$cond_title) != false){
               dump($title);
             }
           }
         }

         return view('test',["cond_title" => $cond_title]);
    }
}
