<?php
include_once 'config/database.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Customer Sign up</h2>
                        <?php
                         echo errormessage(); 
                         echo successmessage(); 
     
					?>
                        <form method="POST" class="register-form" id="register-form" action="user_process.php">
                        <div class="form-group">
                             

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="First and Last name" required />
								<span id="error_name" style="color:red;"></span>
                            </div>
							<div class="form-group">
                                <label for="email_id"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email_id" id="email_id" placeholder="Email Id" required / >
								
                            </div>
							
							 <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input  name="phone" type="tel" minlength="10" maxlength="10" id="phone" placeholder="Phone"  required />
								<span id="error_phone" style="color:red;"></span>
                             </div>

                             
							 <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-home"></i></label>
                                <input  name="city" type="text" id="phone" placeholder="City"  required />
								<span id="error_phone" style="color:red;"></span>
                             </div>
                             
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"  required />
                            </div>
							<span><i class="zmdi zmdi-eye" id="show_password"></i>Show Password</span>
							
                            <div class="form-group form-button">
                                <input type="submit" name="save" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <a href="login.php" class="signup-image-link">I am already member</a>
						
                    </div>
                </div>
            </div>
        </section>
		</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
    <script src="js/main.js"></script>
	
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>