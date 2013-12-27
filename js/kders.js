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



$("#form1").change(function(){
	$(".etiket").find("span").remove();
});


// form1 submit olduğunda
$("#form1").submit(function() {

  var required = 0;
			// İsimler seçilmiş mi kontrol ediliyor.
	if ($("#id").val()== "a"){
	   required= 1;
   }
   if ($("#id2").val()== "a"){
	   required= 1;
   }
   if ($("#id3").val()== "a"){
	   required= 1;
   }
   if ($("#id4").val()== "a"){
	   required= 1;
   }
  		
	if(required==0){
  		/// Aynı olan isimler bulunuyor.
		// 1 isim seçilmişse kıyaslama YOK! 
		
		// 2 isim Seçilmişse kıyasla
	if ($("#liste_1").prop('checked')== true){  
	if ($("#id").val()== $("#id2").val()){
		required= 2;
	}					}
	
		// 3 isim Seçilmişse kıyasla	
	if ($("#liste_2").prop('checked')== true){
	if ($("#id").val()== $("#id2").val()){
		required= 2;
	}
	if ($("#id").val()== $("#id3").val()){
		required= 2;
	}
	if ($("#id2").val()== $("#id3").val()){
		required= 2;
	}
				}
	
		// 4 isim Seçilmişse kıyasla
	if ($("#liste_3").prop('checked')== true){
	if ($("#id").val()== $("#id2").val()){
		required= 2;
	}
	if ($("#id").val()== $("#id3").val()){
		required= 2;
	}
	if ($("#id2").val()== $("#id3").val()){
		required= 2;
	}
	if ($("#id").val()== $("#id4").val()){
		required= 2;
	}
	if ($("#id2").val()== $("#id4").val()){
		required= 2;
	}
	if ($("#id3").val()== $("#id4").val()){
		required= 2;
	}
			}
	
	} /// Aynı olan isimler bulunuyor. SONU

  
  if(required>0) {
    $(".etiket").find("span").remove();
	if(required==2){$(".etiket").append('<span> # Aynı İsimleri Seçmeyiniz !!<br></span>');}
	$(".etiket").append('<span>* Öğrenci İsmi Seçiniz !!</span>');
	
  } 
  
  if(required>0) {
    return false;
  }   else {
    return true;
  			}
}); // form1 submit sonu
}); //doc ready ENSON