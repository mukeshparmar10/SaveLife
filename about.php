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
		About
        </div>
        <div class="content">
			<p>
				This is a service which connects user (patient), blood bank ,donor and doctor using single platform. User (patient) can search details regarding availability of blood nearby. As well as user can show list of blood banks, donors and doctor. Blood bank can register and manage blood storage and donors of own blood bank. Donor can register own details on this portal so user (patient) and blood bank can approach donors. Doctor can register own details, so user can show details of doctors. Doctor also can post health related articles for users (patients and people).
            </p>
            <p>
				In short the basic idea behind this product is to connect user (patient), blood bank, blood donor and doctor via single platform, and make entire process very easy and effort less.
			</p>
			<center>
				<img src="images/connection.jpg" />
            </center>
        </div>
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>