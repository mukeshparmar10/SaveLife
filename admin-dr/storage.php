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
	
	if(isset($_POST['group']) && isset($_POST['unit']))
	{
		$group = $_POST['group'];
		$unit = $_POST['unit'];
		$query = "insert into blood_storage_master(BloodBankID,BloodGroup,Unit) values($user_id,'$group',$unit)";
		$result = $con->query($query);
		if($result > 0)
		{
			$msg = "<center>Storage added successfully.</center>";
		}				
		else
		{
			$msg = "<center>Storage can't add.</center>";
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
	<div class="head">Blood Storage</div>
    <?php
		if(isset($msg))
		{
			echo $msg;	
		}
	?>
    <form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Group:</td></tr>
			<tr><td><input class="txt" type="text" name="group" maxlength="20" value="<?php if(isset($name)){echo $name;}?>" required /></td></tr>
            <tr><td>Unit:</td></tr>
			<tr><td><input class="txt" type="text" name="unit" maxlength="5" value="<?php if(isset($name)){echo $name;}?>" required /></td></tr>
            <tr><td align="center"><input class="btn" type="submit" value="Add Storage" /></td></tr>
		</table>
	</form>
    <br>
    <?php
		$query = "select * from blood_storage_master where BloodBankID=$user_id";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			$no = 0;
			$tbl = '<table id="search_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Group</th><th>Unit</th><th>Edit</th><th>Delete</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Group</th><th>Unit</th><th>Edit</th><th>Delete</th></tr></tfoot><tbody>';
			while($row = $result->fetch_row())
			{
				$no++;
				$tbl .= '<tr align="center">';
				$tbl .= '<td>' . $no . '</td>';
				$tbl .= '<td>' . $row[2] . '</td>';
				$tbl .= '<td>' . $row[3] . '</td>';
				$tbl .= '<td><a href="edit.php?id=' . $row[0] . '">Edit</a></td>';
				$tbl .= '<td><a href="delete.php?id=' . $row[0] . '">Delete</a></td>';
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