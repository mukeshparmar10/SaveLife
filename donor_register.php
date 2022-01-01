<?php
	include('includes/config.php');
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
    	<div class="head">Donar Registration</div>
        <?php
			// check the all details of donor are posted proper or not
			if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['weight']) && isset($_POST['blood_group']))
			{
				$name = $_POST['name'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$country = $_POST['country'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$age = $_POST['age'];
				$weight = $_POST['weight'];
				$blood_group = $_POST['blood_group'];
				$updae_code = rand(1000,5000) . '-' .  date('d') . date('m') . date('Y') . '-' . rand(10000,1000000);
				$update_link = 'http://localhost/' . $title . "/update_donor.php?update_code=" . $updae_code;
				
				include("includes/db.php");
				
				//inser the data of donor in donor_master table
				$query = "insert into donor_master(Name,Address,City,State,Country,Phone,Email,Age,Weight,BloodGroup,UpdateCode) values('$name','$address','$city','$state','$country','$phone','$email',$age,$weight,'$blood_group','$updae_code')";
				$result = $con->query($query);
				if($result>0)
				{
					//success
					echo "<center>Registration is success. Save following link to update/delete your registered detail in future.<br><br><b>" . $update_link . "</b></center>";
				}
				else
				{
					//cancel
					echo "<center>Registration cancel.</center>";
				}				
			}
		?>
		<form name="f1" method="post">
        <table border="0px" cellpadding="3px" align="center" width="500px">			
			<tr><td>Name:</td></tr>
			<tr><td><input class="txt" type="text" name="name" maxlength="50" required /></td></tr>
            
			<tr><td>Address:</td></tr>
            <tr><td><input class="txt" type="text" name="address" maxlength="200" required /></td></tr>
            
            <tr><td>City:</td></tr>
            <tr><td><input class="txt" type="text" name="city" maxlength="25" required /></td></tr>
            
            <tr><td>State:</td></tr>
            <tr><td><input class="txt" type="text" name="state" maxlength="25" required /></td></tr>
            
            <tr><td>Country:</td></tr>
            <tr><td><input class="txt" type="text" name="country" maxlength="25" required /></td></tr>
            
            <tr><td>Phone:</td></tr>
            <tr><td><input class="txt" type="text" name="phone" maxlength="35" required /></td></tr> 
            
            <tr><td>Email:</td></tr>
			<tr><td><input class="txt" type="email" name="email" maxlength="50" required /></td></tr>
            
            <tr><td>Age [Yrs]:</td></tr>
            <tr><td><input class="txt" type="number" name="age" maxlength="3" required /></td></tr>
            
			<tr><td>Weight [KG]:</td></tr>
			<tr><td><input class="txt" type="number" name="weight" maxlength="3" required /></td></tr>
            
            <tr><td>Blood Group:</td></tr>
			<tr><td><input class="txt" type="text" name="blood_group" maxlength="10" required /></td></tr>
            
            <tr><td align="center"><input class="btn" type="submit" value="Submit"  /></td></tr>
        </table>
        </form>        
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>