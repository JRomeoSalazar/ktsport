// Carga los plugins de Foundation
$(document).foundation();

/******** FUNCIÓN DE TWITTER *******************/
!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	if(!d.getElementById(id)){
		js=d.createElement(s);
		js.id=id;
		js.src=p+"://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js,fjs);
	}
}
(document,"script","twitter-wjs");

/******** FUNCIÓN DE FACEBOOK *******************/
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=755205047844171&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
}
(document, 'script', 'facebook-jssdk'));