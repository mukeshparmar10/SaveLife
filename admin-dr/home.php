<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header('Location:index.php');
		exit;
	}
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
    <?php
		include('includes/header.php');
	?>    
    <div class="main">
    <div class="head">Change Password</div>
		<form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Old Password:</td></tr>
            <tr><td><input class="txt" type="password" name="old_password" required /></td></tr>
            <tr><td>New Password:</td></tr>
            <tr><td><input class="txt" type="password" name="new_password" required /></td></tr>
            <tr><td>Confirm New Password:</td></tr>
            <tr><td><input class="txt" type="password" name="confirm_new_password" onBlur="checkConfirmPassword()" required /></td></tr>
            <tr><td align="center"><input class="btn" type="submit" value="Change Password"  /></td></tr>
            
            
        </table>
        </form>
		<?php
			if(isset($_POST['old_password']) && isset($_POST['new_password']))
			{
				$user_id = $_SESSION['user_id'];
				$old_password = $_POST['old_password'];
				$new_password = $_POST['new_password'];
				
				include("../includes/db.php");
				$query = "select * from doctor_master where binary Password='$old_password'";
				$result = $con->query($query);
				if($result->num_rows>0)
				{
					$query = "update doctor_master set Password='$new_password' where ID=$user_id";
					$result = $con->query($query);
					if($result > 0)
					{
						echo "<center>Password change successfully.</center>";
					}
				}
				else
				{
					echo "<center>Invalid Old Password.</center>";
				}
			}
		?>
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>