<?php include("../include/header.php"); ?>
<?php include("../include/db.php"); ?>
<input type="submit" name="button" id="button" value="Gönder" onClick="isimler('111')" />
<div id="etiket"></div>
<?php
echo $_SERVER['REMOTE_ADDR'];
?>
<?php 

function NoCache() 
{ 
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache"); 
} 

?>
<?php include("../include/footer.php"); ?>