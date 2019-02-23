<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;

class TesttestController extends Controller
{
  public function index(Request $request)
  {
    $crawler = Goutte::request('GET', 'https://www.travel.co.jp/guide/ranking/daily/');

    $items = $crawler->filter('a.rank_item_ttl')->each(function($node){
       $titles = $node->filter('a.rank_item_ttl')->attr('href');
       //$uri = $node->filter('.rank_item_ttl')->filter('a')->attr('href');
       return $titles;
       //return $uri;
    });

    return view('testtest');
  }




}
