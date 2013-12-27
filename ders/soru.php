<?php $renk = "#DDFFFF";
$js1 = "jquery-1.7.2.min.js";
$js2 = "scripts.js";
include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>

<p>
  <?php
				
  	$result = mysqli_query($con, "select * from tb_soru WHERE grup = ". $_GET["g"]); 
								// GET "s"  değeri hangi grup soru olduğu (hangi konunun testleri 
	echo  "<h3>Soru Sayısı : ". $_GET["s"] ."/". $rowcount=mysqli_num_rows($result)."</h3>";
	
		$xx = $_GET["s"]; // kaçıncı soru ekrana gelecekse ! 
		$x=0;
		
		while($x != $xx)  // istenilen kayıt  !!!!!!!!!!	
  		{
		$x++;
				if ($row = $result->fetch_assoc())
				{	
						// soru var.
				}
				else{  // soru yok.
				$ss = $_GET["s"]-1; // gelen soru -1 den bir önceki soru sırası bulunuyor. 
				setcookie("secenek". $ss,$_POST["secenek"] , time()+72000);
				setcookie("soru".$ss, $_POST["soruID"], time()+72000);
				
				header("Location: sonuc.php?g=".$_GET["g"]);  } // sonuc sayfasına yönlendir.
		
		} 

		unset($soru);
		$soru = $row['text']; 
		$ID = $row['ID'];	// Sorunun ID bulunur.

	
	$result2 = mysqli_query($con, "select * from tb_secenek WHERE soruID =". $ID );
  		// soruya ait bütün secenekler bulunur.
	
	?>
</p>

<form id="myform" name="form1" method="post" action="soru.php?g=<?php echo $_GET["g"]; ?>&s=<?php echo $_GET["s"]+1 ?>">

  <p><?php echo $soru; ?></p>
  <p>
<input name="secenek" type="radio" value="0"  id ="sec" checked="checked" style="display:none;"/> 
  <?php 					//// Gizli Radio button seçilmeyen seceneklerede 0 değerini verir.
      
	  if (mysqli_num_rows($result2) != 0){
	  while ($row2 = $result2->fetch_assoc()) { // seçenekler 
                  unset($no, $text, $sorumu, $dogrumu );
                  $no = $row2['soruID'];
                  $text = $row2['text']; 
				  $sec = $row2['ID'];
					
					// bulunan secenekler yazdırılır.
					if ($text!= NULL){
					echo "<label>" ;
					echo "<input type='radio' name='secenek' value='".$sec. "' id='secenek_".$no."' class='minput' /> "; // seçeneğe ait ID, value olarak atanır.
					echo $text; 
					echo "</label> <br />" ;		  
					}			  
		}}
		
		/////// GELEN CEVAPLARIN COOKIE OLARAK TANIMLANMASI
		$ss = $_GET["s"]-1; // -1 den bir önceki sorunun soru sırası bulunur.
		setcookie("secenek". $ss ,$_POST["secenek"] , time()+72000);
		setcookie("soru". $ss, $_POST["soruID"], time()+72000);
			// cookie olarak sorulara verilen cevaplar:  "secenek+soru sıra nu."  adı ile seceneğin ID değeri veri olacak şekilde tanımlanır. Aynı sıra numarası ile "soruID + soru sıra nu." sorunun ID si veri olarak tanımlanır.
		////////	
			
			?>
  <label><br/>
  <input name="soruID" type="hidden" id="soruID" value="<?php echo $no; ?>" />
  <br />
  <input type="submit" name="Tamam" id="Tamam" value="Tamam" class="btn"/>
  </label>  
  <br />
  </p>
</form>
<div class="etiket" ></div>
<p>
</p>
<?php include("../include/footer.php"); ?>
