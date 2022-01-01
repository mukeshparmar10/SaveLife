<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header('Location:index.php');
		exit;
	}
	include('../includes/config.php');
	include("../includes/db.php");
	$user_id = $_SESSION['user_id'];
?>
<html lang="en">
<head>
<title><?php echo $title;?></title>
<?php
		include('includes/css_js.php');
?>
<script src="ckeditor/ckeditor.js"></script>
<script>
function submitForm()
{
	$("#content").val(CKEDITOR.instances['content1'].getData());
	if(f1.title.value=="")
	{
		f1.title.focus();
	}
	else
	{
		if(CKEDITOR.instances['content1'].getData()=="")
		{
			f1.content1.focus();
		}
		else
		{
			$("#content").val(CKEDITOR.instances['content1'].getData());
			f1.submit();
		}
	}
}

</script>
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
		
		$msg = '';

		if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content']))
		{
			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];

			$query = "update health_article_master set Title='$title',ArticleDetails='$content' where ID=$id and DoctorID=" . $user_id;
			
			$result = $con->query($query);
			if($result > 0)
			{
				$msg = "<center><font color='$0f0'>Article updated successfully.</font></center>";
			}
		}

		$q = "select * from health_article_master where DoctorID = " . $user_id . " and ID = " . $_GET['article_id'];
		$result = $con->query($q);

		if($result->num_rows>0)
		{
			while($row = $result->fetch_row())
			{
				$id = $row[0];
				$article_title = $row[2];
				$content = $row[3];
			}
		}
		else
		{
			header('Location:article.php');
		}
	?>
    <div class="main">
    <div class="head">Health Article</div>
		<form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Article Title:</td></tr>
            <tr><td><input name="id" type="hidden" value="<?=$id;?>" /><input class="txt" type="text" name="title" required maxlength="500" value="<?=$article_title;?>" /></td></tr>
            <tr><td>Article Content:</td></tr>
            <tr><td><textarea id="content" class="txta" name="content" style="display:none;"><?=$content;?></textarea><textarea id="content1" class="txta" name="content1" required></textarea><script>CKEDITOR.replace('content1');</script></td></tr>
            <tr><td align="center"><input class="btn" type="button" value="Submit Article" onclick="submitForm()"  /> <input class="btn" type="button" value="Back" onclick="window.location.href='article.php'"  /></td></tr>
        </table>
		<?=$msg;?>
        </form>
    </div>
    <?php
		include('includes/footer.php');
	?>
<script>
	CKEDITOR.instances['content1'].setData($("#content").val());
</script>
</div>
</body>
</html>