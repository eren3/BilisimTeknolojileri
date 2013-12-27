<?php include("../include/db.php"); ?>
<br />
<h3>Adınızı Seçiniz ! </h3>
      

        <?php
  	$result = mysqli_query($con, "select * from tb_ogrenci WHERE sinif= '" . $_GET["s"] . "'");

	
    echo " <select name='id' id='id' class='s' >";
	echo '<option value="a">Seçiniz!</option>';
    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['no'];
                  $name = $row['ad']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
				}
    echo "</select><br/><br/>";

?>
<h3>Tc Numaranız :</h3> 
<label>
<input type="text" name="tc" id="tc">
</label>
<br />
<br />
<br />
<label>
<input type="submit" name="Tamam" id="Tamam" value="Tamam" class="btn"/>
</label>
        
        
      