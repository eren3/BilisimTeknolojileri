/* 
  Yazar: Eren GÜMÜŞ
*/ 

$(document).ready(function(){  
 
// send adında buton tıklanırsa , fazladan seçenek bu !
$("#send").click(function() {
  $("#form1").submit();
}); 

// enter a basılınca
$("#form1").keypress(function(e) {
  if(e.keyCode == 13) {
    $("#form1").submit();
   } 
});



$(".sec").change(function(){
	$(".etiket").find("span").remove();
});


// form1 submit olduğunda
$("#form1").submit(function() {

  var required = 1;

	if ($(".sec").val()!= ""){
	   required= 0;
   }
   if ($(".sec").val()== ""){
	   required= 1;
   }
            

  
  if(required>0) {
    $(".etiket").find("span").remove();
	$(".etiket").append('<span>* Seçiniz !!</span>');
  } 
  
  if(required>0) {
    return false;
  }   else {
    return true;
  			}
}); // form1 submit sonu
}); //doc ready ENSON