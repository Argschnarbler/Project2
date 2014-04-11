<!-- File: mycontacts.php Author: Jacob Meikle Website: Assignment3 File Desc: This page shows contacts --> 
<?php
	session_start();
	require_once 'include/security.php';

	if(empty($_SESSION['userid']))
	{
		header('Location: login.php');
		exit;
	}
	else
	{
		//rertrieve survey data
		require_once 'include/db.php';
	 

		$sql = "SELECT * FROM tbl_yesnosurveys WHERE userid = ".$_SESSION['userid'];
		$result = $db->query($sql);
		
		if($result->num_rows > 0)
		{
			$surveyHTML = "<table> <thead> <th> Contacts </th> </thead>";
			
			//iterate through and generate html
			while ($row = $result->fetch_assoc()) {
		        $surveyHTML .= '<tr><td onclick=" alert(\' Name: '.$row['Name'].' Phone: '.$row['Phone'].' Address: '.$row['Address'].' \'); ">'.$row['Name'].'</td> </tr>';
		    }
			
			$surveyHTML .= "</table>";
		}
		else
		{
			$surveyHTML = "no surveys.";
		}
		
	}

?>

<!doctype html>
<html class="no-js" lang="en">
  	<?php require_once 'include/head.php'; ?>
 	<body>
 		<?php require_once 'include/nav.php'; ?>		
 		<!-- list of my surveys -->
 		<div class="row">		
			<div id="loginBox" class="large-6 large-offset-1  medium-8 medium-offset-1  small-10  small-offset-1 columns">
 				<h2> My Surveys</h2> 	
				<?php  echo $surveyHTML; ?>	
			</div>		
		</div>
		
		<!-- create survey buttons -->
		 <div class="row">	
		 	<div id="loginBox" class="large-6 large-offset-1  medium-8 medium-offset-1  small-10  small-offset-1 columns">	
		 		<h2> Create New Surveys</h2> 
				<a href="yesnosurvey.php" class="button"> Yes & No Survey Template</a>
			</div>		
		</div>
		
		<?php include 'include/foot.php'; ?>
	</body>
</html>

