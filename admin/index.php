<?php
	include('../includes/config.php');
	session_start();
	if(isset($_SESSION['admin_id']))
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
		<center><?php echo $title;?></center>
    	</div>       
	</div>
    <div class="main">
    	<div class="head">Admin Login</div>
		<form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Username:</td></tr>
            <tr><td><input class="txt" type="text" name="username" required /></td></tr>
            <tr><td>Password:</td></tr>
            <tr><td><input class="txt" type="password" name="password" required /></td></tr>
            <tr><td align="center"><input class="btn" type="submit" value="Login"  /></td></tr>
        </table>
        </form>
		<?php
			if(isset($_POST['username']) && isset($_POST['password']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];		
				include("../includes/db.php");
				$query = "select * from admin_master where binary Username='$username' and binary Password='$password'";
				$result = $con->query($query);
				if($result->num_rows>0)
				{
					while($row = $result->fetch_row())
					{
						$admin_id = $row[0];
						$username = $row[1];						
					}
					$_SESSION['admin_id']=$admin_id;
					$_SESSION['username']=$username;
					header('Location:home.php');
				}
				else
				{
					echo "<center>Invalid Username / Password.</center>";	
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
