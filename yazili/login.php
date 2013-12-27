<?php $renk = "#D2FFA6";
$js1="pencere.js"; 
include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>
<p>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Eğer POST varsa sayfaya...
					 
		
		$result = mysqli_query($con, "select * from tb_ogrenci WHERE no= '" . $_POST["id"] . "'");
		setcookie("userid", "", time()-36000);   // olası eski kullanıcı girişlerini sil.
		setcookie("user", "", time()-36000);
			setcookie("useridi", "", time()-36000);
			setcookie("useri", "", time()-36000);
		setcookie("useridii", "", time()-36000);
		setcookie("userii", "", time()-36000);
			setcookie("useridiii", "", time()-36000);
			setcookie("useriii", "", time()-36000);
		
		
		$userid = "userid";
		$user = "user";			
			
		while ($row = $result->fetch_assoc()) {	
		unset($no, $ad);
		$no = $row['no'];
        $ad = $row['ad'];
		echo " | ".$ad ." - ".$no." | ";
		echo "<br>";
		// kullanıcı no ları oturum bilgisine kaydedilir.						
		setcookie($userid, $no , time()+72000);
		setcookie($user, $ad, time()+72000);
		$userid .="i";
		$user .= "i";
		}
		
		

} else {
header("Location: index.php");
}

$result = mysqli_query($con, "select * from tb_y_yazili where aktif = 1" );
		
		while ($row = $result->fetch_assoc()) { // dersler
		
			$baslik = $row["baslik"];
			$grup = $row["grup"];
			$ID = $row["ID"];
			$text = $row["text"];
			
			$result2 = mysqli_query($con, "select * from tb_y_cevap where ogno = ". $_POST["id"]. " and grup = ".$grup );
			$rowcount=mysqli_num_rows($result2);
									
			echo "<div class= 'kutu'><h3>" .$baslik. "</h3>";
			echo "<br>"; 
			echo "Açıklama : " . $text;
			echo "<br><br> ";
			if ($rowcount != 0){
				echo "Bu Yazılıya Giriş Yaptınız! Tekrar Giremezsiniz! </div><br/>";
			} else {
				?>
		<a href="javascript:penac('soru.php?g=<?php echo $grup ?>&s=1'); window.location.href = 'index.php';">Yazılaya Başla &gt;</a></div><br/>
			<?php
            }
					
			
		}

?>
            <?php include("../include/footer.php"); ?>
