<!DOCTYPE html>
<html>
<head>
<title>HRDesi Result</title>
<link rel='icon' type='image/x-icon' href='fevicon.png'>
<style>
	#searchfield
	{
		width: 400px;
		height: 30px;
		border-radius: 20px;
		border: 1px solid green;
	}
	#gobtn
	{
		width: 90px;
		height: 35px;
		border-radius: 5px;
		border: 1px solid green;
		background-color: white;
		font-size: 15px;
	}
	#gobtn:hover
	{
		width: 90px;
		height: 35px;
		border-radius: 5px;
		border: 1px solid green;
		background-color: green;
		color: white;
	}
</style>
</head>
<body>
<form action='' method='GET'>
<table border='0' width='110%'  bgcolor='f2f2e2'>
	<tr>
		<td  width='10%'>
		<a href='index.php'><img src='logo.png' style='padding: 10px;' width='80%'></a>
		</td>
		<td>
		<input type='text' name='' id='searchfield'>
		&nbsp
		<input type='submit' name='' value='GO' id='gobtn'>
		</td>
	</tr> 
</table>	
<table border='0' style='margin-left: 100px;'>
	<tr>
<?php
include('connection.php');
if(isset($_GET['searchbtn']))
{
	$search = $_GET['searchbar'];
	if($search=='')
	{
		echo 'Please Write Something in Searchbox';
		exit();
	}
	$query = "select * from addsite where KEYWORDS like '%$search%'";
	$data = mysqli_query($conn, $query);
	if(mysqli_num_rows($data)<1)
	{
		echo "No Result Found!";
		exit();
	}
echo "<a href='#' style='margin-left:105px;'>More Images for $search </a>";
while($row = mysqli_fetch_array($data))
{
	echo "
		<td>
		<img src='$row[4]' width='200px;'>
		</td>
	";
}
}
?>
</tr>
</form>
<?php include("final.php")
?>
</body>
</html>