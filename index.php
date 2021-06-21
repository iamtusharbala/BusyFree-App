<head>
	<!--Font--->

	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
	<title>BusyFree | Shops Near You</title>
</head>

<?php
//error_reporting(0);
session_start();
include("connection.php");

include("header.php");

echo"<div class='container'>";



if($_SESSION['user']=="User")
{
	if(isset($_SESSION["book_success"])){
		echo '<div class="alert alert-success" role="alert">
  You have successfully booked your slot! Go To My Slots to know your status.
</div>';
	}
	echo"<h2 style=\"text-transform: uppercase;font-family: 'Montserrat', sans-serif;  font-size: 300%;\">SHOPS NEAR YOU</h2> <br> <br>";
	
		
$query="select * FROM shop ";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_array($res))
{
	echo"<div=\"container\"><div class=\"row\"><div class='col-sm-12 col-md-12 cred'>
		<div class='col-lg-4 col-md-12 col-sm-12'><img src='$row[image]' class='img-responsive img-rounded' width='200' height='200'/></div>
		<div class='col-lg-4 col-md-12 col-sm-12'>
			<h1 style=\"font-family: 'Montserrat', sans-serif;text-transform: uppercase;\">$row[shop_name]</h1>
		<p style=\"font-family: 'Montserrat', sans-serif;\">$row[address]</p>";

		if($row['avilablity'] == "YES"){
			echo "<button type=\"button\" class=\"btn btn-success\">AVAILABLE</button>";
		}
		else{
			echo "<button type=\"button\" class=\"btn btn-danger\">CURRENTLY BUSY</button>";
		}
		echo "</div>

		<div class='col-lg-4 col-md-12 col-sm-12'>";
	
	if($row['people_count']>10 )
	{
	echo"<a href='' class='btn btn-warning btn-lg' >CURRENTLY BUSY</a>&nbsp;";
	}
	elseif($row['avilablity']=="YES" )
	{
		echo"<a href='shop.php?id=$row[id]' class='btn btn-warning btn-lg' > BOOK A SLOT</a>&nbsp;";
	}
	else
	{
		echo"<a href='' class='btn btn-danger btn-lg' >BOOKING NOT AVAILABLE</a>&nbsp;";
	}
	
	echo"</div>
	
	</div> </div>	<hr>  <br>";
	
	
}




	
	
	
}else
{
	header("location:shop_index.php");
}

echo"</div>";
unset($_SESSION["book_success"]);



  