
<?php
//if databse.php is included then there is a conflict of sessions
  include '../config/database.php';


	include 'includes/header.php';
?>
    <?php
    if (isset($_GET["id"])) {
        $idfromurl=$_GET["id"];
 
      $queryview="UPDATE device_notification SET seen='YES' WHERE id='$idfromurl'";
      $execute=mysqli_query($cn,$queryview);
    }    
    ?>
	<?php
					//code ya ku fetch comments
					$email_id=$_SESSION["email_id"];
					$rs=mysqli_query($cn,"select * from device_notification  WHERE  id='$idfromurl'");
				
					while($row=mysqli_fetch_array($rs))
					{
                        $date=$row['date'];
                        $message=$row['message'];
                        $sender=$row['sender'];

                    }
						
					?>	
					   

    <div class="container">
    <div class="card">
    <div class="card-header">
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb font-weight-bold m-0">
  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="notification.php">Notifications</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Message</li>
  </ol>
</nav>  
    </div>  
    <div class="card card-body">
<h4 class="card-title"><?php echo $date;?></h4>
<p class="card-text"><?php echo $message;?></p>
<a href="notification.php" class="btn btn-primary btn-sm">Back</a>
<br>
<div class="card-footer text-muted">
<?php echo $sender;?>
  </div>
</div> 
</div>  
    </div>










    <?php
	include 'includes/footer.php';
?>