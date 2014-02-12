<?php $con=mysqli_connect("localhost","root","123","db_bt");	
		mysql_query("SET NAMES UTF8"); // karakter seti.
		if (mysqli_connect_errno($con))
  			{
  				echo "MySQL Bağlantı hatası: " . mysqli_connect_error();
  			}
			 // sql db bağlantısı

?>