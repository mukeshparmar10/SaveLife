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
    <div class="head">Doctor Details</div>
    <?php
		include("includes/db.php");
		if(isset($_GET['doctor_id']))
		{
			//fetch the records from doctor master table
			$query = "select * from doctor_master where ID = " . $_GET['doctor_id'];
			$result = $con->query($query);
			if($result->num_rows>0)
			{
				echo '<table width="500px" align="center" border="1px" cellspacing="0px" cellpadding="5px">';
				while($row = $result->fetch_row())
				{
					echo '<tr><td><b>Doctor Name:</b></td><td>' . $row[3]  . '</td></tr>';
					echo '<tr><td><b>Address:</b></td><td>' . $row[4]  . '</td></tr>';
					echo '<tr><td><b>City:</b></td><td>' . $row[5]  . '</td></tr>';
					echo '<tr><td><b>State:</b></td><td>' . $row[6]  . '</td></tr>';
					echo '<tr><td><b>Country:</b></td><td>' . $row[7]  . '</td></tr>';
					echo '<tr><td><b>Phone:</b></td><td>' . $row[8]  . '</td></tr>';
					echo '<tr><td><b>Email:</b></td><td>' . $row[2]  . '</td></tr>';
					echo '<tr><td><b>Degree:</b></td><td>' . $row[9]  . '</td></tr>';
					echo '<tr><td><b>Specialist In:</b></td><td>' . $row[10]  . '</td></tr>';
					echo '<tr><td><b>Experience:</b></td><td>' . $row[11]  . '</td></tr>';
					echo '<tr><td><b>Register From:</b></td><td>' . $row[12]  . '</td></tr>';
				}
				echo '</table>';
				
				$q = "select * from health_article_master where DoctorID = " . $_GET['doctor_id'];
				
				$result = $con->query($q);
				
				if($result->num_rows>0)
				{
					echo '<h2 align="center">List of Article(s)</h2>';
					$no=0;
					echo '<table width="500px" align="center" border="1px" cellspacing="0px" cellpadding="5px">';
					echo '<tr><th>No</th><th>Article</th><th>Published Date</th></tr>';
					while($row = $result->fetch_row())
					{
						$no++;
						echo '<tr>';
						echo '<td>' . $no . '</td>';
						echo '<td>' . $row[2] . '</td>';
						echo '<td>' . $row[3] . '</td>';
						echo '</tr>';
					}
					echo '</table>';
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
			header('Location:doctor.php');
		}		
	?>    
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>