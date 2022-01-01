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
    <fieldset>
    	<legend>Search blood in blood bank:</legend>
        <form name="f1" method="post">
        	<center>
			City: <input type="text" name="city" value="<?php if(isset($_POST['city'])){echo $_POST['city'];} ?>" required />&nbsp;&nbsp;&nbsp;
			State: <input type="text" name="state" value="<?php if(isset($_POST['state'])){echo $_POST['state'];} ?>" required />&nbsp;&nbsp;&nbsp;
            Country: <input type="text" name="country" value="<?php if(isset($_POST['country'])){echo $_POST['country'];} ?>" required />&nbsp;&nbsp;&nbsp;
            <input class="btn" type="submit" value="Search" />
            </center>
        </form>
    </fieldset>
    <br/>
    <?php
		if(isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']))
		{
			$city = $_POST['city'];
			$state = $_POST['state'];
			$country = $_POST['country'];
			include("includes/db.php");
			$query = "select bbm.Name,bbm.Address,bbm.City,bbm.State,bbm.Country,bbm.Phone,bbm.Email,bbm.Website,bsm.BloodGroup,bsm.Unit from blood_bank_master bbm,blood_storage_master bsm where bbm.City='$city' and bbm.State='$state' and bbm.Country='$country' and bbm.ID=bsm.BloodBankID";
			$result = $con->query($query);
			if($result->num_rows>0)
			{
				$no=0;
				$tbl = '<table id="search_result" class="display" width="100%" border="1px" cellspacing="0px" cellpadding="5px">';
				$tbl .= '<thead><tr><th>No</th><th>Name/Address</th><th>Group</th><th>Unit</th></tr></thead>';
				$tbl .= '<tfoot><tr><th>No</th><th>Name/Address</th><th>Group</th><th>Unit</th></tr></tfoot><tbody>';
				while($row = $result->fetch_row())
				{
					$no++;
					$tbl .= '<tr>';
					$tbl .= '<td align="center">' . $no . '</td>';
					$tbl .= '<td><b>' . $row[0] . '</b><br>';
					$tbl .= '<b>Address:</b>' . $row[1] . ', ' . $row[2] . ', ' . $row[3] . ' [ ' . $row[4] . ' ]<br>';
					$tbl .= '<b>Phone:</b>' . $row[5] . '&nbsp;';
					$tbl .= '<b>Email:</b>' . $row[6] . '&nbsp;';
					$tbl .= '<b>Website:</b>' . $row[7] . '</td>';
					$tbl .= '<td align="center">' . $row[8] . '</td>';
					$tbl .= '<td align="center">' . $row[9] . '</td>';
					$tbl .= '</tr>';
				}
				$tbl .= '</table>';
				echo $tbl;
			}
			else
			{
				echo '<center>No result found<br><br><img src="images/search.jpg" /></center>';
			}
		}
		else
		{
			echo '<center><img src="images/search.jpg" /></center>';	
		}
	?>    
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>