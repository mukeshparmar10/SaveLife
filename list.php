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
    <div class="head">Blood Bank List</div>
    <?php
		include("includes/db.php");
		$query = "select * from blood_bank_master";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			$no=0;
			$tbl = '<table id="search_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Website</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Webiste</th></tr></tfoot><tbody>';
			while($row = $result->fetch_row())
			{
				$no++;
				$tbl .= '<tr align="center">';
				$tbl .= '<td>' . $no . '</td>';
				$tbl .= '<td>' . $row[3] . '</td>';
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