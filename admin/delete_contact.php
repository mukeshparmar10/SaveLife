<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
	{
		header('Location:index.php');
		exit;
	}	
	
	include("../includes/db.php");
	
	if(isset($_GET['id']))
	{
		$id= $_GET['id'];		
		$query = "delete from contact_master where ID=$id";
		$result = $con->query($query);
		if($result > 0)
		{
			$msg = "<center>Deleted successfully.</center>";
			header('Location:contact.php');
		}				
		else
		{
			$msg = "<center>Can't delete.</center>";
		}
	}
?>