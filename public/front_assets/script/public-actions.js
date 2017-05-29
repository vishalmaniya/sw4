$(document).ready(function(){


	/* fancybox */
	$("a.lightbox").fancybox({ 'margin': 0, 'padding': 0 });
	
	$("a.iframe800x600").fancybox({
		'overlayShow' : true,
		'zoomSpeedIn' : 500, 
		'zoomSpeedOut' : 500,
		'width' : 820,
		'height' : 702,
		'type': 'iframe','margin': 0,'padding': 10,'autoScale': false,'scrolling':'no'		 
	});
	
	$("a.iframe800x400").fancybox({
		'overlayShow' : true,
		'zoomSpeedIn' : 500, 
		'zoomSpeedOut' : 500,
		'width' : 800,
		'height' : 452,
		'type': 'iframe','margin': 0,'padding': 0,'autoScale': false,'scrolling':'no'		 
	});

	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});

	/* social widget */
    $('#tab-email').click(function(event) {
		event.preventDefault();

		if (!$(this).hasClass('active'))
		{
			$(this).toggleClass('active');
			$('#tab-rss').toggleClass('active');
			
			$('#subscribe-rss').fadeOut(300);
			$('#subscribe-email').fadeIn('slow');
		}
	});
		
	$('#tab-rss').click(function(event) {
		event.preventDefault();	
	
		if (!$(this).hasClass('active'))
		{		
			$(this).toggleClass('active');
			$('#tab-email').toggleClass('active');
			
			$('#subscribe-email').fadeOut(300);
			$('#subscribe-rss').fadeIn('slow');
		}
	});
	
});	

function validateForm()
{
	var x=document.forms["newsletter"]["email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	  alert("Not a valid e-mail address");
	  return false;
	}
}

// $( document ).tooltip();