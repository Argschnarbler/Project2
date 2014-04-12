<?php
//<!-- File: editprofile.php Author: Jacob Meikle Website: Project2 File Desc: This page allows you to edit your user profile. --> 
session_start();
require_once 'include/security.php';
require_once 'include/db.php';

//Process post data
if($_POST){
	if(!empty($_POST['username']) && !empty($_POST['pass']))
	{
		//update user 
		$sql = "UPDATE tbl_users SET email = '".$_POST['email']."', password='".$_POST['pass']."' WHERE userid = ".$_SESSION['userid'];
		$db->query($sql);
		$msg = 'User updated';	
	}
	else
	{
		//invalid submition
		$msg = 'missing, or invalid information';
	}
}
	
//Retrieve user info
$sql = "SELECT * FROM tbl_users WHERE userid = ".$_SESSION['userid'];
$result = $db->query($sql);

if($result->num_rows == 1)
{			
	while ($row = $result->fetch_assoc()) 
	{
				$user = $row['username'];
				$email = $row['email'];
				$pass = $row['password'];
	}
}	
else
{
	$msg ="profile not found";	
}

	
?>
<!doctype html>
<html class="no-js" lang="en">
  	<?php require_once 'include/head.php'; ?>
 	<body> 				
	<?php require_once 'include/nav.php'; ?>
 		
		<div class="row">
			<h2> Edit User Profile</h2>
			<div id="loginBox" class="large-6 large-offset-1  medium-8 medium-offset-1  small-10  small-offset-1 columns">
				<?php echo '<p>'.$msg.'</p>'; ?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerForm">
				<label for="username">Username</label>
				<p> <?php echo $user; ?> </p>
				<input type="hidden" name="username" value="<?php echo $user; ?>" readonly/>
				<br/>
				<label for="pass">Password</label>
				<input type="password" name="pass" value="<?php echo $pass; ?>"/>
				<br/>
				<label for="email">Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>"/>
				<br/>
				<input type="submit" value="Update" />
				</form>
			</div>
		</div>
		<?php include 'include/foot.php'; ?>
	</body>
</html>
