/*---------------------------------------------
 PageTOP
---------------------------------------------*/
$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

		
/*---------------------------------------------
 copyright自動更新
---------------------------------------------*/
function year() {
	var data = new Date(); 
	var now_year = data.getFullYear(); 
	document.write(now_year); 
}