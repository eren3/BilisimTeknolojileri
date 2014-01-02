<?php include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>

<form id="form1" name="form1" method="post" action=""> 
        <p>Yazılı Açıklaması :        </p>
        <p>
          <textarea name="content" cols="45" rows="5" ></textarea>
          <br />
        </p>
<label>
        <input type="hidden" name="dd" id="dd" value="" />
        <br />
        Yazılı Başlığı :		
        <input type="text" name="baslik" id="baslik" value=""/>
        <br />
        Aktif Yazılı : 
        <input type="checkbox" name="aktif" id="aktif" />
        <br />
        Geçerli Sınıflar : 
        <input type="text" name="sinif" id="sinif" value=""/>
        <br />
      <br />
        </label>
<input name="Tamam" type="submit" class="btn" id="Tamam" value="Kaydet" />
        <a href="yazili.php">iptal</a> <br />
</form>
<?php
	// Create connection
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 

		$aktif = 0;
		if ($_POST["aktif"] != NULL){$aktif = 1;}
	
		mysqli_query($con,"INSERT INTO tb_y_yazili (grup, baslik , aktif, sinif, text ) VALUES ( 0,'". $_POST["baslik"]. "' , ". $aktif .", '".$_POST["sinif"] ."' , '". $_POST["content"]. "')");


		mysqli_close($con);
 		header("Location: yazili.php");
 
 }  

  
?>
<?php include("../include/footer.php"); ?>
