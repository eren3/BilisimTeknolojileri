<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<meta http-equiv="content-language" content="TR" />

<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.simplemodal.1.4.1.min.js"></script>

			<style type="text/css">
			#red {
	color: #F00;
}
            </style>
</head>
			<body>

<script type="text/javascript">

		var sure = 5 ;   //  Geri sayım sayacının başlayacağı rakam
		function Kontrol() {
			sure = sure-1;
			$("span#1").text(sure); // <span id="1"> </span> olan yerde geri sayım yapacaktır
			if( sure > 0 )  setTimeout("Kontrol()", 1000);
		}

	
	        
		jQuery(document).ready( function() 
		{ 		
			kapat = (sure-1)*1000 ; 
			Kontrol();
		    setTimeout(function(){window.close();  }, kapat ); // Popup burda kapanıyor
		});
	
</script>

Sayfa Kapanacak ! 
<div id="red"> 
<span id="1">9</span>
</div>    
    </body>

</html>