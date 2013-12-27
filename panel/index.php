<?php 
$js1 = "ajax3.js";
include("../include/db.php"); ?>
<?php include("../include/header.php"); ?>
<?php 
if ($_SERVER["REQUEST_METHOD"] != "POST"){ ?>
<h3>Öğrenci Panel Girişi! </h3>
<form id="form1" name="form1" method="post" action="index.php">
  <label>
  Sınıf :
  <select name="s" id="s" onchange="isimler(this.value)">
    <option value="" selected="selected">Seçiniz!</option>
    <option value="5A">5A</option>
    <option value="5B">5B</option>
    <option value="5C">5C</option>
    <option value="5D">5D</option>
    <option value="5E">5E</option>
    <option value="5F">5F</option>
    <option value="5G">5G</option>
    <option value="5H">5H</option>
    <option value="5K">5K</option>
    <option value="5L">5L</option>
    <option value="6A">6A</option>
    <option value="6B">6B</option>
    <option value="6C">6C</option>
    <option value="6D">6D</option>
    <option value="6E">6E</option>
  </select>
  </label>
  <div id="etiket"> 
    <p class="etiket">Sınıfınızı Seçiniz!  </p>
  </div>
</form>

<?php } ?>

</form>
<h3><?php
	
			if ($_POST["id"] != NULL){   /// isim ve tc POST olayı varsa 
											
				$result3 = mysqli_query($con, "select * from tb_ogrenci WHERE ( no= '" . $_POST["id"] . "' and tc = '". $_POST["tc"]."' )" );  // öğrenci no ile tc no aynı olan kayıdı bul.
								
				$kayitsayisi = 0; 
				$kayitsayisi=mysqli_num_rows($result3);
				if ($kayitsayisi == 0){ // kayıt yoksa 
					echo "<h3>Ad veya TC Doğru DEĞİL!</h3>";
					echo "<a href = 'javascript:history.go(-1)'> <<< Geri - Tekrar Dene ! </a>"; 
				} else { // kayıt varsa cookie yap ve yönlendir.
				setcookie("kul", $_POST["id"],time()+360000 );
				header("Location: panel.php");
				}
			
			} // isim ve tc POST olayı SONU .........

?>
</h3>
<?php include("../include/footer.php"); ?>
