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
    <li class="breadcrumb-item active" aria-current="page">Add device</li>
  </ol>
</nav>            </div>
            <div class="card-body">
				<div class="container">
						<?php
					 echo errormessage(); 
					 echo successmessage(); 
 
						?>
				<form id="register_form" name="form1" method="post" action="add_device_a.php" >
				<div class="form-group">
					  <label for="Name">Device Code:</label>
					  <input type="text" class="form-control" id="email" placeholder="##########" name="code" required>
					</div>	
				

				
				
					<input type="hidden" class="form-control" name="mode" value="1">
					<p align="center"><button type="submit" class="btn btn-primary" id="butsave">
					<i class="fa fa-plus-circle" aria-hidden="true"></i>

					Add Device</button></p>
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