<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>

<p><a href="index.php">&lt;&lt; Admin Panel</a></p>
<p><a href="dersekle.php">[ Yeni Ders Ekle ]</a></p>
<p>
<?php
		
		$result = mysqli_query($con, "select * from tb_ders" );
		
		while ($row = $result->fetch_assoc()) { // dersler
		
			$baslik = $row["baslik"];
			$ID = $row["ID"];
			$aktif = $row["aktif"];
			echo "Yayında :". $aktif;
			echo "Konu : " .$baslik . " - <a href='dersduzelt.php?ders=".$ID."'>Düzelt / Sil </a>". " - <a href='derssayfa.php?id=".$ID."'>Sayfalar / Sorular</a>";
			echo "<br>"; 
		
		}
?>
</p>
<?php include("../include/footer.php"); ?>
