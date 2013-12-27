<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Öğrenci ekle</title>
</head>

<body>
<p>(no, tc, sinif, ad)</p>
<p>Örnek (123, 12345678900, '5A', 'Ali Pikachu')<br />
  *Çoklu kayıt eklemelerde parentezler arasında virgül olmalı.
</p>
<form action="" method="post" name="form1" id="form1">
  <label>
  <textarea name="textarea" id="textarea" cols="65" rows="20"></textarea>
  </label>
  <label>
  <input type="submit" name="button" id="button" value="Öğrencileri Ekle" />
  </label>
</form>
<p>&nbsp;</p>
<p>
  <?php
	// Create connection
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$con=mysqli_connect("localhost","root","123","db_bt");
	//mysql_query("SET NAMES UTF8"); // gerekirse karakter seti açılmalı.
	
	// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_query($con,"INSERT INTO tb_ogrenci (no, tc, sinif, ad)
VALUES ". $_POST["textarea"]);

mysqli_close($con);
}  
  

  
?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>
