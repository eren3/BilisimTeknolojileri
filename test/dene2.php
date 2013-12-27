<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" type="text/javascript">
function stopRKey(evt) {
    var evt  = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type=="text")) { return false; }
}
document.onkeypress = stopRKey;
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
</head>

<body>
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
</body>
</html>
