<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class TesttestController extends Controller
{
  public function index(Request $request)
  {

    $crawler = Goutte::request('GET', 'https://www.travel.co.jp/guide/archive_world/list/r5/hotel/');
    $article_titles = $crawler->filter('.title_mod')->each(function ($node) {
     return $node->text();
    });

    return view('testtest',$article_titles);
  }




}
