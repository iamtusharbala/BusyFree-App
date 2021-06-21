<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <title>BusyFree | Book Slot</title>
</head>

<?php
//error_reporting(0);
session_start();
include("connection.php");

include("header.php");

echo"<div class='container'>";


?>

<div class='col-md-6'>
    <div class="">
        <h2 class="form-title" style="font-family: 'Montserrat', sans-serif;  font-size: 300%;"> BOOK SLOT</h2>
        <form action='book_insert.php' method="POST" class="register-form" id="register-form"
            enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">TIME</label><br><br>
                    <input type="hidden" name="shop" id="name" value="<?php echo $_REQUEST['id'];?>" />
                    <input type="time" name="time" id="name" placeholder="Your Time Slot" min="10:30" max="22:00"
                        title="Time valid only 10 am to 2 pm" required />
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group form-button">
                    <input type="submit" name="signup" id="signup" class="form-submit" value="BOOK SLOT" />
                </div>
            </div>
            <br<br><br><br><br><br><br><br><br><br><br>
        </form>
    </div>
</div>




<?php	
	
	

echo"</div>";



  