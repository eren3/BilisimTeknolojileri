<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>

<p><a href="yazili.php">&lt;&lt; Yazılılar Sayfası</a></p>
<p><a href="yazilieklesoru.php?dersID=<?php echo $_GET["id"]; ?>">[ Yeni Soru Ekle ]</a></p>
<p>
<?php
		
		$result = mysqli_query($con, "select * from tb_y_soru where grup =". $_GET["id"] );
		$ii=1;
		while ($row = $result->fetch_assoc()) { // dersler
		
			$ID = $row["ID"];
			$grup = $row["grup"];
			$text = $row["text"];
			$puan = $row["puan"];
			echo "<b>". $ii.". </b>";
			$ii ++;
			echo " ID:". $ID; 
			
			$text = str_replace('<br>', '', $text); // BR tag larını kaldırıyor.
			$text = str_replace('<br/>', '', $text);

			$pos1 = strpos($text, '<img', 0); 	// Resimleri [RESİM] ile değiştiriyor.
			if ($pos1 !== false){
			$pos2 = strpos($text, '>', $pos1);
			$t1 = substr($text,0,$pos1);
			$t2 = substr($text,$pos2 +1 ,70); 	// en fazla 70 karekter olarak yazdırıyor.
			$text = $t1 . " [RESİM] " .$t2 ;
			} else { 
				$text = substr($text,0,70); 	// en fazla 70 karekter olarak yazdırıyor.
			}

			$text = str_replace('<', 'I', $text);
			$text = str_replace('>', 'I', $text);
			
			echo " Soru : " . $text . " Puan:". $puan ." - <a href='yazilieklesoru.php?id=".$ID."&dersID=".$_GET["id"]."'>Düzelt / Sil </a>";
			echo "<br>"; 
			$toplam += $puan;
		}
			echo "<br>Toplam Puan:". $toplam;
			
?>
</p>
<?php include("../include/footer.php"); ?>