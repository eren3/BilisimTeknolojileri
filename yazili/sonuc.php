<?php $renk = "#FFFF99"; include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>
<?php

	   
	   $i = 1;
	   //print_r($_COOKIE);
	   while (isset($_COOKIE["secenek".$i])){ // olan COOKIE leri kontrol et.
		
		mysqli_query($con,"INSERT INTO tb_y_cevap ( soruID, secID, ogno, grup, tarih) VALUES ( '". $_COOKIE["soru".$i]."','".$_COOKIE["secenek".$i]."','". $_COOKIE["userid"]."','". $_GET["g"]."', CURRENT_TIMESTAMP)");
		
	   $i++ ;

} // while cookie kontrol sonu

			// Cevaplar cookielerden Siliniyor. 
			$i =1;
			while (isset($_COOKIE["secenek".$i])){	
			setcookie("secenek".$i, "", time()-360000);  // cevaplari sil
			setcookie("soru".$i, "", time()-360000);	
			$i++;
			}// Cevaplar cookielerden Siliniyor SONU. 


 			echo "<center><h3><br><br>SORULAR BİTTİ ! </h3><br><h3><a href = 'javascript:window.close();'>BURAYI TIKLA...!</a></h3></center>";
  
?>        
<?php include("../include/footer.php"); ?>
