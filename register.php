<?php
//Process post data
if($_POST){
	require_once 'include/db.php';
	if(!empty($_POST['username']) && !empty($_POST['pass']))
	{
		//check if user already exists
		$sql = "SELECT username FROM tbl_users WHERE username = '".$_POST['username']."'";
		$result = $db->query($sql);
		
		if($result->num_rows == 0)
		{			
			//save new person to db
			$sql = "INSERT INTO tbl_users (username,email,password) VALUES ('".$_POST['username']."','".$_POST['email']."','".$_POST['pass']."')";
			$db->query($sql);
			echo 'User created';	
		}
		else
		{
			//user exists
			echo 'User already exists';	
		}
	}
	else
	{
		//invalid submition
		echo 'missing, or invalid information';
	}
}
	
?>
<!doctype html>
<html class="no-js" lang="en">
  	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Register</title>
	    <link rel="stylesheet" href="css/foundation.css" />
	    <link rel="stylesheet" href="css/custom.css" />
	    <script src="js/jquery.js"></script>    
	    <!-- custom fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
  	</head>
 	<body> 		
		<div class="row">
			<h2> Register New User</h2>
			<div id="loginBox" class="large-6 large-offset-1  medium-8 medium-offset-1  small-10  small-offset-1 columns">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerForm">
				<label for="username">Username</label>
				<input type="text" name="username" />
				<br/>
				<label for="pass">Password</label>
				<input type="password" name="pass" />
				<br/>
				<label for="email">Email</label>
				<input type="email" name="email" />
				<br/>
				<input type="submit" value="Register" />
				</form>
			</div>
		</div>
	</body>
</html>