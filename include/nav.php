<?php 
//<!-- File: nav.php Author: Jacob Meikle Website: Project2 File Desc: This scriplet creates a common nav --> 
session_start(); 
?>
<!-- Nav -->
<nav  data-magellan-expedition="fixed">
	 <dl class="sub-nav"> 
	 	<dd data-magellan-arrival="">
	 		<a href="index.php">Home</a>
	 	</dd> 

	 	<?php
	 	if(!empty($_SESSION['userid']))
		{
			echo
			'
			<dd data-magellan-arrival="">
	 			<a href="makesurvey.php">My Surveys</a>
	 		</dd> 	
			<dd data-magellan-arrival="">
	 			<a href="editprofile.php">Edit Profile</a>
	 		</dd>
	 		<dd data-magellan-arrival="">
	 			<a href="logout.php">Log Out</a>
	 		</dd> 	 		
			';		
		}
		else
		{
			echo
			'
			<dd data-magellan-arrival="">
	 			<a href="login.php">Login</a>
	 		</dd> 
	 		';
		}	 	
	 	?>
	 </dl> 
</nav>