$(document).ready(function(){  
var d1 = 0;
var d2 = 0;
		$("#myform").keypress(function(e) {
  if(e.keyCode == 13) {
    $("#myform").submit();
   } 
		});


// form submit kontrol
	$("#myform").submit(function() {
	
	$(".etiket").find("span").remove();
	d1 = 0;
	d2= 0;
	
	$(".minput").each(function(index) {
    if ($(this).prop('checked')== true){
	   d1= 1; }
   	}); 
	 
	if (d1 == 0) {
		$(".etiket").append('<span>* Öğrenci Sayısı Seçiniz!<br></span>');
	}
	
	
	$(".s").each(function(index) {
    if ($(".s").val()!= ""){
	   d2= 1; }
   	});
	
	if (d2 == 0) {
		$(".etiket").append('<span>* Açılır Listeden Seçiniz!<br></span>');
	}
	
	if(d1*d2 == 0) {
    	return false;
  		} else {
    	return true;
  			}
  
   
	});  

}); //doc ready end