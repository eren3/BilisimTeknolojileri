<?php $renk = "#D2FFA6";
$js1="pencere.js";
include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>
<a href="../index.php"><img src="../images/home.png" /> Anasayfa</a>
<p>
  <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Eğer POST varsa sayfaya...
		// sql db bağlantısı
		$con=mysqli_connect("localhost","root","123","db_bt");	
		mysql_query("SET NAMES UTF8"); // gerekirse karakter seti açılmalı.
		if (mysqli_connect_errno($con))
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  			}
			 // sql db bağlantısı
			 
		$result = mysqli_query($con, "select * from tb_ogrenci WHERE no= '" . $_POST["id"] . "' or no='".$_POST["id2"]. "' or no='".$_POST["id3"]. "' or no='".$_POST["id4"]. "'");
		$userid = "userid";
		$user = "user";	
		
		setcookie("userid", "", time()-36000);   // olası eski kullanıcı girişlerini sil.
		setcookie("user", "", time()-36000);
			setcookie("useridi", "", time()-36000);
			setcookie("useri", "", time()-36000);
		setcookie("useridii", "", time()-36000);
		setcookie("userii", "", time()-36000);
			setcookie("useridiii", "", time()-36000);
			setcookie("useriii", "", time()-36000);
		
		
		
		echo "<h3>Derse Giriş Yapanlar</h3> <br>";	
		while ($row = $result->fetch_assoc()) {	
		unset($no, $ad);
		$no = $row['no'];
        $ad = $row['ad'];
		echo $ad." - ".$no;
		echo "<br><br>";
		// kullanıcı no ları oturum bilgisine kaydedilir.						
		setcookie($userid, $no , time()+72000);
		setcookie($user, $ad, time()+72000);
		$userid .="i";
		$user .= "i";
		}
		
		echo "<br><h3>Şuan Açık Olan Dersler :</h3>";



$con2=mysqli_connect("localhost","root","123","db_bt");	
$sinif = substr($_POST["s"],0,1);
$result = mysqli_query($con2, "select * from tb_ders WHERE sinif LIKE '%". $sinif. "%' AND aktif = 1"); // aktif ve o sınıfın dersleri.

	while ($row = $result->fetch_assoc()) {	

		$baslik = $row["baslik"];
		$text = $row["text"];
		$ID = $row["ID"];
		
	

?>
<p>
  <a href="javascript:penac('ders.php?g=<?php echo $ID; ?>&s=1')"><?php echo $baslik; ?></a>
  <br /> <?php echo $text; ?>
  <br /><br />
    
  </p>
  
  <?php } ?>
<p>&nbsp;</p>
</div>
</div>
<?php include("../include/footer.php"); ?>
