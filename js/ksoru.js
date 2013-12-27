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
	

	if ($("#r1").prop('checked')== true){
	   required= 0; 
   }
   if ($("#r2").prop('checked')== true){
	   required= 0;
   }
   if ($("#r3").prop('checked')== true){
	   required= 0;
   }
   if ($("#r4").prop('checked')== true){
	   required= 0;
   }
   if ($("#r5").prop('checked')== true){
	   required= 0;
   }
	
  $(".etiket").find("span").remove();
  
  if(required>0) {
  	$(".etiket").append('<span>* Doğru cevap seçiniz !!</span>');
  }
  
    if ($("#puan").val()== ''){
	 $(".etiket").append('<span><br>* Puan Giriniz !!</span>'); 
	 var required = 1;
   }   
   
  
  if(required>0) {
    return false;
  }   else {
    return true;
  			}
}); // form1 submit sonu
}); //doc ready ENSON