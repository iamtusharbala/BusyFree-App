<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BusyFree | Shop Home</title>


    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
//error_reporting(0);
session_start();
include("connection.php");
if(isset($_POST['signup']))
{
	$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

$shop_name=$_POST['name'];
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
{

$query = "UPDATE  shop SET shop_name='$_POST[name]',address='$_POST[address]' ,email='$_POST[email]', phone='$_POST[phone]', map_link='$_POST[map_link]', password='$_POST[password]',image='$target_path',people_count='$_POST[people_count]',avilablity='$_POST[avilablity]',containment_zone='$_POST[containment_zone]' WHERE id='$_SESSION[user_id]'";
}
else
{

$query = "UPDATE  shop SET shop_name='$_POST[name]',address='$_POST[address]' ,email='$_POST[email]', phone='$_POST[phone]', map_link='$_POST[map_link]', password='$_POST[password]',people_count='$_POST[people_count]',avilablity='$_POST[avilablity]',containment_zone='$_POST[containment_zone]' WHERE id='$_SESSION[user_id]'";

}


	$res=mysqli_query($con,$query);
	if($_POST['avilablity']=="YES")
	{
	include('mail.php');
	}
}
include("header.php");

echo"<br> <br> <div class='container'>";
$query="select * FROM shop WHERE id='$_SESSION[user_id]'  ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

?>
<br>

<body>
    <div class="container-fluid">
        <div class="details">
            <div class="row">
                <div class="col-lg-4">
                    <h2
                        style="text-transform: uppercase;font-family: 'Montserrat', sans-serif;  font-size: 430%; margin-left:auto;margin-right:auto;">
                        <?php echo $row['shop_name']; ?></h2>
                    <h4 style="font-family: 'Montserrat', sans-serif;font-size: 125%;"><i
                            class="fas fa-map-marked">&nbsp;&nbsp;</i><?php echo $row['address']; ?></h4>
                    <h5 style="font-family: 'Montserrat', sans-serif;"><i
                            class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;<?php echo $row['phone']; ?></h5>
                </div>
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <img src="<?php echo $row['image']; ?>" class="img img-responsive" width="80%" height="200" /></div>
            </div>
        </div>
        <div class="row">
            <div class="details" style="text-align:left; margin-left:auto;margin-right:auto;">
            <div class="col-lg-4">
                
                <h4> <?php
    if ($row['avilablity']== 'NO'){
        echo "<button type=\"button\" class=\"btn btn-danger\">AVAILABILITY : NO</button>";
    }else{
        echo "<button type=\"button\" class=\"btn btn-success\">AVAILABILITY : YES</button>";
    }
    ?> </h4>
                <h4> <?php
    if ($row['containment_zone']== 'NO'){
        echo "<button type=\"button\" class=\"btn btn-success\">NOT INSIDE CONTAINMENT ZONE</button>";
    }else{
        echo "<button type=\"button\" class=\"btn btn-danger\">INSIDE CONTAINMENT ZONE</button>";
    }
    ?> </h4>
    </div>
    <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <iframe
                    src=<?php echo $row['map_link']?>
                    width="100%" height="200" frameborder="0" style="border:0">
            </div>
        </div> <br>
        <br>
    </div>
</body>