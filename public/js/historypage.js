
jQuery(function($) {
    var COOKIE_NAME = 'test_cookie_name';
    var COOKIE_PATH = '/';

    var page_array = [];
    if($.cookie(COOKIE_NAME)){
        page_array = $.cookie(COOKIE_NAME).split("-");
        //for文
    }
$('.js-count-btn').on('click', function(){
    // 現在開いているページのファイル名を取得
    var file_url = location.href;
    file_url = file_url.substring(file_url.lastIndexOf("/")+1,file_url.length);
    file_url = file_url.substring(0,file_url.indexOf("."));

    if( $.inArray(file_url, page_array) == -1) {
        // cookieから取得した配列内に存在しない場合は追加
        page_array.push(file_url);
    }

    // パス(/)や有効期限(3日)を指定する
    var date = new Date();
    date.setTime(date.getTime() + ( 1000 * 60 * 60 * 24 * 3 ));

    // とりあえず"-"区切りで連結してcookieに格納
    $.cookie(COOKIE_NAME, page_array.join("-"), { path: COOKIE_PATH, expires: date });
    $.each(page_array, function(index, element){
                 $('js-count-num').append(index);
    //$('.js-count-num').text(index);
  });
});
});
