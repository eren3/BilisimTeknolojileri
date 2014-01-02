<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>

<?php
				
		$result = mysqli_query($con, "select * from tb_y_yazili where ID = '". $_GET["ders"]. "'" );
		
		while ($row = $result->fetch_assoc()) { // dersler
		
			$baslik = $row["baslik"];
			$ID = $row["ID"];
			$aktif = $row["aktif"];
			$sinif = $row["sinif"];
			$text = $row["text"];	
		}
?>

<form id="form1" name="form1" method="post" action=""> 
        <p>Yazılı Açıklaması :        </p>
        <p>
          <textarea name="content" cols="45" rows="5" ><?php echo $text; ?></textarea>
          <br />
        </p>
<label>
        <input type="hidden" name="dd" id="dd" value="<?php echo $ID; ?>" />
        <br />
        Yazılı Başlığı :		
        <input type="text" name="baslik" id="baslik" value="<?php echo $baslik; ?>"/>
        <br />
        Aktif Yazılı : 
        <input type="checkbox" name="aktif" id="aktif"  <?php if ($aktif == 1){echo "checked='checked'"; } ?>/>
        <br />
        Geçerli Sınıflar : 
        <input type="text" name="sinif" id="sinif" value="<?php echo $sinif; ?>"/>
        <br />
        <br />
        <input type="submit" name="Tamam" id="Tamam" value="Kaydet" class="btn" />
      <a href="yazili.php" >iptal</a><br />
        <br />
        <br />
  <br />
      </label>
        
<input type="submit" name="sil" id="sil" value="Ders Sil !" class="required" />
<br />
</form>
<?php
	// Create connection
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 

	
	if ($_POST["sil"] != NULL){  // Sil Tıklanmışsa bul ve sil 
		$con1=mysqli_connect("localhost","root","123","db_bt");
		mysqli_query($con,"DELETE FROM tb_y_yazili WHERE ID = ". $_POST["dd"]);
		mysqli_close($con);
 		header("Location: yazili.php");
	}                           // Sil Tıklanmışsa bul ve sil SONU





		$aktif = 0;
		if ($_POST["aktif"] != NULL){$aktif = 1;}
		mysqli_query($con,"UPDATE tb_y_yazili SET grup = 0 , baslik = '". $_POST["baslik"]. "' , aktif = ". $aktif .", sinif = '".$_POST["sinif"] ."' , text = '". $_POST["content"]. "' WHERE ID = ". $_POST["dd"]);


		mysqli_close($con);
 		header("Location: yazili.php");
 
 		}  

?>
<?php include("../include/footer.php"); ?>
