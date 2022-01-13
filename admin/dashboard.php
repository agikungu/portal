<?php
	include '../config/database.php';
    include 'includes/header.php';
?>

 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
            <?php if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) { ?>
          Admin's
          <?php } ?>
            Dashboard</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- Content Row --> 
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
					<a href="#">

                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
					  Notifications
					  <?php
									   $email_id=$_SESSION["email_id"];
								
				   

                  $count_notification="SELECT COUNT(*) FROM device_notification WHERE seen='NO' AND device_user='$email_id'";
                  $executecountnotification=mysqli_query($cn,$count_notification);
                  $rowsnotification=mysqli_fetch_array($executecountnotification);
                  $totalnotification=array_shift( $rowsnotification);                   
                   ?>  
				   					  <?php if($totalnotification>0){ ?>
                   <span class="badge badge-pill badge-warning mb-2"style="font-size:12px;">
                     <?php echo $totalnotification;?>
                     </span>
					  
										 <?php  } ?>
					  
					  
					  
					   </div>

					  
					  </a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      <a href="agent_list.php">
                      Agents&nbsp;
                      <?php
                  $count_agent="SELECT COUNT(*) FROM login_user";
                  $executecountagent=mysqli_query($cn,$count_agent);
                  $rowsagent=mysqli_fetch_array($executecountagent);
                  $totalagent=array_shift( $rowsagent);                   
                   ?>  
                   <span class="badge badge-pill badge-info mb-2"style="font-size:12px;">
                     <?php echo $totalagent;?>
                     </span>
                     </a>                        
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-secret fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
         <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      <a href="user_list.php">
                      Users&nbsp;
                      <?php
                  $count_users="SELECT COUNT(*) FROM mst_user";
                  $executecountusers=mysqli_query($cn,$count_users);
                  $rowsusers=mysqli_fetch_array($executecountusers);
                  $totalusers=array_shift( $rowsusers);                   
                   ?>  
                   <span class="badge badge-pill badge-info mb-2"style="font-size:12px;">
                     <?php echo $totalusers;?>
                     </span>
                     </a>                        
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      <a href="device_list.php">
                      Devices&nbsp;
                      <?php
                  $count_device="SELECT COUNT(*) FROM devices";
                  $executecountdevice=mysqli_query($cn,$count_device);
                  $rowsdevice=mysqli_fetch_array($executecountdevice);
                  $totaldevice=array_shift( $rowsdevice);                   
                   ?>  
                   <span class="badge badge-pill badge-info mb-2"style="font-size:12px;">
                     <?php echo $totaldevice;?>
                     </span>
                     </a>                        
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
		

         
			
			
			
	</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
   include 'includes/footer.php';
?>
