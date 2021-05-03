/*----------------------------------------*/
/*  breadCrumb.js ( 2012/11/16 )
/*  http://tshinobu.com/lab/breadCrumbJs/
/*  readcrumb (topicpath) generator by javascript
/*----------------------------------------*/

breadCrumbJsData = function(){

	/*----------------------------------------*/
	/*  index.html をパンくずリスト生成に含めるかどうか定義します。
	/*  false … index.html を無視する
	/*  true … index.html を無視しない
	/*----------------------------------------*/
	this.indexMatch = false;

	/*----------------------------------------*/
	/*  パンくずリストから除外するパスを定義してください。
	/*  最後に「/」を付けないようにしてください。
	/*  除外しない場合 … ''
	/*  除外する場合    … '/lab/breadCrumbJs'
	/*----------------------------------------*/
	this.ignorePath = '';

	/*----------------------------------------*/
	/*  パンくずリストに表示する名前を定義してください。
	/*  （書式） "ディレクトリ名" : "表示名"
	/*----------------------------------------*/
	this.contentName = {
		"home" : "HOME", // この行は残してください。
		"/lineup/":"製品一覧",
		"/lineup/af-bd/":"凍結防止剤/バイオディーゼル",
		"/lineup/brake/":"ブレーキ",
		"/lineup/cooline/":"冷却ライン",
		"/lineup/engineoil-g/":"エンジンオイル(ガソリン)",
		"/lineup/engineoil-d/":"エンジンオイル(ディーゼル)",
		"/lineup/fuel-g/":"フュエルシステム(ガソリン)",
		"/lineup/fuel-d/":"フュエルシステム(ディーゼル)",
		"/lineup/powerstaring/":"パワーステアリング",
		"/lineup/tra-dif/":"トランスミッション/ディファレンシャル",
		"/shop/" : "整備店・販売店一覧",
		"" : "" //この行は残してください。
	};
}
var breadCrumbJsData = new breadCrumbJsData();

function breadCrumbJs(){
	/*----------------------------------------*/
	/*  以下条件分岐 / 表示処理部分
	/*----------------------------------------*/
	var URL = window.location.pathname.replace(breadCrumbJsData.ignorePath, '');
	var thisURL = URL.match(/(.*?)\//g);
	var fileName =  window.location.pathname.match(/([^¥/]+?)$/);
	
	if ( fileName && (!( fileName[0].match("index") && !breadCrumbJsData.indexMatch )) ){ thisURL.push( fileName[0] ); }
	var drw = document.getElementById("breadCrumb");
	var rootingPath = "";
	if ( drw.tagName == "P" | drw.tagName == "DIV" ){
		for( i=0; i<thisURL.length; i++){
			rootingPath += thisURL[i];
			if ( i == 0 ){
				drw.innerHTML = '<a href="'+breadCrumbJsData.ignorePath+'/">' + funcIndexSearch('home') + '</a>';
			} else if ( i == thisURL.length - 1 ){
				drw.innerHTML += ' &gt; <strong>' + funcIndexSearch(rootingPath) + '</strong>';
			} else {
				drw.innerHTML += ' &gt; <a href="'+breadCrumbJsData.ignorePath+''+rootingPath+'">' + funcIndexSearch(rootingPath) + '</a>';
			}
		}
	}
	if ( drw.tagName == "UL" | drw.tagName == "OL" ){
		for( i=0; i<thisURL.length; i++){
			rootingPath += thisURL[i];
			if ( i == 0 ){
				drw.innerHTML = '<li><a href="'+breadCrumbJsData.ignorePath+'/">' + funcIndexSearch('home') + '</a></li>';
			} else if ( i == thisURL.length - 1 ){
				drw.innerHTML += ' <li class="active"><strong>' + document.title + '</strong></li>';
			} else {
				drw.innerHTML += ' <li><a href="'+breadCrumbJsData.ignorePath+''+rootingPath+'">' + funcIndexSearch(rootingPath) + '</a></li>';
			}
		}
	}
}
function funcIndexSearch(){
	/*----------------------------------------*/
	/*  パンくずリスト生成検索処理
	/*----------------------------------------*/
	keyword = breadCrumbJsData.contentName[arguments[0]];
	if(keyword == undefined){
		return arguments[0].match(/(.*?)\//g).pop().replace("/","");
	} else{
		return keyword;
	}
}

if(window.addEventListener) {
	window.addEventListener("load", breadCrumbJs, false);
}
else if(window.attachEvent) {
	window.attachEvent("onload", breadCrumbJs);
}