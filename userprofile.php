<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BusyFree | Edit Profile</title>


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

if(isset($_POST['signup']))
{
	$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
{

$query = "UPDATE  registration SET name='$_POST[name]', email='$_POST[email]', phone='$_POST[phone]', password='$_POST[password]',image='$target_path' WHERE id='$_SESSION[user_id]'";
}
else
{
	
$query = "UPDATE  registration SET name='$_POST[name]', email='$_POST[email]', phone='$_POST[phone]', password='$_POST[password]' WHERE id='$_SESSION[user_id]'";

}

	$res=mysqli_query($con,$query);
}

include("header.php");

echo"<div class='container'>";
$query="select * FROM registration WHERE id='$_SESSION[user_id]'  ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

?>


<div class='col-md-8'>
    <div class="">
        <h2 class="form-title"
            style="text-transform: uppercase;font-family: 'Montserrat', sans-serif;  font-size: 300%;\"> User Update
        </h2><br>
        <form action='' method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="name" id="name" placeholder="Your Name" value='<?php echo $row['name']; ?>'
                        required />
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
                    <input type="file" name="uploadedfile" id="email" placeholder="User Image" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="pass" placeholder="Password" required
                        value='<?php echo $row['password']; ?>' />
                </div>

            </div>
<br>
            <div class="col-lg-12 col-md-6">
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
    <br>

</div>



<?php	
	
	

echo"</div>";




  