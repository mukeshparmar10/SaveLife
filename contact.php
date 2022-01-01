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
		Contact
        </div>
        <div class="content">
		<center><b>Please submit to contact us, or send feedback.</b></center>
        <?php
			// to check all details are posted or not
			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
			{
				$name = $_POST['name'];
				$email = $_POST['email'];
				$message = $_POST['message'];
				$message = str_replace("'","`",$message);
				include("includes/db.php");	
				
				// insert data into contact_master table
				$query = "insert into contact_master(Name,Email,Message) values('$name','$email','$message')";
				$result = $con->query($query);
				if($result>0)
				{
					//success
					echo "<center>Submit success.</center>";	
				}
				else
				{
					//cancel
					echo "<center>Can't submit.</center>";	
				}
			}
		?>
        <form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Name:</td></tr>
            <tr><td><input class="txt" type="text" name="name" required /></td></tr>
            <tr><td>Email:</td></tr>
            <tr><td><input class="txt" type="email" name="email" required /></td></tr>
            <tr><td>Message:</td></tr>
            <tr><td><textarea name="message" style="width:100%;height:200px;border:solid 1px #CC1D00;padding:3px" required></textarea></td></tr>            
            <tr><td align="center"><input class="btn" type="submit" value="Submit"  /></td></tr>
        </table>
        </form>		
        </div>
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>