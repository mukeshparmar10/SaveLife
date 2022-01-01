<?php
	include('includes/config.php');
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
    <div class="head">Donor List</div>
    <?php
		include("includes/db.php");		
		//fetch the all records from donor master table
		$query = "select * from donor_master";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			//if data is fetched
			$no=0;
			$tbl = '<table id="donor_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Age/Weight</th><th>Glooad Group</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Age/Weight</th><th>Blood Group</th></tr></tfoot><tbody>';
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
				$tbl .= '</tr>';
			}
			$tbl .= '</table>';
			// display table of data
			echo $tbl;
		}
		else
		{
			// if data not fetched
			echo "<center>No result found</center>";
		}		
	?>    
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>