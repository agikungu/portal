<?php
	include '../config/database.php';
	//include '../config/access.php';
	include 'includes/header.php';
	
?>	
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
            </div>
            <div class="card-body">
				<div class="container">
						<?php
						if($_GET['status']==200)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> User Added Successfully.
							</div>
						<?php
							}
						?>
						<?php
						if($_GET['status']==201)
							{
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong> User already exist.
							</div>
						<?php
							}
						?>
				<form id="register_form" name="form1" method="post" action="add_user_a.php" >
				<div class="form-group">
					  <label for="Name">Device code:</label>
					  <input type="text" class="form-control" id="visitor_name" placeholder="############" name="code" required>
					</div>
					<div class="form-group">
					  <label for="Name">Name:</label>
					  <input type="text" class="form-control" id="visitor_name" placeholder="Name" name="name" required>
					</div>
					<div class="form-group">
					  <label for="Name">Email:</label>
					  <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
					</div>
					<div class="form-group">
					  <label for="Name">Phone:</label>
					  <input type="number" class="form-control" id="phone" placeholder="Enter Phone No" name="phone" required>
					</div>
					<div class="form-group">
					  <label for="Name">City:</label>
					  <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" required>
					</div>
					<input type="hidden" class="form-control" name="mode" value="1">
					<p align="center"><button type="submit" class="btn btn-primary" id="butsave">Create  Visitor</button></p>
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