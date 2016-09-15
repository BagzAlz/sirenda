function widget_form(width,height,token){
  	document.getElementById("mywidget").innerHTML='<iframe src="'+('https:' == document.location.protocol ? 'https:' : 'http:')+'//www.barcodevent.com/on/widget/'+token+'?iframe=1&h='+window.location.host+'&width="'+width+'" height="'+height+'" style="min-width:'+width+'px;border:1px solid #ccc" border="0"></iframe>';
}
