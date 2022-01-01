<?php
	include('../includes/config.php');
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
	<div class="header">
    <div class="header_inner">
		<?php echo $title;?>
    	<span class="menu">
    		<a href="index.php">Login</a> |
        	<a href="register.php">Register</a>        	
		</span>
    	</div>       
	</div>
    <div class="main">
    	<div class="head">Blood Bank Registration</div>
        <?php
			if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['phone']) && isset($_POST['website']))
			{
				$email = $_POST['email'];
				$password = $_POST['password'];
				$name = $_POST['name'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$country = $_POST['country'];
				$phone = $_POST['phone'];
				$website = $_POST['website'];
				
				include("../includes/db.php");
				$query = "select * from blood_bank_master where Email='$email'";
				$result = $con->query($query);
				if($result->num_rows>0)
				{
					echo "<center>Email is already registered. Please use another email.</center>";
				}
				else
				{
					$query = "insert into blood_bank_master(Email,Password,Name,Address,City,State,Country,Phone,Website) values('$email','$password','$name','$address','$city','$state','$country','$phone','$website')";
					$result = $con->query($query);
					if($result>0)
					{
						echo "<center>Registration is success. <a href='index.php'>Click to Login</a></center>";
					}
					else
					{
						echo "<center>Registration cancel.</center>";
					}
				}
			}
		?>
		<form name="f1" method="post">
        <table border="0px" cellpadding="3px" align="center" width="500px">
			<tr><td>Email:</td></tr>
			<tr><td><input class="txt" type="email" name="email" maxlength="50" required /></td></tr>
            
			<tr><td>Password:</td></tr>
			<tr><td><input class="txt" type="password" name="password" maxlength="30" required /></td></tr>
            
			<tr><td>Confirm Password:</td></tr>
			<tr><td><input class="txt" type="password" name="confirm_password" maxlength="30" onBlur="checkConfirmPassword()" required /></td></tr>
            
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
            
            <tr><td>Webiste:</td></tr>
            <tr><td><input class="txt" type="url" name="website" maxlength="50" required /></td></tr> 
            
            <tr><td align="center"><input class="btn" type="submit" value="Register"  /></td></tr>
        </table>
        </form>        
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>