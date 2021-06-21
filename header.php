<?php
//session_start();
if($_SESSION['email']=="")
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Busy Free</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link href="css/log.css" rel="stylesheet">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

   <!--Start of Tawk.to Script // ChatBot-->
   <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
      Tawk_LoadStart = new Date();
    (function () {
      var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/60b5eb646699c7280daa062b/1f739v148';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!--End of Tawk.to Script-->


  <style>
    .page-header2 {
      background: #347EE1;
      color: #FFF !important;
      height: 80px;
      text-align: center;

    }
    a {
      color: #FFF!important;
    }
  </style>


  <?php
error_reporting(0);
session_start();
if($_SESSION['user']=="User")
{
  echo "<nav class='navbar navbar-inverse' style='background-color: #1B8BBB;border-color:#1B8BBB'>";
    echo "<div class='container-fluid'>";
      echo "<div class='navbar-header'>";
        echo "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>";
          echo "<span class='icon-bar'></span>";
          echo "<span class='icon-bar'></span>";
          echo "<span class='icon-bar'></span>";
        echo "</button>";
        echo "<a class='navbar-brand' href='#' style=\"font-family: 'Montserrat', sans-serif;\"><i class='fas fa-users'></i>&nbsp;&nbsp;BUSYFREE APP</a>";

      echo "</div>";
      echo "<div class='collapse navbar-collapse' id='myNavbar'>";
        echo "<ul class='nav navbar-nav'>";
	echo"  <li><a href='index.php' >Home</a></li>";
	echo"  <li><a href='book_slot.php' >My slots</a></li>";
		echo"  <li><a href='userprofile.php'>Edit Profile</a></li>";
}
else{
  echo "<nav class='navbar navbar-inverse' style='background-color: #3066BA;border-color:#3066BA'>";
    echo "<div class='container-fluid'>";
      echo "<div class='navbar-header'>";
        echo "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>";
          echo "<span class='icon-bar'></span>";
          echo "<span class='icon-bar'></span>";
          echo "<span class='icon-bar'></span>";
        echo "</button>";
        echo "<a class='navbar-brand' href='#' style=\"font-family: 'Montserrat', sans-serif;\"><i class='fas fa-users'></i>&nbsp;&nbsp;BUSYFREE APP</a>";

      echo "</div>";
      echo "<div class='collapse navbar-collapse' id='myNavbar'>";
        echo "<ul class='nav navbar-nav'>";
	echo"  <li><a href='shop_home.php'>Home</a></li>";
	echo"  <li><a href='book_slot.php' >Customer slots</a></li>";
	echo"  <li><a href='shop_index.php'>Edit Profile</a></li>";
}
?>

  </ul>
  <ul class="nav navbar-nav navbar-right">

    <li><a href="login.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
  </ul>
  </div>
  </div>
  </nav>

  <div class="container-fluid">
  <div class='col-md-12'>
      <b><h4 style="color:#000;float:right;font-family: 'Montserrat', sans-serif;"> WELCOME <?php echo $_SESSION['email'];?> !</h4></b>
  </div>
  </div>