<?php 

		setcookie("userid", "", time()-360000);
		setcookie("user", "", time()-360000);
		setcookie("useridi", "", time()-360000);
		setcookie("useri", "", time()-360000);
	$i =1;
	while (isset($_COOKIE["secenek".$i])){	
	setcookie("secenek".$i, "", time()-360000);  // cevaplari sil
	setcookie("soru".$i, "", time()-360000);	
	$i++;
	}	
		
header("Location: ../index.php");


?>
