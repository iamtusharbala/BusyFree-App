
<?php
error_reporting(0);
session_start();
include("connection.php");



$query = "UPDATE  book_slot SET status='$_REQUEST[status]' WHERE id='$_REQUEST[id]'";


	$res=mysqli_query($con,$query);
	
	header("location:book_slot.php");

