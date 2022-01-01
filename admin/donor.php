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
	window.open("report_blood_donor.php");
}
</script>
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>
    <div class="main">
	<div class="head">Donor List</div>
    <?php
	include("../includes/db.php");	
		
	$query = "select * from donor_master";
	$result = $con->query($query);
	if($result->num_rows>0)
	{
		$no=0;
		$tbl = '<table id="bb_list" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
		$tbl .= '<thead><tr><th>No</th><th>Name/Address</th><th>Phone</th><th>Email</th><th>Age/Weight</th><th>Blood Group</th><th>Delete</th></tr></thead>';
		$tbl .= '<tfoot><tr><th>No</th><th>Name/Address</th><th>Phone</th><th>Email</th><th>Age/Weight</th><th>Blood Group</th><th>Delete</th></tr></tfoot><tbody>';
		while($row = $result->fetch_row())
		{
			$no++;
			$tbl .= '<tr>';
			$tbl .= '<td align="center">' . $no . '</td>';
			$tbl .= '<td><b>' . $row[2] . '</b><br>';
			$tbl .= '<b>Address:</b>' . $row[3] . ', ' . $row[4] . ', ' . $row[5] . ' [ ' . $row[6] . ' ]</td>';
			$tbl .= '<td align="center">' . $row[7] . '</td>';
			$tbl .= '<td align="center">' . $row[8] . '</td>';
			$tbl .= '<td align="center">' . $row[9] . ' / ' . $row[10]  .  '</td>';
			$tbl .= '<td align="center">' . $row[11] . '</td>';
			$tbl .= '<td align="center"><a href="delete_donor.php?id=' . $row[0] . '&update_code=' . $row[12] . '">Delete</a></td>';
			$tbl .= '</tr>';
		}
		$tbl .= '</table><input class="btn" type="button" value="Print Report" onclick="print_report()">';
		echo $tbl;
		
	}
	else
	{
		echo '<p align="center">No Doctor Registered</p>';
	}
	?>			
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>