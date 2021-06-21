<?php 
if(isset($_POST['signup']))
{
include("connection.php");
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
$query = "INSERT INTO shop(shop_name, address, phone, image, map_link, email, password) VALUES('$_POST[name]','$_POST[address]','$_POST[phone]','$target_path','$_POST[map_link]','$_POST[email]','$_POST[password]')";


if (!mysqli_query($con,$query))
  {
  $status="failure";
  //echo "EROR :".mysqli_error($con); 
  header("location:reg.php?status=$status");
  }
else
  { 
  
  $status="success";
  header("location:login.php?status=$status");
  }
}
?>

