<!-- File: logout.php Author: Jacob Meikle Website: Assignment3 File Desc: This logs out the user--> 
<?php
	session_start();

	$_SESSION['userid'] = "";
	
	
	header('Location: index.php');

?>