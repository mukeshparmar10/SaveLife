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
	
	if(isset($_POST['id']) && isset($_POST['group']) && isset($_POST['unit']))
	{
		$id= $_POST['id'];
		$group = $_POST['group'];
		$unit = $_POST['unit'];
		
		$query = "update blood_storage_master set BloodGroup='$group',Unit=$unit where ID=$id";
		$result = $con->query($query);
		if($result > 0)
		{
			$msg = "<center>Storage updated successfully.</center>";
			header('Location:storage.php');
		}				
		else
		{
			$msg = "<center>Storage can't update.</center>";
		}
	}
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "select * from blood_storage_master where ID=$id";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			while($row = $result->fetch_row())
			{
				$group = $row[2];			
				$unit = $row[3];				
			}
		}
	}
	else
	{
		header('Location:storage.php');
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
	<div class="head">Update Storage</div>
		<?php
			if(isset($msg))
			{
				echo $msg;	
			}
		?>
		<form name="f1" method="post">
        <table border="0px" cellpadding="3px" align="center" width="500px">
        	<tr><td>Group:</td></tr>
			<tr><td><input class="txt" type="text" name="group" maxlength="50" value="<?php if(isset($group)){echo $group;}?>" required /><input type="hidden" name="id" maxlength="6" value="<?php if(isset($id)){echo $id;}?>" required /></td></tr>            
			<tr><td>Unit:</td></tr>
            <tr><td><input class="txt" type="text" name="unit" maxlength="200" value="<?php if(isset($unit)){echo $unit;}?>" required /></td></tr>
            
            <tr><td align="center"><input class="btn" type="submit" value="Update Storage"  /></td></tr>
            
            
        </table>
        </form>		
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>