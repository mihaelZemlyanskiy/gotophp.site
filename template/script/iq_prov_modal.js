function getCookieZzz(name) {
	var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}
if(getCookieZzz('nacheckingforarobotme')=='true'){
}else{
    document.querySelector("body").setAttribute('style','overflow:hidden;');
    const body_zzz=document.querySelector("body");
            body_zzz.innerHTML +='<div id="wrapper_prov_modal_zzz"><style>#zone_modal_prov{ position: absolute; z-index: 99999;top:0; }.blur_prov{ width: 100vw; height: 100vh; opacity: .5; background-color: #000; display: flex; justify-content: center; align-items: center;}.modal_prov_body{ top: 0; position: absolute; width: 100vw; display: flex; justify-content: center; align-items: center; height: 100vh;}.modal_prov{ background-color: #fff; padding: 25px 35px 25px 25px; border-radius: 5px; }.link_ok_prov{ color: rgb(0, 161, 202); text-align: right; cursor: pointer;}</style><div id="zone_modal_prov"> <div class="blur_prov"> </div><div class="modal_prov_body"> <div class="modal_prov"> <div>В целях безопасности сайта, <br>подтвердите, что Вы не робот</div><br> <div class="link_ok_prov">ОК</div> </div> </div></div>';
    document.querySelector('#zone_modal_prov .link_ok_prov').addEventListener('click',function(){
            document.querySelector('#wrapper_prov_modal_zzz').remove();
            document.querySelector("body").setAttribute('style','overflow:auto;');
            document.cookie="nacheckingforarobotme=true";
            location.reload();
            });   

}