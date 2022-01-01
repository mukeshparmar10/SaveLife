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
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>    
    <div class="main">
    <div class="head">Health Article</div>		
		<?php
			include("../includes/db.php");
			
			$q = "SELECT hm.ID,hm.Title,dm.Name,hm.ArticleDate FROM health_article_master hm,doctor_master dm WHERE hm.DoctorID = dm.ID order by ID desc";
			
			$result = $con->query($q);
			
			if($result->num_rows>0)
			{
				$no = 0;				
				echo '<table border="1px" cellpadding="5px" cellspacing="0px" align="center" width="70%">';
				echo '<tr><th>No</th><th>Article</th><th>Article By</th><th>Date</th><th>View Article</th></tr>';
				while($row = $result->fetch_row())
				{
					$no++;
					echo '<tr align="center">';
					echo '<td>' . $no . '</td>';					
					echo '<td>' . $row[1] . '</td>';
					echo '<td>' . $row[2] . '</td>';
					echo '<td>' . $row[3] . '</td>';
					echo '<td><a href="article_page.php?article_id=' . $row[0] . '">View Article</a></td>';
					echo '</tr>';
				}
				echo '</table>';
			}
			
		?>		
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>