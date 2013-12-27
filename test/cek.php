<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
</head>

<body>

<?php
$icerik=file_get_contents("https://e-okul.meb.gov.tr/main.aspx");
preg_match_all("/\<td.*?\>(.*?)\<\/td\>/", $icerik,$dizi);
for($i=0;$i<sizeof($dizi[1]); $i++)
echo $dizi[1][$i].'<br>';  
?>
</body>
</html>
