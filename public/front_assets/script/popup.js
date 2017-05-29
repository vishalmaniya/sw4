$(document).ready(function(){

$(function()
{
  var hideDelay = 500;  
  var currentID;
  var hideTimer = null;

  // One instance that's reused to show info for the current person
  var container = $('<div id="popupContainer"><div id="popupContent"></div></div>');

  $('body').append(container);
  $('#popupContainer').css('display', 'none');

  $('#home-content .home-courses a#popupLink').on('mouseover', function()
  {
  	  if ($(this).parent().hasClass('more'))
  	  {
  	  	return;
  	  }
  
      if (hideTimer)
          clearTimeout(hideTimer);

	  var pos = $(this).offset();
	  var iconwidth = $(this).width() / 2;
	  
      // get contents
      var pageID = $(this).attr('rel');
      var data = '';
      
      if (pageID == 'html')
      {
      	data = '<strong>Beginners HTML</strong><br/>If you want to build websites, you need to start with the basics. These video courses cover the key basics that will form the foundation of any web designer or programmer. A gentle and practical introduction to HTML for any beginner.<a href="courses/view/beginners_html">learn more</a>';
      }
      else if (pageID == 'html5')
      {
      	data = '<strong>HTML5, CSS3 &amp; jQuery</strong><br/>This course will teach you how to apply HTML5, CSS3 and jQuery techniques in practical ways. Learn how to take an existing HTML document and convert it to a modern looking website using HTML5, CSS3 and jQuery!<a href="courses/view/html5_css3_and_jquery">learn more</a>';
      }
      else if (pageID == 'css')
      {
      	data = '<strong>Beginners CSS</strong><br/>CSS, which stands for Cascading Style Sheets, is the sister technology to HTML that allows you to easily style the HTML elements within your web site. Having a basic understanding of CSS is fundamental for any web designer or programmer!<a href="courses/view/beginners_css">learn more</a>';
      }
      else if (pageID == 'phpcrud')
      {
      	data = '<strong>CRUD with PHP &amp; MySQLi</strong><br/>PHP CRUD allows you to create, read, update, and delete records from your database. With CRUD you can create pages to list and edit your records. Combining both CRUD and MySQLi will move you on your way to becoming a good and practical PHP programmer.<a href="courses/view/crud_with_php_and_mysqli">learn more</a>';
      }
      else if (pageID == 'js')
      {
      	data = '<strong>Beginners Javascript</strong><br/>Javascript is the scripting language found in every web browser and is a key technology that every web designer should learn. If you want to validate forms, create drop-down menus, use jQuery and a whole slew of other effects, you need to learn at least basic Javascript.<a href="courses/view/beginners_javascript">learn more</a>';
      }
      else if (pageID == 'php')
      {
      	data = '<strong>Beginners PHP</strong><br/>PHP is the most popular web programming language out there. It\'s one of the fundamental languages that every web designer should learn since so many common tasks can be accomplished with PHP: processing forms, sending emails, creating shopping carts and much more.<a href="courses/view/beginners_php">learn more</a>';
      }
      else if (pageID == 'forms')
      {
      	data = '<strong>HTML Forms</strong><br/>HTML Forms are used to pass data from the user to the server. A form is a vital part of HTML as it allows you to collect information from the user. This simple video course teaches you how to create a form using basic HTML, as well as sending it via email.<a href="courses/view/html_forms">learn more</a>';
      }
      else if (pageID == 'validation')
      {
      	data = '<strong>Form Validation with<br/> Javascript &amp; PHP</strong><br/>Learn how to use both PHP and jQuery to validate HTML forms. Use validation to ensure that the data received from forms is valid and mistake free.<a href="courses/view/form_validation_with_php_and_javascript">learn more</a>';
      }
      else if (pageID == 'phpmysql')
      {
      	data = '<strong>PHP &amp; MySQL</strong><br/>Databases are an important part of all websites as it allows you to store all types of data. PHP and MySQL are basic skills every web developer needs to know. This course teaches you the basics of SQL, how to use the very popular PHPMyAdmin to manage your databases, as well as using MySQL with PHP.<a href="courses/view/php_and_mysql">learn more</a>';
      }
      else if (pageID == 'login')
      {
      	data = '<strong>PHP Login with OOP &amp; MVC</strong><br/>This practical video course will teach you how to create a PHP login form using object-oriented techniques and the MVC design pattern. This course is designed to improve your PHP skills beyond that of a beginner!<a href="courses/view/php_login_with_oop_and_mvc">learn more</a>';
      }
      else {
      	return;
      }    
      data = data + '<img src="resources/images/pointer.png" alt="" class="pointer">';   
   	  $('#popupContent').html(data);	
   	  
   	  var width = $('#popupContainer').width() / 2;
   	  var height = $('#popupContainer').height() + 20;
   	  container.css({
   	      left: (pos.left - width + iconwidth) + 'px',
   	      top: pos.top - height + 'px'
   	  });  
	  $('#popupContainer').fadeIn();
    
  });

  $('#home-content .home-courses a#popupLink').on('mouseout', function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
      hideTimer = setTimeout(function()
      {
          $('#popupContainer').fadeOut('fast');
      }, hideDelay);
  });

  // Allow mouse over of details without hiding details
  $('#popupContainer').mouseover(function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
  });

  // Hide after mouseout
  $('#popupContainer').mouseout(function()
  {
      if (hideTimer)
          clearTimeout(hideTimer);
      hideTimer = setTimeout(function()
      {
          $('#popupContainer').fadeOut('fast');
      }, hideDelay);
  });
  
  $('#home-content .home-courses a#popupLink').click(function() {
  	if ($(this).parent().hasClass('more'))
  	{
  		return;
  	}
  	return false;
  });
});

});