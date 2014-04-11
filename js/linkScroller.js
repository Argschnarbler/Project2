//<!-- File: linkScroller.js Author: Jacob Meikle Website: Assignment2 File Desc: Makes the navigate smoothly scroll between sections. -->
$('a').click(function(){
		    $('html, body').animate({
		        scrollTop: $( $.attr(this, 'href') ).offset().top
		    }, 500);
		    return false;
});