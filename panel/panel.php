<?php 
if ($_COOKIE["kul"] == NULL){
header("Location: index.php");
}
?>
<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>
  <?php 
					
					$result = mysqli_query($con, "select * from tb_ogrenci WHERE no= '" . $_COOKIE["kul"]. "'" );
					$row = mysqli_fetch_array($result);
					
					
	$result2 = mysqli_query($con, "select * from tb_puan WHERE no = '" . $_COOKIE["kul"]. "'" );
				
				while ($row2 = $result2->fetch_assoc()) {
				if ($row2["puan"] >= 0){
					$tpuan += $row2["puan"];
					
					}
					
				$puan += $row2["puan"];
				
				}
?>
<table width="100%" border="0">
  <tr>
    <td colspan="2">
<?php					
				echo "<h2>Merhaba ! ".$row["ad"]."</h2> <br>";
?>    
	</td>
    </tr>
  <tr>
    <td colspan="2" valign="top"><a href="logout.php">[ Çıkış ]</a>
      <p></p></td>
    </tr>
  <tr>
    <td width="60%" valign="top">
    <?php				
				echo "Güncel Net Puan : ". $puan. " <br>";
				echo "Toplam Kazanılan : ". $tpuan . " <br>";
				$toplamharcanan =  $tpuan - $puan;
				echo "Kullanılan/Ceza : -". $toplamharcanan . "<br>";

	
	$result2 = mysqli_query($con, "select * from tb_puan WHERE no = '" . $_COOKIE["kul"]. "'" );
				echo "<br><b>Puan Aldığın Etkinlikler :</b><br>";
				while ($row2 = $result2->fetch_assoc()) {
				if ($row2["puan"] >= 0){
					echo $row2["text"];
					echo " - Puan: ". $row2["puan"];
					}
					}
	$result2 = mysqli_query($con, "select * from tb_puan WHERE no = '" . $_COOKIE["kul"]. "'" );
				echo "<br><br><b>Puan Kullanımı /Ceza Etkinlikler : </b><br>";
				while ($row2 = $result2->fetch_assoc()) {
				if ($row2["puan"] < 0){
					echo $row2["text"];
					echo " - Puan: ". $row2["puan"];
					}
					}


?>    </td>
    <td valign="top">Genel Duyuru ve Kurallar</td>
  </tr>
</table>
<?php include("../include/footer.php"); ?>
