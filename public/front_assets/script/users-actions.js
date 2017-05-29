$(document).ready(function(){
	
	/* fancybox */
	$("a.lightbox").fancybox({ 'margin': 0, 'padding': 0 });
	
	$("a.iframe800x600").fancybox({
		'overlayShow' : true,
		'zoomSpeedIn' : 500, 
		'zoomSpeedOut' : 500,
		'width' : 800,
		'height' : 652,
		'type': 'iframe','margin': 0,'padding': 0,'autoScale': false,'scrolling':'no'		 
	});
	
	$("a.iframe800x400").fancybox({
		'overlayShow' : true,
		'zoomSpeedIn' : 500, 
		'zoomSpeedOut' : 500,
		'width' : 800,
		'height' : 452,
		'type': 'iframe','margin': 0,'padding': 0,'autoScale': false,'scrolling':'no'		 
	});
	
});

$( document ).tooltip();