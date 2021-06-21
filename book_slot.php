<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BusyFree | Book Requests</title>


	<!-- Font Icon -->
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<?php
//error_reporting(0);
session_start();
include("connection.php");

include("header.php");

echo"<br><div class='container'>";


?>


<div class='col-md-12 col-sm-12 col-lg-12'>
	<div class="">
		<br>
		<h2 class="form-title container-fluid"
			style="text-transform: uppercase;font-family: 'Montserrat', sans-serif;  font-size: 300%;"> BOOK REQUESTS
		</h2><br>
		<?Php
								
								if($_SESSION['user']=="Shop")
								{
									$query="select * FROM book_slot WHERE shop='$_SESSION[user_id]'  ";
								}
								else
								{
									$query="select * FROM book_slot WHERE user='$_SESSION[user_id]'  ";
								}
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
{
	$query1="select * FROM shop WHERE id='$row[shop]'  ";
	$res1=mysqli_query($con,$query1);
	$row1=mysqli_fetch_array($res1);
	
	$query2="select * FROM registration WHERE id='$row[user]'  ";
	$res2=mysqli_query($con,$query2);
	$row2=mysqli_fetch_array($res2);
	
	if($_SESSION['user']=="Shop"){

		echo" <div><div='row'><div class='col-md-12 cred '>
		<div class='col-md-3'>
		<img src='$row2[image]' class='img-responsive img-circle' width='100' height='100' />
		</div>
		<div class='col-md-6'>
		
		<h2 style=\"text-transform: uppercase;font-family: 'Montserrat', sans-serif;\">$row2[name]</h2>
		<p style=\"font-family: 'Montserrat', sans-serif;\"><i class='fas fa-phone'></i>&nbsp;&nbsp;$row2[phone]</p><br>";
	}
	else{
		echo" <div> <div='row'><div class='col-md-12 cred '>
		<div class='col-md-3'>
		<img src='$row1[image]' class='img-responsive img-circle' width='100' height='100' />
		</div>
		<div class='col-md-6'>
		
		<h2 style=\"text-transform: uppercase;font-family: 'Montserrat', sans-serif;\">$row1[shop_name]</h2>
		<p style=\"font-family: 'Montserrat', sans-serif;\"><i class='fas fa-phone'></i>&nbsp;&nbsp;$row1[phone]</p>";
	}

	date_default_timezone_set('Asia/Kolkata');
	$currentTime= date('H:i');
	$currentDate= date('Y-m-d');
	// echo $currentTime , $currentDate;
	if($_SESSION['user']=="Shop" && $row['status']=="REQUESTED")
	{
		if($currentTime>=$row['time'] && $currentDate>=$row['date']){
			echo "<p>The requested timeslot has passed.</p>";
		}
		else{
			echo"<a href='approve.php?id=$row[id]&status=APPROVE' class='btn btn-success col-md-6'>APPROVE</a> <a href='approve.php?id=$row[id]&status=REJECT' class='btn btn-danger col-md-6'>REJECT</a>";
		}
	}	

	//New changes
	if($_SESSION['user']!="Shop" && $row['status']=="REQUESTED")
	{
		if($currentTime<=$row['time'] && $currentDate<=$row['date']){
			echo"<a href='cancel.php?id=$row[id]&status=REQUESTED' class='btn btn-danger col-md-6'>CANCEL SLOT</a>";
	}
	}
	else if( $_SESSION['user']!="Shop" && $row['status']=="APPROVE"){
		if($currentTime<=$row['time'] && $currentDate<=$row['date']){
			echo"<a href='cancel.php?id=$row[id]&status=APPROVE' class='btn btn-danger col-md-6'>CANCEL SLOT</a>";
		}
	}

 ?>
		<?php 
 echo"
</div>
<div class='col-sm-3' style=\"font-family: 'Montserrat', sans-serif;\">
<p style='margin-top:0;margin-bottom:0'>Date: $row[date] </p>
<h4 style='margin-top:0;margin-bottom:0'>Time: $row[time]</h4>
<h3 style='padding:none;margin-bottom:30'>Status: $row[status]</h3>

</div>
</div>
<br>
<hr>


</div>";						
}
						
						?>

	</div>
</div>
<br>



<?php	
	
	

echo"</div> <br>";



  