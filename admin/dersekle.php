<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>

<form id="form1" name="form1" method="post" action=""> 
        <p>Ders Açıklaması :        </p>
        <p>
          <textarea name="content" cols="45" rows="5" ><?php echo $text; ?></textarea>
          <br />
        </p>
<label>
        <input type="hidden" name="dd" id="dd" value="<?php echo $ID; ?>" />
        <br />
        Ders Başlığı :		
        <input type="text" name="baslik" id="baslik" value="<?php echo $baslik; ?>"/>
        <br />
        Aktif Ders : 
        <input type="checkbox" name="aktif" id="aktif"  <?php if ($aktif == 1){echo "checked='checked'"; } ?>/>
        <br />
        Geçerli Sınıflar : 
        <input type="text" name="sinif" id="sinif" value="<?php echo $sinif; ?>"/>
        <br />
      <br />
        </label>
<input name="Tamam" type="submit" class="btn" id="Tamam" value="Kaydet" />
        <a href="ders.php">iptal</a> <br />
</form>
<?php
	// Create connection
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$aktif = 0;
		if ($_POST["aktif"] != NULL){$aktif = 1;}
	
		mysqli_query($con,"INSERT INTO tb_ders (grup, baslik , aktif, sinif, text ) VALUES ( 0,'". $_POST["baslik"]. "' , ". $aktif .", '".$_POST["sinif"] ."' , '". $_POST["content"]. "')");


		mysqli_close($con);
 		header("Location: ders.php");
 
 }  

  
?>
<?php include("../include/footer.php"); ?>
