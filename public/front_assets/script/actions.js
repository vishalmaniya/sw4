$(document).ready(function(){

	// disable button if no checkboxes are checked
	$('input:checkbox').click(function() {
        var buttonsChecked = $('input:checkbox:checked');
        if (buttonsChecked.length > 0) 
        {
            $('#delete').removeAttr('disabled');
            $('#delete').removeClass('disabled');
        }
        else 
        {
            $('#delete').attr('disabled', 'disabled');
            $('#delete').addClass('disabled');
        }
    });
    
    // hide alerts
    $('.close').click(function() { $(this).parent().slideUp(); });
});