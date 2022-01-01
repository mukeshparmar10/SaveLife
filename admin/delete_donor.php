<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
	{
		header('Location:index.php');
		exit;
	}	
	
	include("../includes/db.php");
	
	if(isset($_GET['id']) && isset($_GET['update_code']))
	{
		$id= $_GET['id'];
		$update_code = $_GET['update_code'];
		
		$query = "delete from donor_master where ID=$id and UpdateCode='$update_code'";
		$result = $con->query($query);
		if($result > 0)
		{
			$msg = "<center>Deleted successfully.</center>";			
		}				
		else
		{
			$msg = "<center>Can't delete.</center>";
		}
		header('Location:donor.php');		
	}
	else
	{
		header('Location:donor.php');	
	}
?>