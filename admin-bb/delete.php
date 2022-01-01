<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header('Location:index.php');
		exit;
	}	
	
	include("../includes/db.php");
	
	if(isset($_GET['id']))
	{
		$id= $_GET['id'];		
		$query = "delete from blood_storage_master where ID=$id";
		$result = $con->query($query);
		if($result > 0)
		{
			$msg = "<center>Storage updated successfully.</center>";
			header('Location:storage.php');
		}				
		else
		{
			$msg = "<center>Storage can't update.</center>";
		}
	}
?>