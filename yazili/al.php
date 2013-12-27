<?php include("../include/db.php"); ?>
<br />
<h3>Ad Soyad : </h3>
<?php
  	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_GET["s"] . "'");

	
    echo " <select name='id' id='id' class='s' onchange='tamam(this.value)'>";
	echo '<option value="">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select><br/><br/>";

?>
<div id="etiket2"><div class="etiket">Adınızı Seçiniz !</div></div>

