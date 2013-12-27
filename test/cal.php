<?php $renk = "#D2FFA6"; 
$js1 = "ajax2.js";
include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>
<p>Müzik Seç 50 Puan !</p>
 
 <p>
   <?php 
 	if ($dizin = opendir('/var/www/upload')) {
    echo "Dizin tanıtıcısı: $dizin";
    echo "Dizin içeriği:";
	}
?>
 </p>
 <p>
   <label></label>
   <label>
   <select name="liste" size="10" multiple id="liste" style="width:500px">
     <?php
	 while (false !== ($dosya = readdir($dizin))) {
        if ($dosya!=".." and $dosya!="."){
		echo  "<option value='".$dosya."'>".$dosya."</option>";
    	}
		
	}
	 ?>
               </select>
   </label>
 </p>
 <p>  
   <input type="submit" name="cal" id="cal" value="Müzik Çal" onClick="cal(liste.value,0)">
 </p>
 <div id="etiket">2</div>
<?php 
closedir($dizin);
include("../include/footer.php"); ?>

