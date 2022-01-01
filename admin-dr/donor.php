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
    $('#donor_result').DataTable();
} );
</script>
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>
    <div class="main">
	<div class="head">Donor List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="btn" type="button" value="Add Donor" onClick="window.location.href='add_donor.php'" />
    </div>
    <?php
		$query = "select * from donor_master where BloodBankID=$user_id";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			$no=0;
			$tbl = '<table id="donor_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Age/Weight</th><th>Glood Group</th><th>Edit/Delete</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Age/Weight</th><th>Blood Group</th><th>Edit/Delete</th></tr></tfoot><tbody>';
			while($row = $result->fetch_row())
			{
				$no++;
				$tbl .= '<tr align="center">';
				$tbl .= '<td>' . $no . '</td>';
				$tbl .= '<td>' . $row[2] . '</td>';
				$tbl .= '<td>' . $row[3] . ', ' . $row[4] . ', ' . $row[5] . ' [ ' . $row[6] . ' ]</td>';
				$tbl .= '<td>' . $row[7] . '</td>';
				$tbl .= '<td>' . $row[8] . '</td>';
				$tbl .= '<td>' . $row[9] . ' / ' .  $row[10] . '</td>';
				$tbl .= '<td>' . $row[11] . '</td>';
				$tbl .= '<td><a href="edit_donor.php?id=' . $row[0] . '&update_code=' . $row[12] .'">Edit</a><br>';
				$tbl .= '<a href="delete_donor.php?id=' . $row[0] . '&update_code=' . $row[12] .  '">Delete</a></td>';
							
				$tbl .= '</tr>';
			}
			$tbl .= '</table>';
			echo $tbl;
		}
		else
		{
			echo "<center>No Donor</center>";	
		}
	?>		
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>