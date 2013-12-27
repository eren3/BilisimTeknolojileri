function isimler(s)
{
var xmlhttp;
if (s=="")
  {
  document.getElementById("etiket").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("etiket").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","al.php?s="+s,true);
xmlhttp.send();
}

function tamam(s)
{
var xmlhttp;
if (s!="")
  {
  document.getElementById("etiket2").innerHTML="<label><input type='submit' name='Tamam' id='Tamam' value='Tamam' class='btn'/></label>";
  return;
  } else {
	document.getElementById("etiket2").innerHTML="<div class='etiket'>Adınızı Seçiniz !</div>";  
  }

}