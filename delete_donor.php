<?php
	include('includes/config.php');
	include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title;?></title>
<?php
		include('includes/css_js.php');
?>
<script>
$(document).ready(function() {
    $('#donor_result').DataTable();
} );
</script>
</head>
<body>
<div class="container">
	<?php
		include('includes/header.php');
	?>
    <div class="main">
    <div class="head">Delete Donor Detail</div>
	<?php
		//check the id and update code of donor are submitted or not
		if(isset($_GET['id']) && isset($_GET['update_code']))
		{				
			$id = $_GET['id'];
			$updae_code = $_GET['update_code'];				
			
			// deleted data from donor_master table with specific id and update code
			$query = "delete from donor_master where ID=$id and UpdateCode='$updae_code'";
			$result = $con->query($query);
			if($result>0)
			{
				//success
				echo "<center>Your detail is deleted successfully.</center>";
			}
			else
			{
				//cancel
				echo "<center>Can't delete your detail.</center>";
			}			
		}
		else
		{
			//redirect to home if id and updated code are not passed in request
			header("Location:index.php");	
		}	
	?>
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>