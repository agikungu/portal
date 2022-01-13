<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
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
                        <h2 class="form-title">Agent Sign up</h2>
						<?php
					if(count($_GET)>0){
						echo "<span style='color:green;text-align:center;'>Mobile Number or Email Id already exsit</span>";
					}
					?>
                        <form method="POST" class="register-form" id="register-form" action="process.php">
						   
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name" required />
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
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
						
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