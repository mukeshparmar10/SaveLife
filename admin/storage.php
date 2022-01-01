<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
	{
		header('Location:index.php');
		exit;
	}
	
	if(isset($_GET['id']))
	{
		$user_id = $_GET['id'];
	}
	else
	{
		header('Location:list.php');
		exit;
	}
	
	include('../includes/config.php');
	include("../includes/db.php");	
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
	<div class="head">Storage</div>   
    <?php		
		$query = "select * from blood_storage_master where BloodBankID=$user_id";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			$no = 0;
			$tbl = '<table id="search_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Group</th><th>Unit</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Group</th><th>Unit</th></tr></tfoot><tbody>';
			while($row = $result->fetch_row())
			{
				$no++;
				$tbl .= '<tr align="center">';
				$tbl .= '<td>' . $no . '</td>';
				$tbl .= '<td>' . $row[2] . '</td>';
				$tbl .= '<td>' . $row[3] . '</td>';
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