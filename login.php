<?php
	include 'dbh.php';
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$username = test_input($_POST["username"]);
		$pass = test_input($_POST["password"]);
	}
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$_SESSION["username"] = $username;
	$sql="select * from users where username='$username' and password='$pass'";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		header('location:home2.htm');
	}
	else
	{
		echo 'Invalid credentials';
	}
?>