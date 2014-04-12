<?php
//<!-- File: takesurvey.php Author: Jacob Meikle Website: Project2 File Desc: This page allows anyone to fill out a survey and saves the data. --> 
session_start();
	require_once 'include/security.php';

	//rertrieve survey data
	require_once 'include/db.php';
 
	if(!empty($_GET['survid']))
	{
		$survid = $_GET['survid'];
		$sql = "SELECT * FROM tbl_yesnosurveys WHERE surveyid = ".$_GET['survid'];
		$result = $db->query($sql);
		
		if($result->num_rows == 1)
		{
			$surveyHTML .= "<table> <thead> <th> Questions </th> <th> Answers </th> </thead>";
			
			//iterate through and generate html
			while ($row = $result->fetch_assoc()) {
				$name = $row['surveyname'];
		        $surveyHTML .= '<tr><td>'.$row['q1'].'</td> <td> <input type="checkbox" name="a1" /> </td> </tr>';
				$surveyHTML .= '<tr><td>'.$row['q2'].'</td> <td> <input type="checkbox" name="a2" /> </td> </tr>';
				$surveyHTML .= '<tr><td>'.$row['q3'].'</td> <td> <input type="checkbox" name="a3" /> </td> </tr>';
				$surveyHTML .= '<tr><td>'.$row['q4'].'</td> <td> <input type="checkbox" name="a4" /> </td> </tr>';
				$surveyHTML .= '<tr><td>'.$row['q5'].'</td> <td> <input type="checkbox" name="a5" /> </td> </tr>';
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
	
	//handle post
	
	if($_POST['submit'] == 'save' && !empty($_POST['survid']))
	{
		//convert data to int
		if($_POST['a1']){ $a1 = 1;}else{ $a1 = 0;}
		if($_POST['a2']){ $a2 = 1;}else{ $a2 = 0;}
		if($_POST['a3']){ $a3 = 1;}else{ $a3 = 0;}
		if($_POST['a4']){ $a4 = 1;}else{ $a4 = 0;}
		if($_POST['a5']){ $a5 = 1;}else{ $a5 = 0;}
	
		//save to db
		$sql = "INSERT INTO tbl_yesnoanswers (surveyid,a1,a2,a3,a4,a5) VALUES (".$_POST['survid'].",".$a1.",".$a2.",".$a3.",".$a4.",".$a5.")";
		$db->query($sql);
		$msg = 'Survey saved';	
		
		
		//redirect
		header('Location: index.php?success=1');
		exit;

	}

	
?>

<!doctype html>
<html class="no-js" lang="en">
	<?php require_once 'include/head.php'; ?>

   <body>
   <?php require_once 'include/nav.php'; ?>
    

    <!-- Content -->
    <div class="row">
    	<h2><?php echo $name; ?></h2>
    	<?php if($msg){echo '<p>'.$msg.'</p>';} ?>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="takeyesnosurvey">
				<?php echo $surveyHTML; ?>
				<input type="hidden" name="survid" value="<?php echo $survid; ?>"/>
				<input type="submit" name="submit" value="save" />
		</form>
				

	</div>
	
	<?php include 'include/foot.php'; ?>
    </body>
</html>
