<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
<style type="text/css">
<!--
.stil1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label>
  <select name="s" id="s">
    <option value="Seçiniz!" selected="selected">Seçiniz!</option>
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
  <label>
  <input type="submit" name="t" id="t" value="Tamam" />
  </label>
</form>
<p class="stil1">+15 Puan Eklendi !!!
<table width='412' border='1'>
  <tr bgcolor="#CCCCCC"bordercolorlight="#000000">
    <td width="295">Ad Soyad</td>

    <td width="101">Puan</td>
  </tr>
  <?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// Bağlantı
		
		echo "Sınıf: ". $_POST["s"] ;
		$con=mysqli_connect("localhost","root","123","db_bt");
	
		if (mysqli_connect_errno($con))
  		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		} 
		$result3 = mysqli_query($con, "select * from tb_ogrenci WHERE (sinif ='". $_POST["s"] ."')");
		$ii=0;
		
		while ($row3 = mysqli_fetch_array($result3)){
		
	 $toplam = 0;
	 	if ($ii == 0){
			echo "<tr>";
			
		} else { echo "<tr bgcolor='#EBEBEB'>";
			$ii = -1;
		}
		$ii ++;
	 	echo "<td>".$row3['ad']." ". $row3["no"] . "</td>";
		$nno = $row3['no'];
		$result = mysqli_query($con, "select * from tb_y_cevap WHERE (ogno =" .$nno." and grup = 2) "); //ORDER BY tarih DESC  LIMIT 20 soruID soruya en son verilen cevap. 
	   while ($row = mysqli_fetch_array($result)){
	   		
  			$result2 = mysqli_query($con, "select * from tb_y_secenek WHERE (ID =". $row['secID'] .")");
					$row2 = mysqli_fetch_array($result2);
				/*	echo "cevap:";
					echo $row2['text'];
  					echo "<br>";
					echo " - puan : ";
					echo $row2['dogrumu']*5;
  					echo "<br>"; */
					
					$toplam += $row2['dogrumu']*5;
					
					
	   		}
			if ($toplam == 0){ $toplam = "<div class='stil1'>G</div>"; 
									// sınava girmeyenlere G yazıyor.
			} else {
			$toplam += 15;
			if ($toplam > 100 ) {$toplam = 100;} // 100 den büyük puanlar 100 oluyor.
							}
					
	   	echo "<td>". $toplam ."</td>";
		echo "</tr>";
		} // ilk while sonu 
		
		
	  } // if post olmuşsa sonu... 
?>   
</table>
</p>     
</body>
</html>
