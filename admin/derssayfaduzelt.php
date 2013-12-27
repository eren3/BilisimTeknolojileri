<?php  // $_GET["dersID"] sayfanın ait olduğu ders ID si , $_GET["id"] sayfanın ID si.
$js1 = "tinymce/jscripts/tiny_mce/tiny_mce.js";
$js2 = "textedit.js";
include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>
<?php
		
		if ($_GET["id"]!= NULL){
		$result = mysqli_query($con, "select * from tb_ders_sayfa where ID = '". $_GET["id"]. "'" );
		
		while ($row = $result->fetch_assoc()) { // dersler
		
			$ID = $row["ID"];
			$text = $row["text"];	
		}
		}else
		{

			$ID = "";
			$text = "";
		
		
		}
?>

<form id="form1" name="form1" method="post" action=""> 
<textarea name="content" cols="50" rows="15" ><?php echo $text; ?></textarea>
        <br />
        <label>
        <input type="hidden" name="dd" id="dd" value="<?php echo $ID; ?>" />
        <br />
        </label>
        
        <p>
          <input name="Tamam" type="submit" class="btn" id="Tamam" value="Kaydet" />
          <a href="ders.php">iptal</a> </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <input name="sil" type="submit" class="required" id="sil" value="Ders Sil !" />
      </p>
      <label></label>
    <br />
</form>
<?php
	// Create connection
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 

if ($_POST["sil"] != NULL){  // Sil Tıklanmışsa bul ve sil 

		mysqli_query($con,"DELETE FROM tb_ders_sayfa WHERE ID = ". $_GET["id"]);
		mysqli_close($con);
		header("Location: derssayfa.php?id=". $_GET["dersID"]);
}                           // Sil Tıklanmışsa bul ve sil SONU


if ($_GET["id"]!=NULL){
		mysqli_query($con,"UPDATE tb_ders_sayfa SET text = '". $_POST["content"]. "' WHERE ID = ". $_GET["id"]);

		mysqli_close($con);
 		header("Location: derssayfa.php?id=". $_GET["dersID"]);
 		} else {
		
		mysqli_query($con,"INSERT INTO tb_ders_sayfa ( dersID, text)
VALUES (". $_GET["dersID"]  .", '". $_POST["content"] . "')");

		mysqli_close($con);
 		header("Location: derssayfa.php?id=". $_GET["dersID"]);
		
		}
 
 
 
 }  

  
?>
<?php include("../include/footer.php"); ?>
