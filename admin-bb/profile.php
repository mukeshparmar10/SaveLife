<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header('Location:index.php');
		exit;
	}
	
	include('../includes/config.php');
	include("../includes/db.php");
	$user_id = $_SESSION['user_id'];	
	
	if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['phone']) && isset($_POST['website']))
	{
		$name = $_POST['name'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$phone = $_POST['phone'];
		$website = $_POST['website'];		
				
		$query = "update blood_bank_master set Name='$name',Address='$address',City='$city',State='$state',Country='$country',Phone='$phone',Website='$website' where ID=$user_id";
		$result = $con->query($query);
		if($result > 0)
		{
			$msg = "<center>Profile updated successfully.</center>";
		}				
		else
		{
			$msg = "<center>Profile can't update.</center>";
		}
	}	
	
	$query = "select * from blood_bank_master where ID=$user_id";
	$result = $con->query($query);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_row())
		{
			$user_id = $row[0];			
			$name = $row[3];
			$address = $row[4];
			$city = $row[5];
			$state = $row[6];
			$country = $row[7];
			$phone = $row[8];
			$website = $row[9];			
		}
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title;?></title>
<?php
		include('includes/css_js.php');
?>
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>
    <div class="main">
	<div class="head">View / Update Profile</div>
		<?php
			if(isset($msg))
			{
				echo $msg;	
			}
		?>
		<form name="f1" method="post">
        <table border="0px" cellpadding="3px" align="center" width="500px">
        	<tr><td>Name:</td></tr>
			<tr><td><input class="txt" type="text" name="name" maxlength="50" value="<?php if(isset($name)){echo $name;}?>" required /></td></tr>
            
			<tr><td>Address:</td></tr>
            <tr><td><input class="txt" type="text" name="address" maxlength="200" value="<?php if(isset($address)){echo $address;}?>" required /></td></tr>
            
            <tr><td>City:</td></tr>
            <tr><td><input class="txt" type="text" name="city" maxlength="25" value="<?php if(isset($city)){echo $city;}?>" required /></td></tr>
            
            <tr><td>State:</td></tr>
            <tr><td><input class="txt" type="text" name="state" maxlength="25" value="<?php if(isset($state)){echo $state;}?>" required /></td></tr>
            
            <tr><td>Country:</td></tr>
            <tr><td><input class="txt" type="text" name="country" maxlength="25" value="<?php if(isset($country)){echo $country;}?>" required /></td></tr>
            
            <tr><td>Phone:</td></tr>
            <tr><td><input class="txt" type="text" name="phone" maxlength="35" value="<?php if(isset($name)){echo $phone;}?>" required /></td></tr> 
            
            <tr><td>Webiste:</td></tr>
            <tr><td><input class="txt" type="url" name="website" maxlength="50" value="<?php if(isset($website)){echo $website;}?>" required /></td></tr> 
            
            <tr><td align="center"><input class="btn" type="submit" value="Update Profile"  /></td></tr>
            
            
        </table>
        </form>		
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>