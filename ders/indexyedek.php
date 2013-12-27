<?php $renk = "#D2FFA6"; 
$js1 = "jquery-1.7.2.min.js";
$js2 = "dersgiris.js";
include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>

<?php 
if ($_SERVER["REQUEST_METHOD"] != "POST"){ ?>
<h3>Sınıfınızı ve Öğrenci Sayısını Seçiniz! </h3>
<form id="myform" name="myform" method="post" action="index.php">
  <label>
  Sınıf :
  <select name="s" id="s" class="s">
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
    <label>
    <input type="radio" name="ss" value="1" id="ss_0" class = "minput"/>
1 Öğrenci</label>
    <br />
    
    <label>
    <input type="radio" name="ss" value="2" id="ss_1" class = "minput"/>
2 Öğrenci</label>
    <br />
    
    <label>
    <input type="radio" name="ss" value="3" id="ss_2" class = "minput"/>
3 Öğrenci<br />
</label>

	<label>
	<input type="radio" name="ss" value="4" id="ss_3" class = "minput"/>
4 Öğrenci</label>
	<br>
	<label><br />
    </label>
    
    <input name="D" type="submit" class="btn" id="D" value="Tamam" />
    <br />
  <div class="etiket" id="mesaj"></div>
   </p>
</form>

<p>&nbsp;</p>
<p>

<?php } ?>


<?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
if ($_POST["s"] != 'Seçiniz!' && $_POST["s"] != ''){
	
	$con=mysqli_connect("localhost","root","123","db_bt");

	mysql_query("SET NAMES UTF8"); // gerekirse karakter seti açılmalı.
	
	if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }  ?>
  

    <h3>Adınızı Seçiniz ! </h3>
    
    <form id="myform" name="myform" method="post" action="login.php">

      <p>
        <?php
  	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_POST["s"] . "'");

	
    echo "<select name='id' class='s' >";
	echo '<option value="">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";

if ($_POST["ss"] > 1){

	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_POST["s"] . "'");

	
    echo "<select name='id2' class='s'>";
	echo '<option value="">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";
							} // 2. ad oluşma sonu.

if ($_POST["ss"] > 2){

	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_POST["s"] . "'");

	
    echo "<select name='id3'>";
	echo '<option value="">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";
								} // 3. ad oluşma sonu.
if ($_POST["ss"] > 3){

	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_POST["s"] . "'");

	
    echo "<select name='id4'>";
	echo '<option value="">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";
								} // 4. ad oluşma sonu.
?>
        
        <input name="d2" type="submit" class="btn" id="d2" value="Tamam" />
      </p><div class="etiket" id="mesaj"></div>
      <p>
        <label>
        <div class="hide">
        <input name="RadyoGrubu1" type="radio" id="RadyoGrubu1_0" value="radyo" checked="checked" class="minput"/>Gizlenmiş Radio butonu</div>
        </label>
        <br />
</p>
</form>
<?php
mysqli_close($con);	
} }
?>
</p>
<?php include("../include/footer.php"); ?>
