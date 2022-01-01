<?php
	session_start();
	if(!isset($_SESSION['user_id']))
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
function deleteArticle(id)
{
	if(confirm("Are you sure to delete?") == true)
	{
		$.post("delete_article.php",{article_id:id},function(data){
			if(data)
			{
				if(data=="1")
				{
					$("#article"+id).hide(500);
				}				
			}
			else
			{
				alert("Can't proces.");
			}
		});
	}
}
</script
</head>
<body>
<div class="container">
    <?php
		include('includes/header.php');
	?>    
    <div class="main">
    <div class="head">Health Article</div>
		<table border="0px" cellpadding="5px">
		<tr>
		<td>
		<form name="f1" method="post">
        <table border="0px" cellpadding="5px" align="center" width="500px">
        	<tr><td>Article Title:</td></tr>
            <tr><td><input class="txt" type="text" name="title" required maxlength="500" /></td></tr>
            <tr><td>Article Content:</td></tr>
            <tr><td><textarea id="content" class="txta" name="content" style="display:none;"></textarea><textarea id="content1" class="txta" name="content1" required></textarea><script>CKEDITOR.replace('content1');</script></td></tr>            
            <tr><td align="center"><input class="btn" type="button" value="Submit Article" onclick="submitForm()"  /></td></tr>
        </table>
        </form>
		</td>
		<td valign="top">
		<?php
			include("../includes/db.php");
			$user_id = $_SESSION['user_id'];
			if(isset($_POST['title']) && isset($_POST['content']))
			{
				$title = $_POST['title'];
				$content = $_POST['content'];
				
				$query = "select * from health_article_master where Title='$title' and DoctorID = " . $user_id;
				$result = $con->query($query);
				if($result->num_rows>0)
				{
					echo "<center><font color='#f00'>Article is already exist.</center>";
					header('Location:article.php');
				}
				else
				{
					$query = "insert into health_article_master(DoctorID,Title,ArticleDetails) values($user_id,'$title','$content')";
					$result = $con->query($query);
					if($result > 0)
					{
						echo "<center><font color='$0f0'>Article Posted successfully.</font></center>";
					}					
				}
			}
			
			$q = "select * from health_article_master where DoctorID = " . $user_id;
			
			$result = $con->query($q);
			
			if($result->num_rows>0)
			{
				$no = 0;
				echo '<h3 align="center">List of Article(s)</h3>';
				echo '<table border="1px" cellpadding="5px" cellspacing="0px" align="center">';
				echo '<tr><th>No</th><th>Article</th><th>Edit</th><th>Delete</th></tr>';
				while($row = $result->fetch_row())
				{
					$no++;
					echo '<tr align="center" id="article'. $row[0] .'">';
					echo '<td valign="top">' . $no . '</td>';
					echo '<td align="left">' . $row[2] . '<br/>';
					echo '<small>Posted on:' . $row[4] . '</small></td>';
					echo '<td><a href="edit_article.php?article_id=' . $row[0] . '">Edit</a></td>';										
					echo '<td><a href="#" onclick="deleteArticle(' . $row[0] . ')">Delete</a></td>';
					echo '</tr>';
				}
				echo '</table>';
			}
			
		?>
		</td>
		</tr>
		</table>
    </div>
    <?php
		include('includes/footer.php');
	?>
</div>
</body>
</html>