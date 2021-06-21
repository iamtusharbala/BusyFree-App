
<?php
error_reporting(0);
session_start();
include("connection.php");



$query = "DELETE FROM book_slot WHERE (status='REQUESTED' or status='APPROVE') and id='$_REQUEST[id]'";


	$res=mysqli_query($con,$query);
	
	header("location:book_slot.php");

