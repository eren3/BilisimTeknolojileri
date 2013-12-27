<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
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
<p>
<table width='800' border='1'>
	<tr bgcolor="#CCCCCC"bordercolorlight="#000000">
    <td width="300">Ad Soyad</td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
    <td>20</td>
    <td>Puan</td>
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
					if ($row2['dogrumu']== NULL){
						$pp = 'B'; } else {
							$pp = $row2['dogrumu']; }
					echo "<td>". $pp . "</td>"; 
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
