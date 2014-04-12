<?php
//rertrieve survey data
require_once 'include/db.php';
 

$sql = "SELECT * FROM tbl_yesnosurveys WHERE CURDATE() > startdate AND CURDATE() < enddate";
$result = $db->query($sql);

if($result->num_rows > 0)
{
	$surveyHTML = "<table> <thead> <th> My Surveys </th> <th> Take Survey </th> </thead>";
	
	//iterate through and generate html
	while ($row = $result->fetch_assoc()) {
        $surveyHTML .= '<tr><td>'.$row['surveyname'].'</td> <td> <a href="takesurvey.php?survid='.$row['surveyid'].'"> Go </a> </td> </tr>';
    }
	
	$surveyHTML .= "</table>";
}
else
{
	$surveyHTML = "no surveys.";
}

//display success message
if($_GET)
{
	$msg = "Survey saved";
}
?>
<!doctype html>
<!-- File: index.php Author: Jacob Meikle Website: Assignment2 File Desc: This is the entire single page desktop site. --> 
<html class="no-js" lang="en">
	<?php require_once 'include/head.php'; ?>

   <body>
   <?php require_once 'include/nav.php'; ?>
    

    <!-- Content -->
    <div class="row">
    	<h2>Take Surveys</h2>
    	<?php if($msg){echo '<p>'.$msg.'</p>';} ?>
		<?php  echo $surveyHTML; ?>	
				

	</div>
	
	<?php include 'include/foot.php'; ?>
    </body>
</html>
