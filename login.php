<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Şifre Giriniz!</title>
</head>

<body>
<?php
$sifre = "123";
?>

<form name="login" method="post" action="">
Password: <input type="password" name="pw">
<input type="submit" value="Aç">
</form>

<?php
if ($_COOKIE["psw"] == "1"){
header("Location: upload1.php");
die();
}
else{

if($_POST){
$parola = $_POST['pw'];

if($parola==$sifre){
echo "Şife Doğru";
setcookie("psw", "1");
header("Location: upload1.php");
die();
// Gizlenen İçerik Burada Yer Alabilir.
}
else {
echo "Şifre Yanlış";

}

}}

?>



</body>
</html>
