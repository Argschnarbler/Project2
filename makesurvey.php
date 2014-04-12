<?php
	//<!-- File: makesurvey.php Author: Jacob Meikle Website: Project2 File Desc: This page shows the users surveys, and the templates available for creation. --> 
	session_start();
	require_once 'include/security.php';


	//rertrieve survey data
	require_once 'include/db.php';
 

	$sql = "SELECT * FROM tbl_yesnosurveys WHERE userid = ".$_SESSION['userid'];
	$result = $db->query($sql);
	
	if($result->num_rows > 0)
	{
		$surveyHTML = "<table> <thead> <th> My Surveys </th> <th> Report </th> </thead>";
		
		//iterate through and generate html
		while ($row = $result->fetch_assoc()) {
	        $surveyHTML .= '<tr><td>'.$row['surveyname'].'</td> <td> <a href="surveyreporting.php?survid='.$row['surveyid'].'"> Report </a> </td> </tr>';
	    }
		
		$surveyHTML .= "</table>";
	}
	else
	{
		$surveyHTML = "no surveys.";
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

