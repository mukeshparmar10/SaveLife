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
</head>
<body>
<h1 align="center">Blood Bank Report</h1>
<?php
include("../includes/db.php");	
	
$query = "select * from blood_bank_master";
$result = $con->query($query);
if($result->num_rows>0)
{
	$no=0;
	$tbl = '<table id="bb_list" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
	$tbl .= '<thead><tr><th>No</th><th>Blood Bank</th><th>Address</th><th>Phone</th><th>Email</th><th>Website</th></tr></thead>';	
	while($row = $result->fetch_row())
	{	
		$no++;
		$tbl .= '<tr align="center">';
		$tbl .= '<td align="center">' . $no . '</td>';
		$tbl .= '<td><b>' . $row[3] . '</b><br>';
		$tbl .= '<td>' . $row[4] . ', ' . $row[5] . ', ' . $row[6] . ' [ ' . $row[7] . ' ]</td>';
		$tbl .= '<td>' . $row[8] . '</td>';
		$tbl .= '<td>' . $row[1] . '</td>';
		$tbl .= '<td>' . $row[9] . '</td>';		
		$tbl .= '</tr>';
	}
	$tbl .= '</table>';
	echo $tbl;
	
}
else
{
	echo '<p align="center">No Blood Bank Registered</p>';
}
?>
<script>
window.print();
</script>
</body>
</html>