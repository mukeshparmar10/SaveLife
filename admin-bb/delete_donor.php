<?php
	if(isset($_SESSION['user_id']))
	{
		header("Location:index.php");
		exit;
	}
	else
	{
		include("../includes/db.php");
		if(isset($_GET['id']) && isset($_GET['update_code']))
		{				
			$id = $_GET['id'];
			$updae_code = $_GET['update_code'];	
			
			$query = "delete from donor_master where ID=$id and UpdateCode='$updae_code'";
			$result = $con->query($query);
			if($result>0)
			{
				echo "<center>Donor detail is deleted successfully.</center>";
			}
			else
			{
				echo "<center>Can't delete donor detail.</center>";
			}
			header("Location:donor.php");
		}
		else
		{
			header("Location:index.php");
		}
	}
?>
