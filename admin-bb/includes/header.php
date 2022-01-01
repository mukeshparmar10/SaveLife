<div class="header">
    <div class="header_inner">
	<img class="logo" src="../images/logo.png" align="absmiddle" /> <?php echo $title;?><sup><span style="font-size:18px"> [Blood Bank] </span></sup>
    <span class="menu">
		<a href="home.php">Home</a> |
		<a href="profile.php">Profile</a> |
        <a href="donor.php">Donor</a> |
		<a href="storage.php">Storage</a> |
		<a href="logoff.php">Logoff</a>
        <span style="font-size:18px;margin-left:20px;font-weight:bold">
		Wel come 
		<?php			
			if(isset($_SESSION['name']))
			{			
				echo $_SESSION['name'];
			}
		?>
        </span>
	</span>
    </div>        
</div>