//====================
// ページ上部
//====================
function writeTop(){

	var html = "";

	html += '<div class="container">';
	html += '<!--▼header▼-->';
	html += '<header class="slide inner">';
	html += '<ul id="navToggle" class="burger slide"><li></li><li></li><li></li></ul><!--メニューボタン-->';
	html += '<div class="logoAria">';
	html += '<a href="/" class="logo"><img src="/img/logo.png" alt="KEMコーポレーション"></a>';
	html += '<p class="top">ケーイーエム株式会社は、BG製品の代理店です</p>';
	html += '</div>';
	html += '<div class="inqAria">';
	html += '<a href="/inquiry/" class="btn_inq"><img src="/img/topInq.png" alt="お問い合わせはこちらから"></a>';
	html += '</div>';
	html += '</header>';
	html += '<!--▲header▲-->';
	html += '<!--▼menu▼-->';	
	html += '<nav class="slide inner">';
	html += '<ul>';
	html += '<li><a href="/" class="active">HOME</a></li>';
	html += '<li><a href="/lineups/">製品一覧</a></li>';
	html += '<li><a href="/shops/">販売店・整備工場一覧</a></li>';
	html += '<li><a href="/aboutbg/">BGとは</a></li>';
	html += '<li><a href="/company/">会社概要</a></li>';
	html += '<li><a href="/inquiry/">お問い合わせ</a></li>';
	html += '<li><a href="/privacy/">プライバシーポリシー</a></li>';
	html += '<li><a href="/sitemap.html">サイトマップ</a></li>';
	html += '</ul>';
	html += '</nav>';
	html += '<!--▲menu▲-->';
	html += '<!--▼slide▼-->';
	html += '<div class="content slide">';
	html += '<!--▼body▼-->';
	html += '<div class="body clearfix">';
	html += '<!--▼scroll▼-->';
	html += '<div class="scroll inner">';
	html += '<!--▼contents▼-->';
	html += '<div class="contents">';
	html += '<!--▼introduction▼-->';	
	html += '<div class="introduction">';
	html += '<ol id="breadCrumb" class="clearfix">';
	html += '<li>If you turn on javascript, this area is drawn to the breadcrumb(navigation).</li>';
	html += '</ol>';
	html += '<h1><script type="text/javascript">writeTitle();</script></h1>';
	html += '</div>';
	html += '<!--▲introduction▲-->';
	
	document.write(html);
}
//====================
// 新ページ上部
//====================
function writeTopnew1(){

	var html = "";

	html += '<div class="container">';
	html += '<!--▼header▼-->';
	html += '<header class="slide inner">';
	html += '<ul id="navToggle" class="burger slide"><li></li><li></li><li></li></ul><!--メニューボタン-->';
	html += '<div class="logoAria">';
	html += '<a href="/" class="logo"><img src="/img/logo.png" alt="KEMコーポレーション"></a>';
	html += '<p class="top">ケーイーエム株式会社は、BG製品の代理店です</p>';
	html += '</div>';
	html += '<div class="inqAria">';
	html += '<a href="/inquiry/" class="btn_inq"><img src="/img/topInq.png" alt="お問い合わせはこちらから"></a>';
	html += '</div>';
	html += '</header>';
	html += '<!--▲header▲-->';
	html += '<!--▼menu▼-->';	
	html += '<nav class="slide inner">';
	html += '<ul>';
	html += '<li><a href="/" class="active">HOME</a></li>';
	html += '<li><a href="/lineup/">製品一覧</a></li>';
	html += '<li><a href="/shops/">販売店・整備工場一覧</a></li>';
	html += '<li><a href="/aboutbg/">BGとは</a></li>';
	html += '<li><a href="/company/">会社概要</a></li>';
	html += '<li><a href="/inquiry/">お問い合わせ</a></li>';
	html += '<li><a href="/privacy/">プライバシーポリシー</a></li>';
	html += '<li><a href="/sitemap.html">サイトマップ</a></li>';
	html += '</ul>';
	html += '</nav>';
	html += '<!--▲menu▲-->';
	html += '<!--▼slide▼-->';
	html += '<div class="content slide">';
	html += '<!--▼body▼-->';
	html += '<div class="body clearfix">';
	html += '<!--▼scroll▼-->';
	html += '<div class="scroll inner">';
	
	document.write(html);

}
//====================
// ページ下部
//====================
function writeBottom(){

	var html = "";

	html += '</div>';
	html += '<!--▲contents▲-->';
	html += '<!--▼side▲-->';
	html += '<script type="text/javascript">writeSide();</script>';
	html += '<!--▲side▲-->';
	html += '</div>';
	html += '<!--▲scroll▲-->';
	html += '</div>';
	html += '<!--▲body▲-->';
	html += '<!--▼footer▼-->';
	html += '<script type="text/javascript">writeFooter();</script>';
	html += '<!--▲footer▲-->';
	html += '</div>';
	html += '<!--▲slide▲-->';
	html += '</div>';
	
	document.write(html);
}
//====================
// header
//====================
function writeHeader(){

	var html = "";

	html += '<header class="slide inner">';
	html += '<ul id="navToggle" class="burger slide"><li></li><li></li><li></li></ul><!--メニューボタン-->';
	html += '<div class="logoAria">';
	html += '<a href="/" class="logo"><img src="/img/logo.png" alt="KEMコーポレーション"></a>';
	html += '<p class="top">ケーイーエム株式会社は、BG製品の代理店です</p>';
	html += '</div>';
	html += '<div class="inqAria">';
	html += '<a href="/inquiry/" class="btn_inq"><img src="/img/topInq.png" alt="お問い合わせはこちらから"></a>';
	html += '</div>';
	html += '</header>';
	
	document.write(html);
}
//====================
// menu
//====================
function writeMenu(){

	var html = "";
	
	html += '<nav class="slide inner">';
	html += '<ul>';
	html += '<li><a href="/" class="active">HOME</a></li>';
	html += '<li><a href="/lineup/">製品一覧</a></li>';
	html += '<li><a href="/shops/">販売店・整備工場一覧</a></li>';
	html += '<li><a href="/aboutbg/">BGとは</a></li>';
	html += '<li><a href="/company/">会社概要</a></li>';
	html += '<li><a href="/inquiry/">お問い合わせ</a></li>';
	html += '<li><a href="/privacy/">プライバシーポリシー</a></li>';
	html += '<li><a href="/sitemap.html">サイトマップ</a></li>';
	html += '</ul>';
	html += '</nav>';

	document.write(html);
}
//====================
// title
//====================
function writeTitle(){

	document.write(document.title);

}
//====================
// introduction
//====================
function writeIntroduction(){

	var html = "";
	
	html += '<div class="introduction">';
	html += '<ol id="breadCrumb" class="clearfix">';
	html += '<li>If you turn on javascript, this area is drawn to the breadcrumb(navigation).</li>';
	html += '</ol>';
	html += '<h1><script type="text/javascript">writeTitle();</script></h1>';
	html += '</div>';

	document.write(html);
}

//====================
// side
//====================
function writeSide(){

	var html = "";
	
	html += '<div class="side">';
	html += '<a href="/lineup/fuel-d/bg23232.html" class="bun_232"><img src="/img/top/bun_232.png" alt="排ガスを正常な状態に！"></a>';
	html += '<a href="/lineup/fuel-g/bg208.html" class="bun_208"><img src="/img/top/bun_208.png" alt="燃料系統の不純物を除去"></a>';
	html += '<a href="/digital-book/deasel-care/index_local.html" class="bun_db" target="_blank"><img src="/img/top/bun_db_deaselcare.png" alt="デジタルカタログを見る"></a>';
	html += '<a href="https://www.youtube.com/watch?v=XSxcouFaq-8&feature=em-share_video_user" class="kigu" target="_blank"><img src="/img/top/bun_mv_deaelcare.png" alt="器具を使ったディーゼルケアの動画を見る"></a>';
	html += '</div>';

	document.write(html);
}
//====================
// footer
//====================
function writeFooter(){

	var html = "";

	html += '<footer class="slide inner">';
	html += '<div class="link"><a href="/privacy/">プライバシーポリシー</a> | <a href="/sitemap.html" class="last">サイトマップ</a></div>';
	html += '<small>©2016 KEM CORPORATION</small>';
	html += '</footer>';
	
	document.write(html);
}