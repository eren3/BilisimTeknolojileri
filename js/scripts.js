/* 
  Author: Caner ÖNCEL 
  URI: http://www.egonomik.com  
*/ 

$(document).ready(function(){  

// send form buton
$("#send").click(function() {
  $("#myform").submit();
}); 

// enter
$("#myform").keypress(function(e) {
  if(e.keyCode == 13) {
    $("#myform").submit();
   } 
});



$(".minput").change(function(){
	var required = 1;
 if ($(this).prop('checked')== true){
	   required = 0;
   }

 
    if(required>0) {
		$(".etiket").find("span").remove();
    $(".minput2").append('<span>* Seçeneklerden birini Seç!</span>');
  } else {
	  $(".etiket").find("span").remove();
  }


});


// form submit kontrol
$("#myform").submit(function() {

  var required = 1;
	
/*	if ($("#s").val()== ""){
	   required= 1;
   }
	if ($("#s").val()!= ""){
	   required= 0;
   } 

  */ 
  $(".minput").each(function(index) {
    $(this).removeClass('required');
    $(this).parent().find("span").remove();

   
   
    if ($(this).prop('checked')== true){
	   required= 0;
   }
	 
	if ($("#s").val()== ""){
	   required++;
   }
	/* if($(this).val() == ""){ 
      $(this).addClass('required');
      $(this).parent().append('<span>* gerekli</span>');
      required++;
     }  */               
  });
  
  if(required>0) {
    $(".etiket").find("span").remove();
	$(".etiket").append('<span>* Seçeneklerden birini Seç!</span>');
  } 
  
  if(required>0) {
    return false;
  }   else {
    return true;
  			}
});  

}); //doc ready end