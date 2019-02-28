jQuery.noConflict();
(function($) {


var period = 1; // 有効期限日数


    $(function() {
    	// 1回目のアクセス
    	if($.cookie('access') == undefined) {
    		// メッセージの追加
    		$('#access').text('1回目のアクセス');
    		// cookie追加
    		$.cookie('access', 'on', { expires: period });

    	// 2回目以降のアクセス
    	} else {
    		// メッセージの追加
    		$('#access').text('2回目以降のアクセス');
    	}

    	// cookieの削除
    	$(document).on('click', '#del', function() {
    		$.removeCookie('access');
    	});
    });

})(jQuery);
