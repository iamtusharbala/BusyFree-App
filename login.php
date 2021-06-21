<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BusyFree | Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
include("header1.php");
    session_start();
?>

<body>

    <div class="main">
        <!-- Login Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image text-center">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <button type="button" class="btn btn-primary btn-lg" style="background-color: #1B8BBB;border:none;">
                            <a href="reg.php" class="signup-image-link">Create a user</a>
                        </button>
                        <button type="button" class="btn btn-primary btn-lg" style="background-color: #3066BA;border:none;">
                            <a href="reg1.php" class="signup-image-link">Create a shop</a>
                        </button>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form" action="login_check.php">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Enter email" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Enter password" required/>
                            </div>
                            <div class="form-group">
                                <select required id="your_pass" name="type" class="form-control" >
                                    <option value="">Select account Type</option>
                                    <option value="Shop">Shop</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <?php
                    if(isset($_SESSION["error"])){
                        echo '<div class="alert alert-danger" role="alert">
                                Invalid username or password
                        </div>';
                    }
                ?>  
                            <div class="form-group form-button">
                                <input type="submit" style="background-color:#FF9F3F" name="signin" id="signin"
                                    class="form-submit" value="LOGIN" />
                            </div>
                      
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<?php
    unset($_SESSION["error"]);
?>

