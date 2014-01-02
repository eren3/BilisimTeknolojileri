<?php  // $_GET["dersID"] sorunun ait olduğu ders ID si , $_GET["id"] sorunun ID si.
$js1 = "tinymce/jscripts/tiny_mce/tiny_mce.js";
$js2 = "texteditbasic.js";
$js3 = "jquery-1.7.2.min.js";
$js4 = "ksoru.js";
include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>
<?php
 

if ($_GET["id"]!= NULL){
		$result = mysqli_query($con, "select * from tb_y_soru where ID = ". $_GET["id"] );
		while ($row = $result->fetch_assoc()) { // sorular
			$IDs = $row["ID"];
			$grup = $row["grup"];
			$texts = $row["text"];	
			$puan = $row["puan"];
			}
		$result2 = mysqli_query($con, "select * from tb_y_secenek where soruID = ". $IDs );
		$i=0;
		while ($row = $result2->fetch_assoc()) { // secenekler
			
			$ID[$i] = $row["ID"];
			$text[$i] = $row["text"];
			$dogrumu[$i] = $row["dogrumu"];	
			$i++;
			}
		
		
		
		}else
		{

			$IDs = "";
			$grup = "";
			$texts = "";	
			//$puan = "5";
		
		
		}
        
		
		if ($_POST["sil"] != NULL){  // Sil Tıklanmışsa bul ve sil 

		mysqli_query($con,"DELETE FROM tb_y_soru WHERE ID = ". $_GET["id"]);
		mysqli_query($con,"DELETE FROM tb_y_secenek WHERE ID = ". $ID[0]);
		mysqli_query($con,"DELETE FROM tb_y_secenek WHERE ID = ". $ID[1]);
		mysqli_query($con,"DELETE FROM tb_y_secenek WHERE ID = ". $ID[2]);
		mysqli_query($con,"DELETE FROM tb_y_secenek WHERE ID = ". $ID[3]);
		mysqli_query($con,"DELETE FROM tb_y_secenek WHERE ID = ". $ID[4]);
		mysqli_close($con);
		header("Location: yazilisayfa.php?id=". $_GET["dersID"]);
		}
?>


<form action="" method="post" name="form1" id="form1">
  <label>Soru:<br />
  <textarea name="textarea" id="textarea" cols="45" rows="2"><?php echo $texts; ?></textarea>
  </label>
  <label> </label>
  <label><br />
  <br />
  </label>
  <label>Seçenekler:<br />
  </label>
  <table width="512" height="169" border="1">
    <tr>
      <td width="461"><label>
        <textarea name="t2" id="t2" cols="45" rows="5"><?php echo $text[0]; ?></textarea>
      </label></td>
      <td width="35"><label>
        <input type="radio" name="radio" id="r1" class="sec" value="1" <?php if ($dogrumu[0]== 1 ){ echo "checked='checked'";} ?> />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <textarea name="t3" id="t3" cols="45" rows="5"><?php echo $text[1]; ?></textarea>
      </label></td>
      <td><label>
        <input type="radio" name="radio" id="r2" class="sec" value="2" <?php if ($dogrumu[1]== 1 ){ echo "checked='checked'";} ?> />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <textarea name="t4" id="t4" cols="45" rows="5"><?php echo $text[2]; ?></textarea>
      </label></td>
      <td><label>
        <input type="radio" name="radio" id="r3" class="sec" value="3" <?php if ($dogrumu[2]== 1 ){ echo "checked='checked'";} ?> />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <textarea name="t5" id="t5" cols="45" rows="5"><?php echo $text[3]; ?></textarea>
      </label></td>
      <td><label>
        <input type="radio" name="radio" id="r4" class="sec" value="4" <?php if ($dogrumu[3]== 1 ){ echo "checked='checked'";} ?> />
      </label></td>
    </tr>
    <tr>
      <td><textarea name="t6" id="t6" cols="45" rows="5"><?php echo $text[4]; ?></textarea></td>
      <td><input type="radio" name="radio" id="r5" class="sec" value="5" <?php if ($dogrumu[4]== 1 ){ echo "checked='checked'";} ?> /></td>
    </tr>
  </table>
  <p>
    <label>
    Puan: 
    <input name="puan" type="text" id="puan" value="<?php echo $puan; ?>" />
    </label>
  </p>
  <label>
  <input name="button" type="submit" class="btn" id="button" value="Kaydet" />
  </label> 
  <a href="yazilisayfa.php?id=<?php echo $_GET["dersID"]; ?>">İptal
  </a><div class="etiket"></div>
</form>
<p>

  <?php

 if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
 		if ($_GET["id"]== NULL){ // eğer yani kayıt ekleniyorsa !!!
		
		mysqli_query($con,"INSERT INTO tb_y_soru (grup, text, puan) VALUES (" . $_GET["dersID"]." , '". $_POST["textarea"]. "', " . $_POST["puan"] . " )" );

	
		$result = mysqli_query($con, "select * from tb_y_soru" ); 
						// son eklenen sorunun ID sini buluyoruz.
		while ($row = $result->fetch_assoc()) { // sorular
			$IDson = $row["ID"];
			}
		
		/*  Son taslak ta cevapların sayısına göre kayıt açılıyordu yeni taslakta veri olmasada boş kayıt açılır.
		
		if ($_POST["t2"] != NULL){   
			if ($_POST["radio"]==1){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"INSERT INTO tb_secenek (soruID, text, dogrumu) VALUES (" . $IDson .",'". $_POST["t2"]. "'," . $rr . ")" );
		}
		*/
		  
			if ($_POST["radio"]==1){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"INSERT INTO tb_y_secenek (soruID, text, dogrumu) VALUES (" . $IDson .",'". $_POST["t2"]. "'," . $rr . ")" );
				
				
			if ($_POST["radio"]==2){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"INSERT INTO tb_y_secenek (soruID, text, dogrumu) VALUES (" . $IDson .",'". $_POST["t3"]. "'," . $rr . ")" );
		
		
			if ($_POST["radio"]==3){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"INSERT INTO tb_y_secenek (soruID, text, dogrumu) VALUES (" . $IDson .",'". $_POST["t4"]. "'," . $rr . ")" );
		
		
			if ($_POST["radio"]==4){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"INSERT INTO tb_y_secenek (soruID, text, dogrumu) VALUES (" . $IDson .",'". $_POST["t5"]. "'," . $rr . ")" );
		
		
			if ($_POST["radio"]==5){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"INSERT INTO tb_y_secenek (soruID, text, dogrumu) VALUES (" . $IDson .",'". $_POST["t6"]. "'," . $rr . ")" );
		
}  else // Yeni kayıt ekleme SONU 
{		mysqli_query($con,"UPDATE tb_y_soru SET text = '". $_POST["textarea"]. "', puan = ". $_POST["puan"] . " WHERE ID =" . $_GET["id"] );
		
		
			if ($_POST["radio"]==1){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"UPDATE tb_y_secenek SET text = '". $_POST["t2"]. "', dogrumu = " . $rr . " WHERE ID =". $ID[0] );
				
			if ($_POST["radio"]==2){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"UPDATE tb_y_secenek SET text = '". $_POST["t3"]. "', dogrumu = " . $rr . " WHERE ID =". $ID[1] );
				
			if ($_POST["radio"]==3){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"UPDATE tb_y_secenek SET text = '". $_POST["t4"]. "', dogrumu = " . $rr . " WHERE ID =". $ID[2] );
				
			if ($_POST["radio"]==4){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"UPDATE tb_y_secenek SET text = '". $_POST["t5"]. "', dogrumu = " . $rr . " WHERE ID =". $ID[3] );
			
			if ($_POST["radio"]==5){ $rr=1; }else { $rr =0;}
		mysqli_query($con,"UPDATE tb_y_secenek SET text = '". $_POST["t6"]. "', dogrumu = " . $rr . " WHERE ID =". $ID[4] );
		
		header("Location: yazilisayfa.php?id=". $_GET["dersID"]);
							
		
} // Kayıt Güncelleme SONU
}  
  


mysqli_close($con); // SQL bağlantısını sonlandır.
?>
</p>
<p>
  <?php if ($_GET["id"] != NULL){ ?>
</p>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post" action="">
  <label>
  
  <input name="sil" type="submit" class="required" id="sil" value="Soruyu sil !" />
  </label>
</form>

<?php } ?>
<?php include("../include/footer.php"); ?>
