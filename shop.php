<head>
	<!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
	<title>BusyFree | Shop Profile</title>
</head>

<?php
//error_reporting(0);
session_start();
include("connection.php");

include("header.php");

echo"<div class='container'>";
if($_SESSION['user']=="User")
{
	
	echo"<br><br><a href='index.php' style='background-color:#1B8BBB;border:none;' class='btn btn-primary' /><i class='fas fa-undo-alt'></i>&nbsp;&nbsp;GO TO LIST</a>";
	$query="select * FROM shop WHERE id='$_REQUEST[id]'  ";
	$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
{
	echo"<div class='col-sm-12'>
	<div class='row'>
	<div class='col-lg-8'><h3 style=\"text-transform: uppercase;font-family: 'Montserrat', sans-serif;  font-size: 430%; margin-left:auto;margin-right:auto;\">$row[shop_name]</h3>
	<p style=\"font-family: 'Montserrat', sans-serif;font-size: 200%;\"><i class=\"fas fa-map-marker-alt\"></i>&nbsp;&nbsp;$row[address]</p>
	<h5 style=\"font-family: 'Montserrat', sans-serif;\"><i class=\"fas fa-phone\"></i>&nbsp;&nbsp;$row[phone]</h5>
	<p style=\"font-family: 'Montserrat', sans-serif;\"><i class=\"zmdi zmdi-email\"></i>&nbsp;&nbsp;$row[email]</p>
	<br>";

	if($row['people_count']>10 )
	{
	echo"<a href='' class='btn btn-warning'>CURRENTLY BUSY</a>&nbsp;";
	}
	elseif($row['avilablity']=="YES" )
	{
		echo"<a href='' class='btn btn-success' > AVAILABLE</a>&nbsp;";
	}
	else
	{
		echo"<a href='' class='btn btn-danger' >NOT AVAILABLE</a>&nbsp;";
	}

if($row['containment_zone']=="YES")
	{
	echo"&nbsp;<a href='' class='btn btn-danger' >INSIDE CONTAINMENT ZONE</a>&nbsp;";
	}
	else
	{
		echo"&nbsp;<a href='' class='btn btn-success' >NOT IN CONTAINMENT ZONE</a>&nbsp;";
	}
	echo"<br><br><br>
	
	</div>
	<br>
	<div class='col-lg-4 col-md-12 col-sm-12'><img src='$row[image]'style='width: 100%;' class='img-responsive' />
	<br>";
	
if($row['containment_zone']=="NO" && $row['people_count']<10 && $row['avilablity']=="YES" )
	{
	echo"<a href='book.php?id=$row[id]' class='btn btn-warning btn-lg' style='width: 100%;' />BOOK SLOT</a></div> </div>";
	}
	else{
		echo"<a href='' class='btn btn-success btn-lg text-center disabled' style='background-color:grey;border:none;width: 100%;'/>SLOT NOT AVAILABLE</a></div></div>";
	}
	$date=date('Y-m-d');
	
	$query2="select * FROM book_slot WHERE shop='$_REQUEST[id]' and user='$_SESSION[user_id]' and date='$date'  ";
	$res2=mysqli_query($con,$query2);
	
	while($row2=mysqli_fetch_array($res2)){
		echo"<div style='margin-bottom:20px;width:100%;text-align: center;' class='cred'><br><b>Booking Date :$date  <br>Booking Time : $row2[time] <br> Status: $row2[status] </b></div></div>";
	}	
	echo "<br>
	<div class = 'container-fluid'>
	<div class='col-lg-12 col-md-12 col-sm-12'>
	 <iframe src=$row[map_link] width='100%' style='border: none;'></iframe> 
	 </div></div>";
	echo"<hr>
	<br> ";
	
	
}
	
	
	
}
echo"</div>";



  
