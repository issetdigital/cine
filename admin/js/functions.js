// JavaScript Document
$(document).ready(function(e) {
	
	$(window).load(function () {
      complete:$(".msg").delay(2000).fadeOut("slow");
   });
   
    function AddCampo(id){
	  el = document.getElementById(id);
	  el.innerHTML += '';
}
	
    $(".secsessao-1").css('display','none');
	$(".secsessao-2").css('display','none');
	$(".secsessao-3").css('display','none');
	$(".secsessao-4").css('display','none');
	$(".secsessao-5").css('display','none');
	
	$("#ref-1").click(function(){
		 $(".secsessao-1").slideToggle("slow");
		/*
		
		if($(this).parent().next(".secsessao").css("display") == "none"){
			$(this).removeClass(".inative");
		    $(this).addClass(".ative");
		}else{
		    $(this).removeClass(".ative");
		    $(this).addClass(".inative");
		}
		
		$(this).parent().next(".secsessao").slideToggle("slow");/*/
	});
	
	$("#ref-2").click(function(){
		 $(".secsessao-2").slideToggle("slow");
	});
	
	
	$("#ref-3").click(function(){
		 $(".secsessao-3").slideToggle("slow");
	});
	
	$("#ref-4").click(function(){
		 $(".secsessao-4").slideToggle("slow");
	});
	
	$("#ref-5").click(function(){
		 $(".secsessao-5").slideToggle("slow");
	});
	
	
});