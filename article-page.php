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
</head>
<body>
<div class="container">
	<?php
		include('includes/header.php');
	?>
    <div class="main">
    <div class="head">Health Article</div>
    <?php
		include("includes/db.php");
		if(isset($_GET['article_id']))
		{
			//fetch the records from health article master table
			$query = "select ham.*,dm.Name from health_article_master ham, doctor_master dm where ham.DoctorID=dm.ID and ham.ID = " . $_GET['article_id'];
			$result = $con->query($query);
			if($result->num_rows>0)
			{
				while($row = $result->fetch_row())
				{
					echo '<h1 align="center">' . $row[2]  . '</h1>';
					echo '<p align="center"><small><b>Published Date:</b> '. $row[4] .' | <b>Author:</b> <a href="doctor-page.php?doctor_id='. $row[1] .'">'. $row[5] .'</a></small></p>';
					echo '<div style="widht:100%;text-align:justify">' . $row[3] . '</div>';
				}
				
			}
			else
			{
				// if data not fetched
				echo "<center>No result found</center>";
			}
		}
		else
		{
			// if direct access
			header('Location:article.php');
		}		
	?>    
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>