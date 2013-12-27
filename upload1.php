<?php 

if ($_COOKIE["psw"] != "1"){
header("Location: login.php");
die();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bilişim Teknolojileri</title>
<style type="text/css">
<!--
.stil1 {
	font-size: x-large;
	font-weight: bold;
}
-->
</style>
</head>
<!-- Sabit HTML kodları -->

<body>
<center>
<div align="center" class="stil1">Bilişim Teknolojileri</div>
<br />
<a href="logout.php">Çıkış</a>
<form action="upload.php" method="post"
enctype="multipart/form-data">
<label for="file"> Dosya Seçiniz:</label>
<input type="file" name="file" id="file">
<input type="submit" name="submit" value="Submit" />
<br>
</form>

<p>&nbsp;</p>
***
</center>
</body>
</html>
<br />


