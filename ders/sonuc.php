<?php $renk = "#FFFF99"; 
include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>
<center>
<?php
	   
	   $i = 1;
	   //print_r($_COOKIE);
	   while (isset($_COOKIE["secenek".$i])){ // olan COOKIE leri kontrol et.
		mysqli_query($con,"INSERT INTO tb_cevap ( soruID, secID, ogno, grup, tarih) VALUES ( '". $_COOKIE["soru".$i]."','".$_COOKIE["secenek".$i]."','". $_COOKIE["userid"]."','". $_GET["g"]."', CURRENT_TIMESTAMP)");
		if (isset($_COOKIE["useridi"])){
		mysqli_query($con,"INSERT INTO tb_cevap ( soruID, secID, ogno, grup, tarih) VALUES ( '". $_COOKIE["soru".$i]."','".$_COOKIE["secenek".$i]."','". $_COOKIE["useridi"]."','". $_GET["g"]."', CURRENT_TIMESTAMP)");
		}
		if (isset($_COOKIE["useridii"])){
		mysqli_query($con,"INSERT INTO tb_cevap ( soruID, secID, ogno, grup, tarih) VALUES ( '". $_COOKIE["soru".$i]."','".$_COOKIE["secenek".$i]."','". $_COOKIE["useridii"]."','". $_GET["g"]."', CURRENT_TIMESTAMP)");
		}
		if (isset($_COOKIE["useridiii"])){
		mysqli_query($con,"INSERT INTO tb_cevap ( soruID, secID, ogno, grup, tarih) VALUES ( '". $_COOKIE["soru".$i]."','".$_COOKIE["secenek".$i]."','". $_COOKIE["useridiii"]."','". $_GET["g"]."', CURRENT_TIMESTAMP)");
		}
				
	   $i++ ;

} // while cookie kontrol sonu
 			
			// Cevaplar cookielerden Siliniyor. 
			$i =1;
			while (isset($_COOKIE["secenek".$i])){	
			setcookie("secenek".$i, "", time()-360000);  // cevaplari sil
			setcookie("soru".$i, "", time()-360000);	
			$i++;
			}// Cevaplar cookielerden Siliniyor SONU. 
			
			
			$result = mysqli_query($con, "select * from tb_soru WHERE grup = ". $_GET["g"]);
			$sorusayisi = $rowcount=mysqli_num_rows($result) ;
			// Dersin Şuan ki Soru sayısı bulunuyor.
			
			$nno = $_COOKIE["userid"];
			$grupno = $_GET["g"];
			
			$result = mysqli_query($con, "select * from tb_cevap WHERE (ogno =" .$nno." and grup = ". $grupno .") ORDER BY tarih DESC LIMIT ". $sorusayisi); // 
			 
	   while ($row = mysqli_fetch_array($result)){
	  $result2 = mysqli_query($con, "select * from tb_secenek WHERE (ID =". $row['secID'] .")");
					$row2 = mysqli_fetch_array($result2);
	  $result3 = mysqli_query($con, "select * from tb_soru WHERE (ID =". $row['soruID'] .")");
					$row3 = mysqli_fetch_array($result3);	
								
					$toplam += $row2['dogrumu']*$row3['puan'];
					if ($row2['dogrumu']== NULL){
						$pp = 'B'; } else {
							$pp = $row2['dogrumu']; }
					if ($row2['dogrumu']== 1){
						$dsayisi ++; }
					 
	   		}
			
	   	echo "<h3>Toplam Puan :". $toplam . "</h3>";
		$oran = $dsayisi / $sorusayisi * 100 ;
?>

<table width="700" border="1" style="border:thin #666666">
  <tr>
    <td width="<?php echo substr($oran,0,4); ?>%" bgcolor="#00CC33" ><div align="right" style="color:#CC0005">Doğru Oranı: %<?php echo substr($oran,0,4); ?></div></td>
    <td></td>
  </tr>
</table>

<?php		 
			
		$result = mysqli_query($con, "select * from tb_ders where ID = '". $_GET["g"]. "'" );
		while ($row = $result->fetch_assoc()) { // dersler
			$baslik = $row["baslik"];
			$ID = $row["ID"];
		}	
			
			
			// Pulunan puan bütün giriş yapan öğrencilere tb_puan tablosuna ekleniyor.
			$i="";
			while (isset($_COOKIE["userid".$i])){
			$result = mysqli_query($con, "select * from tb_puan WHERE ( no = ". $_COOKIE["userid".$i] ." and grup =". $_GET["g"]. " )");
			$rowcount=mysqli_num_rows($result);
				if ($rowcount == 0){
			mysqli_query($con,"INSERT INTO tb_puan ( no, grup, puan, text) VALUES ( ". $_COOKIE["userid".$i].",". $_GET["g"].", ".$toplam.", )");
				} else {
			mysqli_query($con,"UPDATE tb_puan SET puan = ". $toplam ." , text = 'Ders ID:". $ID." Konu:". $baslik ."'  WHERE ( no = ". $_COOKIE["userid".$i] ." and grup =". $_GET["g"]. " )");
						}
			$i = $i."i";
			}
			// Puan tablosuna ekleme SONU
			
			
			
			echo "<h3><br><br>SORULAR BİTTİ ! </h3><br><h3><a href = 'javascript:window.close();'>TIKLA PENCEERE KAPANSIN...!</a></h3>";
 
?>
</center>        
<?php include("../include/footer.php"); ?>
