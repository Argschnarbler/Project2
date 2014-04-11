<?php
if(empty($_SESSION['userid']))
{
	//redirect
	header('Location: login.php');
	exit;
}
?>