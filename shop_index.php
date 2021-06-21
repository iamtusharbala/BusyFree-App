<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<!-- Font Icon -->
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
	<title>BusyFree | Edit Profile</title>

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

echo"<div class='container'>";
$query="select * FROM shop WHERE id='$_SESSION[user_id]'  ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

?>


<div class='col-md-8'>
	<div class="">
		<h2 class="form-title"> Shop Update</h2>
		<form action='' method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name"><i class="fas fa-user"></i></label>
					<input type="text" name="name" id="name" placeholder="Your Name"
						value='<?php echo $row['shop_name']; ?>' required />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email"><i class="fas fa-map-marker-alt"></i></label>
					<input type="text" name="address" id="email" placeholder="Your Address"
						value='<?php echo $row['address']; ?>' />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email"><i class="fas fa-map-pin"></i></label>
					<input type="text" name="map_link" id="email" placeholder="Your Map link"
						value='<?php echo $row['map_link']; ?>' required />
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="email"><i class="zmdi zmdi-email"></i></label>
					<input type="email" name="email" id="email" placeholder="Your Email" required
						value='<?php echo $row['email']; ?>' />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="name"><i class="fas fa-phone"></i></label>
					<input type="text" name="phone" id="name" placeholder="Your Phone" pattern="[5|6|7|8|9][0-9]{9}"
						required value='<?php echo $row['phone']; ?>' />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">

					<label for="email"><i class="fas fa-image"></i></label>
					<input type="file" name="uploadedfile" id="email" placeholder="Shop Image" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="pass"><i class="fas fa-key"></i></label>
					<input type="password" name="password" id="pass" placeholder="Password" required
						value='<?php echo $row['password']; ?>' />
				</div>

			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="email"><i class="fas fa-stopwatch-20"></i></label>
					<br>
					<input type="text" name="people_count" id="email" placeholder="Person count"
						value='<?php echo $row['people_count']; ?>' />
				</div>
			</div>
			<div class="col-md-6">
				<h4>Containment zone</h4>
				<div class="form-group">

					<select id="your_pass" name="containment_zone" class="form-control">
						<option> <?php echo $row['containment_zone'];?> </option>
						<option>YES</option>
						<option>NO</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<h4>Availability</h4>
				<div class="form-group">

					<select id="your_pass" name="avilablity" class="form-control">

						<option> <?php echo $row['avilablity']; ?> </option>
						<option>YES</option>
						<option>NO</option>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group form-button">
					<input type="submit" name="signup" id="signup" class="form-submit" value="Update" />
				</div>
			</div>
		</form>
	</div>
</div>

<div class='col-md-4'>
	<br> <br>
	<br>
	<img src="<?php echo $row['image']; ?>" class="img img-responsive" />

</div>



<?php	
	
	

echo"</div>";



  