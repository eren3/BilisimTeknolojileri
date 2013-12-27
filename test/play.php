<?php  //2>&1
exec("mplayer /var/www/upload/".$_GET["p"], $b); 
echo "Bitti ! ";
?>
