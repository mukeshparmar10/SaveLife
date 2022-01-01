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
    	<div class="head">
        Welcome
    </div>	
	<div class="content">
        <table width="98%" align="center">
			<tr>
				<td width="49%"><a href="about.php"><img src="images/mid_banner1.jpg" width="100%" /></a></td>
				<td width="49%"><a href="search.php"><img src="images/mid_banner2.jpg" width="100%" /></a></td>
			</tr>
			<tr>
				<td width="49%"><a href="donor_register.php"><img src="images/mid_banner3.jpg" width="100%" /></td>
				<td width="49%"><a target="_blank" href="admin-bb"><img src="images/mid_banner4.jpg" width="100%" /></a></td>
			</tr>
			<tr>
				<td width="49%"><a target="_blank" href="admin-dr"><img src="images/mid_banner5.jpg" width="100%" /></a></td>
				<td width="49%"><a href="contact.php"><img src="images/mid_banner6.jpg" width="100%" /></td>
		</tr>		
	</table>
	</div>    
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>