<?php
session_start();
include("connection.php");
$email=$_POST['email'];
$password=$_POST['password'];
$error = "Invalid username or password";

if($_POST['type']=="Shop")
{
	$query="select * FROM shop where email='$email' and password='$password' ";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);
	$count=mysqli_num_rows($res);
	if($count==1)
	{
		$_SESSION['user_id']=$row['id'];
		$_SESSION['email']=$email;
		
		$_SESSION['user']="Shop";
		header("location:shop_home.php");
	}
	else
	{
		
		$_SESSION["error"] = $error;
		header("location:login.php?status=error");

	}
}
else{
	
	$query="select * FROM registration where email='$email' and password='$password'  ";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res);
	$count=mysqli_num_rows($res);
	if($count==1)
	{
		$_SESSION['user_id']=$row['id'];
		$_SESSION['email']=$email;
		
		$_SESSION['user']="User";
		header("location:index.php");
	}
	else
	{
		$_SESSION["error"] = $error;
		header("location:login.php?status=error");
	}
	
	
}
?> 