<?php
include_once 'config/database.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Portal | Register</title>
     <!-- Favicon -->
     <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/logincss/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-6">
          <img src="images/hewberegister.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-6">
            <div class="card-body m-6">
              <div class="brand-wrapper">
                <img src="images/hewlogo.png" alt="logo" class="center-block">
              </div>
              <p class="login-card-description">Join US</p>
              <form method="POST"  action="user_process.php" autocomplete="off">
              <div class="form-group">
                  <?php                                  
                    echo errormessage(); 
                    echo successmessage(); 

                    ?>
                  </div>
                  <div class="form-group">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input required type="email" name="email_id" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <label for="name" class="sr-only">Name</label>
                    <input  required type="text" name="name" id="email" class="form-control" placeholder="First and Last name">
                  </div>     <div class="form-group">
                    <label for="number" class="sr-only">Number</label>
                    <input  required id="txtnumber"   type="text" maxlength="12" name="phone" id="email" class="form-control" placeholder="Phone">
                  </div>     <div class="form-group">
                    <label for="city" class="sr-only">city</label>
                    <input  required type="text" name="city" class="form-control" placeholder="Your City">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input  required type="password" name="password"   id="myInput" class="form-control" placeholder="***********">
                    <input type="checkbox" onclick="myFunction()"> Show Password
             
                  </div>
                  <input type="submit" name="save" id="login" class="btn btn-block login-btn mb-4"  value="Register">
                  <a href="index.php"  class="btn btn-block login-btn mb-4 bg-info" role="button" >Back</a>
                </form>
                <p class="login-card-footer-text">Already a member <a href="login.php" class="text-reset">Login here</a></p>
                <nav class="login-card-footer-nav">
            
                </nav>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

 
<script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
<script>
   
    $(function () {
   
   $('#txtnumber').keydown(function (e) {
    var key = e.charCode || e.keyCode || 0;
    $text = $(this); 
    if (key !== 8 && key !== 9) {
        if ($text.val().length === 3) {
            $text.val($text.val() + '-');
        }
        if ($text.val().length === 7) {
            $text.val($text.val() + '-');
        }
   
    }
   
    return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
   })
   });
   /*  */ 
    </script>
          
</html>
