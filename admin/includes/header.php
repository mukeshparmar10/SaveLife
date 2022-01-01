<div class="header">
    <div class="header_inner">
	<img class="logo" src="../images/logo.png" align="absmiddle" /> <?php echo $title;?><sup><span style="font-size:18px"> [Admin] </span></sup>
    <span class="menu">
		<a href="home.php">Home</a> |
        <a href="admin.php">Admin</a> |
		<a href="list.php">Blood Bank</a> |
        <a href="donor.php">Donor</a> |
		<a href="doctor.php">Doctor</a> |
		<a href="article.php">Article</a> |
        <a href="contact.php">User Contact</a> |		
		<a href="logoff.php">Logoff</a>
        <span style="font-size:18px;margin-left:20px;font-weight:bold">		
		<?php			
			if(isset($_SESSION['username']))
			{			
				echo $_SESSION['username'];
			}
		?>
        </span>
	</span>
    </div>        
</div>