<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Bilişim Teknolojileri</title>

<style type="text/css">
<!--
body {
	background-color: <?php 
	// eğer Sayfa arka plan rengi varsa $renk değişkeni ile include den önce tanımlanır . $Renk değişkeni tanımılanmazsa genel gri rengi arka plan rengi olur.
	if ($renk == NULL) {
	echo "#F2F2F2";
	} else {
	echo $renk;
	}
	
	
	 ?>;
}
-->
</style>
<?php 
	// Eğer Javascript kodu sayfaya eklenecekse js klasörüne yazılır adı da js1, js2 , js3 gibi tanımlanır.
?>
<?php if ($js1 != NULL){ ?>
<script type="text/javascript" src="../js/<?php echo $js1 ;?>"></script>
<?php } ?>
<?php if ($js2 != NULL){ ?>
<script type="text/javascript" src="../js/<?php echo $js2 ;?>"></script>
<?php } ?>
<?php if ($js3 != NULL){ ?>
<script type="text/javascript" src="../js/<?php echo $js3 ;?>"></script>
<?php } ?>
<?php if ($js4 != NULL){ ?>
<script type="text/javascript" src="../js/<?php echo $js4 ;?>"></script>
<?php } ?>

</head>
<body>
<div class="container"> 
<div class="inner">