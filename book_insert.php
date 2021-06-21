<?php
session_start();
if(isset($_POST['signup']))
{
	$date=date('Y-m-d');
include("connection.php");
$query = "INSERT INTO book_slot(shop,user, time, status,date) VALUES('$_POST[shop]','$_SESSION[user_id]','$_POST[time]','REQUESTED','$date')";



if (!mysqli_query($con,$query))
  {
  $status="failure";
  //echo "EROR :".mysqli_error($con); 
  header("location:index.php?status=$status");
  }
else
  { 
  
  $status="success";
  $_SESSION["book_success"] = $status;
  header("location:index.php?status=$status");
  }
}


?>
