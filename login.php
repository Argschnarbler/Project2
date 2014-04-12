<?php
//<!-- File: login.php Author: Jacob Meikle Website: Project2 File Desc: This page allows you to log in. --> 
session_start();
 
//Handle login post
if($_POST && empty($_SESSION['userid']))
{
	//Create Db connection
	require_once 'include/db.php';
	
	//Get user id
	$sql = "SELECT userid FROM tbl_users WHERE username = '".$_POST['username']."' AND password = '".$_POST['pass']."'";

	$result = $db->query($sql);
	
	if($result->num_rows == 1)
	{
		$row = $result->fetch_row();

		$_SESSION['userid'] = $row[0];
	}
	else
	{
		$alert= ' <script type="text/javascript"> alert("Access Denied: username/password incorrect"); </script> ';	
	}
	
}

//Check if user is logged in
if($_SESSION['userid'])
{
	//redirect
	header('Location: makesurvey.php');
	exit;
}
else
{
	//display login screen
	$loginHtml =
	'
	<br/>
	<div class="row">
		<h2> Login</h2>
		<div id="loginBox" class="large-6 large-offset-1  medium-8 medium-offset-1  small-10  small-offset-1 columns">
			<form action="'.$_SERVER['PHP_SELF'].'" method="post" name="surveyForm">
			<label for="username">Username</label>
			<input type="text" name="username" />
			<br/>
			<label for="pass">Password</label>
			<input type="password" name="pass" />
			<br/>
			<input type="submit" value="Login" />
			</form>
			<a href="register.php">Register</a>
		</div>
		<br/>
	</div>

	';
	
}

?>

<!doctype html>
<html class="no-js" lang="en">
  	<?php require_once 'include/head.php'; ?>
 	<body>
 		<?php require_once 'include/nav.php'; ?>
 		<?php 	
 		echo $loginHtml; 	
 		echo $alert;
 		?>
 		<?php include 'include/foot.php'; ?>
	</body>
</html>

