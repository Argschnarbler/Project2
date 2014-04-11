<!-- File: logout.php Author: Jacob Meikle Website: Assignment3 File Desc: This logs out the user--> 
<?php
	session_start();

	$_SESSION['UserID'] = "";
	
	
	header('Location: index.php');

?>