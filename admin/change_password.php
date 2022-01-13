<?php
include '../config/database.php';
include '../config/access.php';
include 'includes/header.php';
?>
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            </div>
            <div class="card-body">
				<div class="alert alert-danger alert-dismissible" id="success" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				</div>
				     <?php
							if($_GET['status']==202)
								{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong>Password Updated 
							</div>
						<?php
							}
						?>
						
						
						<?php
							if($_GET['status']==201)
							{
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong>Wrong  old password 
								</div>
						<?php
							}
				        ?>  
							<?php
							if($_GET['status']==200)
							{
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong> new password and confirm password do not match
							</div>
						<?php
							}
				        ?>  
							<?php
							if($_GET['status']==203)
							{
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong> Something went wrong. try again later
							</div>
						<?php
							}
				        ?>   
				<div class="table-responsive">
                <form id="register_form" name="form1" class="form" method="post" action="chang_pass_process.php">
					<div class="form-group">
					  <label for="Name">Current Password:</label>
					  <input type="password" class="form-control" name="currentpassword" placeholder="Please fill the current password !" required>
					</div>
					<div class="form-group">
					  <label for="Name">New Password:</label>
					  <input type="password" class="form-control" name="newpassword" placeholder="Please fill the new password !" required>
					</div>
					<div class="form-group">
					  <label for="Name">Confirm Password:</label>
					  <input type="password" class="form-control" name="confirmpassword" placeholder="Please fill the confirm password !" required>
					</div>
					<input type="hidden" class="form-control" name="mode" value="1">
					<p align="center"><button type="submit" class="btn btn-primary" id="butsave">Change Password</button></p>
				</form>
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
