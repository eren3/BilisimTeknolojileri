<?php include("../include/db.php"); ?>
<h3>Adınızı Seçiniz ! </h3>
      
        <?php
  	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_GET["s"] . "'");

	
    echo "<select name='id' id='id' class='s' >";
	echo '<option value="a">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";

if ($_GET["ss"] > 1){

	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_GET["s"] . "'");

	
    echo "<select name='id2' id='id2' class='s'>";
	echo '<option value="a">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";
							} // 2. ad oluşma sonu.

if ($_GET["ss"] > 2){

	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_GET["s"] . "'");

	
    echo "<select name='id3' id='id3' class='s'>";
	echo '<option value="a" >Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";
								} // 3. ad oluşma sonu.
if ($_GET["ss"] > 3){

	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_GET["s"] . "'");

	
    echo "<select name='id4' id='id4' class='s'>";
	echo '<option value="a">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select> <br> <br>";
								} // 4. ad oluşma sonu.

?>
        <label>
        <input type="submit" name="Tamam" id="Tamam" value="Tamam" class="btn"/>
        </label>
        
      