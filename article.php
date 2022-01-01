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
    $('#dr_result').DataTable();
} );
</script>
</head>
<body>
<div class="container">
	<?php
		include('includes/header.php');
	?>
    <div class="main">
    <div class="head">Health Article List</div>
    <?php
		include("includes/db.php");		
		//fetch the all records from health article master table
		$query = "select * from health_article_master order by ID desc";
		$result = $con->query($query);
		if($result->num_rows>0)
		{
			//if data is fetched
			$no=0;
			$tbl = '<table id="dr_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
			$tbl .= '<thead><tr><th>No</th><th>Article</th><th>Date</th></tr></thead>';
			$tbl .= '<tfoot><tr><th>No</th><th>Article</th><th>Date</th></tr></tfoot><tbody>';
			while($row = $result->fetch_row())
			{
				$no++;
				$tbl .= '<tr align="center">';
				$tbl .= '<td>' . $no . '</td>';
				$tbl .= '<td><a style="text-decoration:none;" href="article-page.php?article_id='. $row[0] .'">' . $row[2] . '</a></td>';
				$tbl .= '<td>' . $row[4] . '</td>';			
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