<!doctype html>
<!-- File: index.php Author: Jacob Meikle Website: Assignment2 File Desc: This is the entire single page desktop site. --> 
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Survey Central</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <script src="js/jquery.js"></script>
    
    <!-- custom fonts -->
    <link href='http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>

  </head>
  <body>

  	
    <!-- Nav -->
    
    <nav  data-magellan-expedition="fixed">
    	 <dl class="sub-nav"> 
    	 	<dd data-magellan-arrival="about">
    	 		<a href="makesurvey.php">Create Survey</a>
    	 	</dd> 
    	 </dl> 
    </nav>
    
  
    <!-- Welcome -->
    
    <div class="row" id="welcome">
	    <h3 class="large-12 columns text-center " > Current Surveys</h3>
    </div>

    	
    <!-- Content -->
    <div class="row">
    	
	      	<!-- About Section -->
	      	<a id="about" class="navAnchor" data-magellan-destination="about"></a> 	
	      	
	      	<section class="large-12 columns">
				
				<div class="row">
								
					
					<article class="large-8 medium-8 small-8 small-offset-1 medium-offset-1 large-offset-1 columns">
						<p>
						 Jacob Meikle is a talented computer programmer, web developer and game designer from Barrie, Ontario.
						 He enjoys anything logical and scarcely gets excercise. He's much too busy coding, coding, and coding...
						 There's nothing he'd rather do than make cool digital stuff!	
						</p>

					</article>				
		
				</div>			
				
	      	</section>

	</div>
	
	<!-- Javascript Libraries -->
    
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.magellan.js"></script>
    <script src="js/linkScroller.js"></script>
    
     <!-- Javascript Custom -->
    <script>
		$(document).foundation();
    </script>
  </body>
</html>
