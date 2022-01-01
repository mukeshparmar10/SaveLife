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
    <div class="head">Update Donor Detail</div>
	<?php
		//check the data of donor are posted or not
		if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['weight']) && isset($_POST['blood_group']))
		{		
			$id = $_POST['id'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$country = $_POST['country'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$age = $_POST['age'];
			$weight = $_POST['weight'];
			$bloodgroup = $_POST['blood_group'];
			$updae_code = date('d') . date('m') . date('Y') . '-' . rand(10000,1000000);
			$update_link = 'http://localhost/' . $title . "/update_donor.php?update_code=" . $updae_code;
	
			//update data of donor from donor_master table
			$query = "update donor_master set Name='$name',Address='$address',City='$city',State='$state',Country='$country',Phone='$phone',Email='$email',Age=$age,Weight=$weight,BloodGroup='$bloodgroup' where ID=$id";
			$result = $con->query($query);
			if($result>0)
			{
				//success
				echo "<center>Your detail is updated successfully.</center>";
			}
			else
			{
				//cancel
				echo "<center>Can't update your detail.</center>";
			}				
		}
		else
		{
			//redirect to home if data are not posted proper
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