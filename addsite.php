<!DOCTYPE html>
<html>
<head>
<title>Add Site</title>
<link rel='icon' type='image/x-icon' href='fevicon.png'>
<style>
	input
	{
		width: 550px;
		height: 30px;
		border-radius: 5px;
		border: 2px solid green;
		background-color: white;
		color: blue;
		font-size: 15px;
	}
	#addbtn
	{
		width: 100px;
		height: 35px;
		border-radius: 5px;
		border: 2px solid red;
		background-color: white;
		color: red;
	}
	#addbtn:hover
	{
		background-color: red;
		color: white;
	}
	#cancelbtn
	{
		width: 100px;
		height: 35px;
		border-radius: 5px;
		border: 2px solid green;
		background-color: white;
		color: green;
	}
	#cancelbtn:hover
	{
		background-color: green;
		color: white
	}
	#desc
	{
		width: 550px;
		height: 100px;
		border-radius: 5px;
		border: 2px solid green;
	}
</style>
</head>

<body>
<font size='7'><b><p align='center'>Add Website</p></b></font>
<form action='' method='POST', enctype='multipart/form-data'>
	<table border='0' width='50%' align='center' cellspacing='10'>
	<tr>
		<td>Title</td>
		<td><input type='text' name='webtitle'></td>
	</tr>
	<tr>
		<td>Link</td>
		<td><input type='text' name='weblink'></td>
	</tr>
	<tr>
		<td>Keywords</td>
		<td><input type='text' name='webkeywords'></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><textarea name='webdescription' id='desc'></textarea></td>
	</tr>
	<tr>
		<td>Images</td>
		<td><input type='file' name='imgupload' ></td>
	</tr>
	<tr>
		<td colspan='2' align='center'><input type='submit' name='addweb' id='addbtn'>
		&nbsp &nbsp
		<input type='reset' name='reset' id='cancelbtn'>
		</td>
	</tr>
	</table>

</form>
</body>
</html>
<?php
include("connection.php");
if($_POST['addweb'])
{
	$web_title=$_POST['webtitle'];
	$web_link=$_POST['weblink'];
	$web_keywords=$_POST['webkeywords'];
	$web_desc=$_POST['webdescription'];
	$filename=$_FILES["imgupload"]["name"];
	$tempname=$_FILES["imgupload"]["tmp_name"];
	
	$folder ="website_images/".$filename;
	move_uploaded_file($tempname,$folder);
	if($web_title!='' && $web_link!='' && $web_keywords!='' && $web_desc!='')
	{
		$query = "INSERT INTO addsite VALUES('$web_title', '$web_link', '$web_keywords', '$web_desc', '$filename')";
		$data= mysqli_query($conn, $query);
		if($data)
		{
			echo "<script>alert('Website Inserted')</script>";
		}
	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
}

?>