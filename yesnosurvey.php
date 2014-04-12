<?php
	session_start();
	require_once 'include/security.php';
	//Create Db connection
	require_once 'include/db.php';
	
	//process create post data
	if($_POST['submit'] == 'create')
	{
		if(!empty($_POST['name']) && !empty($_POST['startdate']) && !empty($_POST['enddate']) && !empty($_POST['q1']) && !empty($_POST['q2']) && !empty($_POST['q3']) && !empty($_POST['q4']) && !empty($_POST['q5']))
		{
			//check if  already exists
			$sql = "SELECT surveyname FROM tbl_yesnosurveys WHERE surveyname = '".$_POST['name']."'";
			$result = $db->query($sql);
			
			if($result->num_rows == 0)
			{			
				//save to db
				$sql = "INSERT INTO tbl_yesnosurveys (startdate,enddate,q1,q2,q3,q4,q5,surveyname,userid) VALUES ('".$_POST['startdate']."','".$_POST['enddate']."','".$_POST['q1']."','".$_POST['q2']."','".$_POST['q3']."','".$_POST['q4']."','".$_POST['q5']."','".$_POST['name']."',".$_SESSION['userid'].")";
				$db->query($sql);
				$msg = 'Survey created';	
			}
			else
			{
				//survey exists
				$msg = 'Survey name already exists';	
			}
		}
		else
		{
			$msg = 'Empty field detected';
		}
	}
?>

<!doctype html>
<!-- File: index.php Author: Jacob Meikle Website: Assignment2 File Desc: This is the entire single page desktop site. --> 
<html class="no-js" lang="en">
	<?php require_once 'include/head.php'; ?>

   <body>
   <?php require_once 'include/nav.php'; ?>
    
    <script>
	$(function() {
		$('.datepicker').each(function(){
    		$(this).datepicker({dateFormat: "yy-mm-dd"});
		});		
	});
	</script>

    <!-- Content -->
    <div class="row">
    	<h2>Create Yes / No Survey</h2>
    	<p> All questions should be answered by yes or no via checkbox.</p>
    	<?php if($msg){echo '<p>'.$msg.'</p>';} ?>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="createyesnosurvey">
				<label for="name">Survey Name</label>
				<input type="text" name="name" />
				<br/>
				<label for="startdate">Starting Date</label>
				<input type="text" class="datepicker" name="startdate">
				<br/>
				<label for="enddate">Ending Date</label>
				<input type="text" class="datepicker" name="enddate">
				<br/>
				<label for="q1">Question1</label>
				<input type="text" name="q1" />
				<br/>
				<label for="q2">Question2</label>
				<input type="text" name="q2" />
				<br/>
				<label for="q3">Question3</label>
				<input type="text" name="q3" />
				<br/>
				<label for="q4">Question4</label>
				<input type="text" name="q4" />
				<br/>
				<label for="q5">Question5</label>
				<input type="text" name="q5" />
				<br/>
				<input type="submit" name="submit" value="create" />
		</form>
				

	</div>
	
	<?php include 'include/foot.php'; ?>
    </body>
</html>
