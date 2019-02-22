<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Console\Commands;


class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
/*内容→ユーザーが検索をしたキーワードに合わせた結果を一覧表示したい。
やる順番として、取得するサイトを決定。サイトの中の（記事タイトル、アイキャッチ画像、URLの3つを取得できるように記述する）。
それぞれの書き方を以下で確認しておく*/

/*この定義→参考ページ参照したまんま。
アマゾン商品一覧のulid を指定してliの中の内容を取得している
      $goutte = \Goutte::request('GET', 'https://www.amazon.co.jp/gp/s/ref=amb_link_1?ie=UTF8&field-enc-merchantbin=AN1VRQENFRJN5%7CA1RJCHJCQT9WV5&field-launch-date=30x-0x&node=2494234051&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=merchandised-search-left-4&pf_rd_r=6CWTB56SQ1GK6RA30VVV&pf_rd_r=6CWTB56SQ1GK6RA30VVV&pf_rd_t=101&pf_rd_p=f72beb25-a5bc-4658-9aa6-7d92f73c2c8b&pf_rd_p=f72beb25-a5bc-4658-9aa6-7d92f73c2c8b&pf_rd_i=637394');
      $goutte->filter('ul#s-results-list-atf')->each(function ($ul) {
          $ul->filter('li')->each(function ($li) {
              dd($li);
          });
      });*/
/*この定義→https://www.travel.co.jp/guide/ranking/daily/
ulクラス を指定してliの中の内容を取得している→これでコマンド時エラーは出なかったが正しく取得できているのか謎*/
      /*$goutte = \Goutte::request('GET', 'https://www.travel.co.jp/guide/ranking/daily/');
      $goutte->filter('a.class')->eq(0)->text(); */
    }
}
