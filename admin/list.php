<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
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
<script>
$(document).ready(function() {
    $('#bb_list').DataTable();
} );
function print_report()
{
	window.open("report_blood_bank.php");
}
</script>
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>
    <div class="main">
	<div class="head">Blood Bank List</div>
    <?php
	include("../includes/db.php");	
		
	$query = "select * from blood_bank_master";
	$result = $con->query($query);
	if($result->num_rows>0)
	{
		$no=0;
		$tbl = '<table id="bb_list" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
		$tbl .= '<thead><tr><th>No</th><th>Name/Address</th><th>View Storage</th><th>Delete</th></tr></thead>';
		$tbl .= '<tfoot><tr><th>No</th><th>Name/Address</th><th>View Storage</th><th>Delete</th></tr></tfoot><tbody>';		
		while($row = $result->fetch_row())
		{	
			$no++;
			$tbl .= '<tr>';
			$tbl .= '<td align="center">' . $no . '</td>';
			$tbl .= '<td><b>' . $row[3] . '</b><br>';
			$tbl .= '<b>Address:</b>' . $row[4] . ', ' . $row[5] . ', ' . $row[6] . ' [ ' . $row[7] . ' ]<br>';
			$tbl .= '<b>Phone:</b>' . $row[8] . '&nbsp;';
			$tbl .= '<b>Email:</b>' . $row[1] . '&nbsp;';
			$tbl .= '<b>Website:</b>' . $row[9] . '</td>';
			$tbl .= '<td align="center"><a href="storage.php?id=' . $row[0] . '">View</a></td>';
			$tbl .= '<td align="center"><a href="delete_bb.php?id=' . $row[0] . '">Delete</a></td>';
			$tbl .= '</tr>';
		}
		$tbl .= '</table><input class="btn" type="button" value="Print Report" onclick="print_report()">';
		echo $tbl;
		
	}
	else
	{
		echo '<p align="center">No Blood Bank Registered</p>';
	}
	?>			
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>