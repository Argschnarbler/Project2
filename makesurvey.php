<!-- File: mycontacts.php Author: Jacob Meikle Website: Assignment3 File Desc: This page shows contacts --> 
<?php
	session_start();
	$_SESSION['visit'] = "";
	if(!$_SESSION['UserID'])
	{
		header('Location: login.php');
		exit;
	}
	else
	{
		//rertrieve data
		require_once 'include/db.php';
	 
		//Get user id
		$sql = "SELECT * FROM Contacts ORDER BY name";
	
		$result = $db->query($sql);
		
		if($result->num_rows > 0)
		{
			$contactHTML = "<table> <thead> <th> Contacts </th> </thead>";
			
			//iterate through and generate html
			while ($row = $result->fetch_assoc()) {
		        $contactHTML .= '<tr><td onclick=" alert(\' Name: '.$row['Name'].' Phone: '.$row['Phone'].' Address: '.$row['Address'].' \'); ">'.$row['Name'].'</td> </tr>';
		    }
			
			$contactHTML .= "</table>";
		}
		else
		{
			$contactHTML = "nothing found.";
		}
		
	}

?>

<!doctype html>
<html class="no-js" lang="en">
  	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Create Survey</title>
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
	    	 	<dd data-magellan-arrival="Back">
	    	 		<a href="index.php">Home</a>
	    	 	</dd> 
	    	 </dl> 
	    </nav>
  	
 		<!-- content -->
 		<div class="row">		
			<div id="loginBox" class="large-6 large-offset-1  medium-8 medium-offset-1  small-10  small-offset-1 columns">
				<a href="logout.php"> Logout </a>
				<br/>
 				<h2> My Contacts</h2> 	
				<?php  echo $contactHTML; ?>
				
			</div>
			
		</div>

	</body>
</html>

