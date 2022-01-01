<?php
	include('../includes/config.php');
	session_start();
	if(isset($_SESSION['user_id']))
	{
		header('Location:home.php');
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
    	<div class="head">Doctor Login</div>
		<form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Email:</td></tr>
            <tr><td><input class="txt" type="text" name="email" required /></td></tr>
            <tr><td>Password:</td></tr>
            <tr><td><input class="txt" type="password" name="password" required /></td></tr>
            <tr><td align="center"><input class="btn" type="submit" value="Login"  /></td></tr>
        </table>
        </form>
		<?php
			if(isset($_POST['email']) && isset($_POST['password']))
			{
				$email = $_POST['email'];
				$password = $_POST['password'];		
				include("../includes/db.php");
				$query = "select * from doctor_master where binary Email='$email' and binary Password='$password'";
				$result = $con->query($query);
				if($result->num_rows>0)
				{
					while($row = $result->fetch_row())
					{
						$user_id = $row[0];
						$email = $row[1];
						$name = $row[3];
					}					
					$_SESSION['user_id']=$user_id;
					$_SESSION['email']=$email;
					$_SESSION['name']=$name;
					header('Location:home.php');
				}
				else
				{
					echo "<center>Invalid Email / Password.</center>";	
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