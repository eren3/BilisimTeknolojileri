function penac(theURL) {
  	var winName;
	var features;
	winName = 'BilişimTeknolojileri';
	features = 'toolbar=0,location=0,status=0,menubar=0, scrollbars=0, resizable=0, width='+screen.width +', height=' + screen.height  + ', fullscreen=Yes';
	window.open(theURL,winName,features);
}