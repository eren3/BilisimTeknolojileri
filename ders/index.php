<?php $renk = "#D2FFA6"; 
$js1 = "ajax.js";
$js2 = "jquery-1.7.2.min.js";
$js3 = "kders.js";
include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>

<h3>Sınıfınızı ve Öğrenci Sayısını Seçiniz! </h3>
<form id="form1" name="form1" method="post" action="login.php">
  <label>
  Sınıf :
  <select name="s" id="s" onchange="kac()">
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
  <label></label>
  
  <p>
  <div id="kac"><div class="kirmizi">Sınıfınızı Seçiniz !</div>
  </div>
  </p>
<div class="etiket"></div>  
</form>

<?php include("../include/footer.php"); ?>
