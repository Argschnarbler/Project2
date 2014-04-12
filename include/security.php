<?php
//<!-- File: security.php Author: Jacob Meikle Website: Project2 File Desc: This scriplet secures pages --> 
if(empty($_SESSION['userid']))
{
	//redirect
	header('Location: login.php');
	exit;
}
?>