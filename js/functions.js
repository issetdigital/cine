// funcoes Javascript
// Autor : IssetDigital.com.br
//$a = jQuery.noConflict();
$(document).ready(function(e) {
   $("#nav-mobile").html($("#nav-main").html());
        $("#nav-trigger span").click(function(){
            if ($("nav#nav-mobile ul").hasClass("expanded")) {
                $("nav#nav-mobile ul.expanded").removeClass("expanded").slideUp(250);
                $(this).removeClass("open");
            } else {
                $("nav#nav-mobile ul").addClass("expanded").slideDown(250);
                $(this).addClass("open");
            }
        });
	
});
function addFav(){
    var url      = "http://www.cineporn.tv/";
    var title    = "Cine Porn: Videos Adultos, Xvídeo, Vídeos porno, Filmes de Sexo, Revistas Playboy e Sexy, Vídeo amador.";
    if (window.sidebar) window.sidebar.addPanel(title, url,"");
    else if(window.opera && window.print){
        var mbm = document.createElement('a');
        mbm.setAttribute('rel','sidebar');
        mbm.setAttribute('href',url);
        mbm.setAttribute('title',title);
        mbm.click();
    }else if(document.all){
		window.external.AddFavorite(url, title);
	}else{
		alert('Aperte CTRL + D e seja feliz!');
	}
}/*
var browser=navigator.appName;  
//alert(browser);
function disableselect(e){
return false
}

function reEnable(){
return true
}

//if IE4+
document.onselectstart=new Function ("return false")

//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
/*
function right(e) {
if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2)){
alert("   Cópia não autorizada   ");
return false;
}
else if (navigator.appName == 'Microsoft Internet Explorer' &&
(event.button == 2 || event.button == 3)) {
alert("   Cópia não autorizada   ");
return false;
}
return true;
}
document.onmousedown=right;
if (document.layers) window.captureEvents(Event.MOUSEDOWN);
window.onmousedown=right;
*/