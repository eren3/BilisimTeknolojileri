<?php $renk = "#D2FFA6"; 
//$js1 = "jquery-1.7.2.min.js";
//$js2 = "kontrol.js";
$js1 = "ajax3.js";
include("../include/header.php"); ?>
<?php include("../include/db.php"); 

		setcookie("userid", "", time()-360000);
		setcookie("user", "", time()-360000);
		setcookie("useridi", "", time()-360000);
		setcookie("useri", "", time()-360000);
	$i =1;
	while (isset($_COOKIE["secenek".$i])){	
	setcookie("secenek".$i, "", time()-360000);  // cevaplari sil
	setcookie("soru".$i, "", time()-360000);	
	$i++;
	}
?>
<h3>Yazılı Giriş !</h3>
<form id="form1" name="form1" method="post" action="login.php">
  <label>
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
  <br>
  <br>
   <div id="etiket"><div class="etiket">Sınıfınızı Seçiniz !</div></div><br />

</form>
<?php include("../include/footer.php"); ?>
