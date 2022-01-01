<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
	{
		header('Location:index.php');
		exit;
	}
	
	include('../includes/config.php');
	include("../includes/db.php");
	$admin_id = $_SESSION['admin_id'];
	
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['description']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$description = $_POST['description'];
		
		$query = "select * from admin_master where Username='$username'";
		
		$result = $con->query($query);
		
		if($result->num_rows >0)
		{
			$msg = "Admin username is already exist, please give different username.";
		}
		else
		{		
			$query = "insert into admin_master(Username,Password,Description) values('$username','$password','$description')";
			$result = $con->query($query);
			if($result > 0)
			{
				$msg = "<center>Admin user created successfully.</center>";
			}				
			else
			{
				$msg = "<center>Admin user can't create.</center>";
			}
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
<script>
$(document).ready(function() {
    $('#search_result').DataTable();
} );
</script>
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>
    <div class="main">
	<div class="head">Admin</div>
    <center>
    <?php
		if(isset($msg))
		{
			echo $msg;	
		}
	?>
    </center>
    <form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Username:</td></tr>
			<tr><td><input class="txt" type="text" name="username" maxlength="30" required /></td></tr>
            <tr><td>Password:</td></tr>
			<tr><td><input class="txt" type="password" name="password" maxlength="30" required /></td></tr>
            <tr><td>Description:</td></tr>
            <tr><td><input class="txt" type="text" name="description" maxlength="100" required /></td></tr>            
            <tr><td align="center"><input class="btn" type="submit" value="Add Admin" /></td></tr>
		</table>
	</form>
    <br>
    <?php
		$query = "select * from admin_master";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			$no = 0;
			$tbl = '<table id="search_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Username</th><th>Description</th><th>Delete</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Username</th><th>Description</th><th>Delete</th></tr></tfoot><tbody>';
			while($row = $result->fetch_row())
			{
				$no++;
				$tbl .= '<tr align="center">';
				$tbl .= '<td>' . $no . '</td>';
				$tbl .= '<td>' . $row[1] . '</td>';
				$tbl .= '<td>' . $row[3] . '</td>';
				$tbl .= '<td><a href="delete_admin.php?id=' . $row[0] . '">Delete</a></td>';
				$tbl .= '</tr>';
			}
			$tbl .= '</table>';
			echo $tbl;	
		}
		else
		{
			echo "<center>No Storage</center>";	
		}
	?>		
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>