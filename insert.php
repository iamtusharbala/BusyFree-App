<?php 
if(isset($_POST['signup']))
{
include("connection.php");
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);

$query = "INSERT INTO registration( name, email, phone, password,image) VALUES('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[password]','$target_path')";



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

