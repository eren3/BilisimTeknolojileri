<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>

<p><a href="ders.php">&lt;&lt; Dersler Sayfası</a></p>
<p><a href="derssayfaduzelt.php?dersID=<?php echo $_GET["id"]; ?>">[ Yeni Sayfa Ekle ]</a></p>
<p><?php
		
		$result = mysqli_query($con, "select * from tb_ders_sayfa where dersID =". $_GET["id"] );
		
		while ($row = $result->fetch_assoc()) { // dersler
		
			$ID = $row["ID"];
			$grup = $row["dersID"];
			$text = $row["text"];
			
			echo "Sayfa Numarası :". $ID;
			echo " - Ders No : " .$grup . " - <a href='derssayfaduzelt.php?id=".$ID."&dersID=".$_GET["id"]."'>Düzelt / Sil </a>";
			echo "<br>"; 
		
		}
?></p>
<p><a href="eklesoru.php?dersID=<?php echo $_GET["id"]; ?>">[ Yeni Soru Ekle ]</a></p>
<p>
<?php
		
		$result = mysqli_query($con, "select * from tb_soru where grup =". $_GET["id"] );
		$ii=1;
		while ($row = $result->fetch_assoc()) { // dersler
		
			$ID = $row["ID"];
			$grup = $row["grup"];
			$text = $row["text"];
			$puan = $row["puan"];
			echo "<b>". $ii.". </b>";
			$ii ++;
			echo " ID:". $ID; // maximum sorunun yazılma uzunluğu aşağıdaki satırda belirtildi.
			echo " Soru : " . substr($text,0,70) . " Puan:". $puan ." - <a href='eklesoru.php?id=".$ID."&dersID=".$_GET["id"]."'>Düzelt / Sil </a>";
			echo "<br>"; 
			$toplam += $puan;
		}
			echo "<br>Toplam Puan:". $toplam;
			
?>
</p>
<?php include("../include/footer.php"); ?>