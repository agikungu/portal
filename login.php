<?php
include("config/database.php");
extract($_POST);
if(isset($signin))
{
	$pass=md5($pass);
	$check=mysqli_query($cn,"select * from mst_user where email_id='$email_id' and password='$pass'");
	$row = mysqli_fetch_array($check);
	if(mysqli_num_rows($check)>0)
	{
		$_SESSION["email_id"]=$email_id;
		$_SESSION["user_id"]=$row['user_id'];
		$_SESSION["name"]=$row['name'];
	}
	else
	{
   
        $_SESSION["errormessage"]="invalid credentials";

	}
}
if (isset($_SESSION["user_id"]))
{
    $admin="alekskaggz@gmail.com";

    if ($_SESSION["email_id"]==$admin) {
      $_SESSION['admin']=true;
      header("Location: admin/dashboard.php");
      
    }else {
        
        header("Location: user/dashboard.php");
   

    }

    


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Portal | Login</title>
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
            <img src="images/users2.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="images/hewlogo.png" alt="logo" class="center-block">
              </div>
               
              <p class="login-card-description">User Login</p>
              <form method="POST">
                  <div class="form-group">
                  <?php                                  
                    echo errormessage(); 
                    echo successmessage(); 

                    ?>
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input required type="email" name="email_id" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input reuired type="password" name="pass" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input name="signin" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                  <a href="index.php"  class="btn btn-block login-btn mb-4 bg-info" role="button" >Back</a>
                </form>
                <!--
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                -->
                <p class="login-card-footer-text">Don't have an account? <a href="user_signup.php" class="text-reset">Register here</a></p>
                <nav class="login-card-footer-nav">
               
                </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);

</script> 
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
