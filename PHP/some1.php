<?php
	extract($_GET);

	//Create a connection to the DB Server
	$con=mysqli_connect('localhost','root','','Skychef');
	$sql="UPDATE feedback SET likes=$lk WHERE post='$status'";
	mysqli_query($con,$sql);
	header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . '/Skychef/feedbkform.php');
?>