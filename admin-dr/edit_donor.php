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
	
		$query = "update donor_master set Name='$name',Address='$address',City='$city',State='$state',Country='$country',Phone='$phone',Email='$email',Age=$age,Weight=$weight,BloodGroup='$bloodgroup' where ID=$id";
		$result = $con->query($query);
		if($result>0)
		{
			$msg = "<center>Donor detail is updated successfully.</center>";
		}
		else
		{
			$msg = "<center>Can't update donor detail.</center>";
		}	
	}	
	
	if(isset($_GET['id']) && isset($_GET['update_code']))
	{
		$id = $_GET['id'];
		$update_code = $_GET['update_code'];
		$query = "select * from donor_master where ID=$id && UpdateCode like '$update_code'";
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
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>
    <div class="main">
	<div class="head">Update Donor</div>
    	<?php
			if(isset($msg))
			{
				echo $msg;
			}
		?>
		<form name="f1" method="post">
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
            
            <tr><td align="center"><input class="btn" type="submit" value="Update"  /></td></tr>
        </table>
        </form>	
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>