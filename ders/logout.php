<?php 

setcookie("userid", "", time()-36000);
		setcookie("user", "", time()-36000);
		setcookie("useridi", "", time()-36000);
		setcookie("useri", "", time()-36000);
	$i =1;
	while (isset($_COOKIE["secenek".$i])){	
	setcookie("secenek".$i, "", time()-36000);  // cevaplari sil
	setcookie("soru".$i, "", time()-36000);	
	$i++;
	}	
		
header("Location: ../index.php");


?>
