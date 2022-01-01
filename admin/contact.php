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
</script>
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>
    <div class="main">
	<div class="head">User Contact</div>
    <?php
		include("../includes/db.php");	
			
		$query = "select * from contact_master";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			$no=0;
			$tbl = '<table id="bb_list" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Name/Email</th><th>Message</th><th>Delete</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Name/Email</th><th>Message</th><th>Delete</th></tr></tfoot><tbody>';		
			while($row = $result->fetch_row())
			{
				$no++;
				$tbl .= '<tr>';
				$tbl .= '<td align="center">' . $no . '</td>';
				$tbl .= '<td>Name :' . $row[1] . '<br>Email:' . $row[2] . '</td>';
				$tbl .= '<td>' . $row[3] . '</td>';
				$tbl .= '<td align="center"><a href="delete_contact.php?id=' . $row[0] . '">Delete</a></td>';
				$tbl .= '</tr>';
			}
			$tbl .= '</table>';
			echo $tbl;		
		}
		else
		{
			echo '<p align="center">No contact/ message is available</p>';
		}
	
	?>			
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>