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
		  <nav aria-label="breadcrumb">
  <ol class="breadcrumb font-weight-bold m-0">
    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New User</li>
  </ol>
</nav> 	
			</div>
            <div class="card-body">
				<div class="container">
				<?php
					 echo errormessage(); 
					 echo successmessage(); 
 
						?>
				<form id="register_form" name="form1" method="post" action="add_user_a.php" >
				<div class="form-group">
					  <label for="Name">Device code:</label>
					  <input type="text" class="form-control" id="visitor_name" placeholder="*optional*" name="code">
					</div>
					<div class="form-group">
					  <label for="Name">Name:</label>
					  <input type="text" class="form-control" id="visitor_name" placeholder="Name" name="name" required>
					</div>
					<div class="form-group">
					  <label for="Name">Email:</label>
					  <input type="text" class="form-control" id="email" placeholder="Email" name="email_id" required>
					</div>
					<div class="form-group">
					  <label for="Name">Phone:</label>
					  <input type="text" class="form-control" id="phone" placeholder="Enter Phone No" name="phone" required maxlength="12">
					</div>
					<div class="form-group">
					  <label for="Name">City:</label>
					  <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" required>
					</div>
					<div class="form-group">
					  <label for="Name">Password:</label>
					  <input  required type="password" name="password"   id="myInput" class="form-control" placeholder="***********">
					  <br>
                    <input type="checkbox" onclick="myFunction()"> Show Password
             
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