<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>

<p><a href="index.php">&lt;&lt; Admin Panel</a></p>
<p><a href="yaziliekle.php">[ Yeni Yazılı Ekle ]</a></p>
<p>
<?php
		
		$result = mysqli_query($con, "select * from tb_y_yazili" );
		
		while ($row = $result->fetch_assoc()) { // dersler
		
			$baslik = $row["baslik"];
			$ID = $row["ID"];
			$aktif = $row["aktif"];
			echo "Yayında :". $aktif;
			echo "Konu : " .$baslik . " - <a href='yaziliduzelt.php?ders=".$ID."'>Düzelt / Sil </a>". " - <a href='yazilisayfa.php?id=".$ID."'> Sorular</a>";
			echo "<br>"; 
		
		}
?>
</p>
<?php include("../include/footer.php"); ?>
