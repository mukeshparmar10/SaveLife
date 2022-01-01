<?php
	session_start();
	if(!isset($_SESSION['user_id']) || !isset($_POST['article_id']))
	{
		echo 'Invalid access';
		exit;
	}
	include("../includes/db.php");
	$user_id = $_SESSION['user_id'];
	$id = $_POST['article_id'];
	
	$query = "delete from health_article_master where ID=$id and DoctorID=" . $user_id;			
	$result = $con->query($query);
	if($result > 0)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
?>
