<?php
session_start();
	require_once 'include/security.php';

	//rertrieve survey data
	require_once 'include/db.php';
 
	if(!empty($_GET['survid']))
	{
		//get questions
		$sql = "SELECT * FROM tbl_yesnosurveys WHERE surveyid = ".$_GET['survid'];
		$result = $db->query($sql);
		
		if($result->num_rows == 1)
		{
			while ($row = $result->fetch_assoc()) {
				$name = $row['surveyname'];
		        $q1 = $row['q1'];
				$q2 = $row['q2'];
				$q3 = $row['q3'];
				$q4 = $row['q4'];
				$q5 = $row['q5'];
		    }
		}
		
		//get stats
		$survid = $_GET['survid'];
		$sql = "SELECT count(surveyid) as responses, sum(a1) as a1,sum(a2) as a2,sum(a3) as a3,sum(a4) as a4,sum(a5) as a5 FROM tbl_yesnoanswers WHERE surveyid = ".$_GET['survid'];
		$result = $db->query($sql);
		
		if($result->num_rows == 1)
		{
			$surveyHTML .= "<table> <thead> <th> Question </th> <th> Count </th> </thead>";
			
			//iterate through and generate html
			while ($row = $result->fetch_assoc()) {
				$total = $row['responses'];
		        $surveyHTML .= '<tr> <td>'.$q1.'</td> <td>'.$row['a1'].'</td> </tr>';
				$surveyHTML .= '<tr> <td>'.$q2.'</td> <td>'.$row['a2'].'</td> </tr>';
				$surveyHTML .= '<tr> <td>'.$q3.'</td> <td>'.$row['a3'].'</td> </tr>';
				$surveyHTML .= '<tr> <td>'.$q4.'</td> <td>'.$row['a4'].'</td> </tr>';
				$surveyHTML .= '<tr> <td>'.$q5.'</td> <td>'.$row['a5'].'</td> </tr>';
		    }
			
			$surveyHTML .= "</table>";
		}
		else
		{
			$surveyHTML = "survey not found";
		}
	}
	else
	{
		$msg = "no survey selected";	
	}

?>

<!doctype html>
<!-- File: index.php Author: Jacob Meikle Website: Assignment2 File Desc: This is the entire single page desktop site. --> 
<html class="no-js" lang="en">
   <?php if(!$_GET['print']){require_once 'include/head.php';} ?>

   <body>
   <?php if(!$_GET['print']){require_once 'include/nav.php';} ?>
    

    <!-- Content -->
    <div class="row">
    	<h2><?php echo $name; ?> Stats</h2>
    	<?php if($msg){echo '<p>'.$msg.'</p>';} ?>
    	<?php echo $surveyHTML; ?>
    	<?php echo '<p> Number of responses: '.$total.'</p>';?>
    	<?php if(!$_GET['print']){ echo '<p><a target="_blank" href="'.$_SERVER['PHP_SELF'].'?survid='.$_GET['survid'].'&print=true"> Print this Report</a></p>';} ?>
	</div>
	
	<?php include 'include/foot.php'; ?>
    </body>
</html>
