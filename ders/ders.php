<?php 
if ($_COOKIE["user"] == NULL){
echo "<h3>SAYFAYI KAPATIN VE TEKRAR GIRIS YAPIN !!! </h3>";
die();
}
?>
<?php $renk = "#FFE0B7"; include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>
<?php
echo "| ". $_COOKIE["user"]. " | ".$_COOKIE["useri"] .  " | ".$_COOKIE["userii"] . " | ".$_COOKIE["useriii"] . "<hr>";
//echo $_GET["d"];
//echo $_GET["s"];
?>
<?php
		$result = mysqli_query($con, "select * from tb_ders_sayfa WHERE dersID = ". $_GET["g"]);
		
		$xx = $_GET["s"]; // kaçıncı sayfa ekrana gelecekse ! 
		$x=0;
		
		while($x != $xx)  // istenilen kayıt  !!!!!!!!!!	
  		{
		$x++;
				if ($row = $result->fetch_assoc())
				{	
				$text = $row["text"];		// sayfa var.
				$soru = 0;
				}
				else{  // sayfa yok.
				$soru = 1;				
				
				} // sonuc sayfasına yönlendir.
		} 
		
		if ($soru == 0){
		
		echo  "<h3>Sayfa : ". $_GET["s"] ."/". $rowcount=mysqli_num_rows($result)."</h3>";
		
		echo $text;
		$sayfa = $_GET["s"] + 1 ; //Sonraki sayfa 
		echo "<br>"."<a href='ders.php?g=".$_GET["g"]."&s=".$sayfa."'>Okudum! Anladım! ...Sonraki Sayfaya geç ! >>> </a>";
		} else {
		echo "<b>Ders Bitti ! </b>"; 
		echo "<a href='soru.php?g=".$_GET["g"]."&s=1'>Burayı Tıkla ve Sorulara Başla </a>"; 
		
		}
?>
<?php include("../include/footer.php"); ?>
