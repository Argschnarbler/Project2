<?php
	//<!-- File: logout.php Author: Jacob Meikle Website: Project2 File Desc: This page allows you to log out. --> 
	session_start();

	$_SESSION['userid'] = "";
	
	
	header('Location: index.php');

?>