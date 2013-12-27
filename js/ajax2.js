function cal(p,no)
{
var xmlhttp;
if (p=="")
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
xmlhttp.open("GET","play.php?p="+p+"&no="+no,true);
xmlhttp.send();
}