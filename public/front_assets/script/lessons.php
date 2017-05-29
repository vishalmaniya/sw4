<script type="text/javascript">
	$(document).ready(function(){
		
		$('#check_events, .button_green_next').on('click', function() {		
			
			// load response
			var content = $.ajax({
			      url: "<?php echo SITE_PATH; ?>/users/courses/<?php echo $course_name; ?>/chapter<?php echo $chapter_pos; ?>/lesson<?php echo $lesson_pos; ?>/q<?php echo $question_pos; ?>/check_events/",
			      global: false,
			      type: "POST",
			      dataType: "html",
			      async:false,
			      success: function(msg){}
			   }
			).responseText;
			
			// check if something to display
			if (content != '')
			{
				
				$.fancybox({
					'content'	: content,
					'padding'	: 0,
					'autoScale'	: false,
					'modal'		: true,
					'centerOnScroll' : true,
					'overlayOpacity' : .65,
					'autoDimensions' : true
				});
				return false;
			}
		});
		
	});
</script>