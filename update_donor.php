<?php
	include('includes/config.php');
	include("includes/db.php");
	if(isset($_GET['update_code']))
	{
		$update_code = $_GET['update_code'];
		$query = "select * from donor_master where UpdateCode like '$update_code'";
		$result = $con->query($query);
		if($row = $result->fetch_row())
		{
			$id = $row[0];
			$name = $row[2];
			$address = $row[3];
			$city = $row[4];
			$state = $row[5];
			$country = $row[6];
			$phone = $row[7];
			$email = $row[8];
			$age = $row[9];
			$weight = $row[10];
			$bloodgroup = $row[11];			
		}
		else
		{
			header('Location:index.php');
		}
	}
	else
	{
		header("Location:index.php");
	}	
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
    <div class="head">Update / Delete Donor Detail</div>
		<form name="f1" method="post" action="update_donor_result.php">
        <table border="0px" cellpadding="3px" align="center" width="500px">			
			<tr><td>Name:</td></tr>
			<tr><td><input class="txt" type="text" name="name" maxlength="50" value="<?php if(isset($name)){echo $name;}?>" required /><input type="hidden" name="id" maxlength="6" value="<?php if(isset($id)){echo $id;}?>" required /></td></tr>
            
			<tr><td>Address:</td></tr>
            <tr><td><input class="txt" type="text" name="address" maxlength="200" value="<?php if(isset($address)){echo $address;}?>" required /></td></tr>
            
			<tr><td>City:</td></tr>
			<tr><td><input class="txt" type="text" name="city" maxlength="25" value="<?php if(isset($city)){echo $city;}?>" required /></td></tr>
            
            <tr><td>State:</td></tr>
            <tr><td><input class="txt" type="text" name="state" maxlength="25" value="<?php if(isset($state)){echo $state;}?>" required /></td></tr>
            
            <tr><td>Country:</td></tr>
            <tr><td><input class="txt" type="text" name="country" maxlength="25" value="<?php if(isset($country)){echo $country;}?>" required /></td></tr>
            
            <tr><td>Phone:</td></tr>
            <tr><td><input class="txt" type="text" name="phone" maxlength="35" value="<?php if(isset($phone)){echo $phone;}?>" required /></td></tr>
            
            <tr><td>Email:</td></tr>
			<tr><td><input class="txt" type="email" name="email" maxlength="50" value="<?php if(isset($email)){echo $email;}?>" required /></td></tr>
            
            <tr><td>Age [Yrs]:</td></tr>
            <tr><td><input class="txt" type="number" name="age" maxlength="3" value="<?php if(isset($age)){echo $age;}?>" required /></td></tr>
            
			<tr><td>Weight [KG]:</td></tr>
			<tr><td><input class="txt" type="number" name="weight" maxlength="3" value="<?php if(isset($weight)){echo $weight;}?>" required /></td></tr>
            
            <tr><td>Blood Group:</td></tr>
			<tr><td><input class="txt" type="text" name="blood_group" maxlength="10" value="<?php if(isset($bloodgroup)){echo $bloodgroup;}?>" required /></td></tr>
            
            <tr><td align="center"><input class="btn" type="submit" value="Update"  />&nbsp;<input class="btn" type="button" value="Delete" onClick="window.location.href='delete_donor.php?id=<?php if(isset($id)){echo $id;}?>&update_code=<?php if(isset($update_code)){echo $update_code;}?>'" /></td></tr>
        </table>
        </form>	
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>