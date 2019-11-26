
<?php
	include 'dbh.php';
	$name=$_POST["name"];
	$email=$_POST["email"];
	$username=$_POST["username"];
	$pass=$_POST["password"];
	$sql="insert into users(name,email,username,password) VALUES ('$name','$email','$username','$pass')";
	$conn->query($sql);
	echo 'Data Entered Successfully!!! ';
	header('location:register.htm');
	
?> 
