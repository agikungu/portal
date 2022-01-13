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
              <h6 class="m-0 font-weight-bold text-primary">Add Device</h6>
            </div>
            <div class="card-body">
				<div class="container">
						<?php
						if($_GET['status']==200)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> Device Added Successfully.
							</div>
						<?php
							}
						?>
						<?php
						if($_GET['status']==201)
							{
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong> Device Already Exists.
							</div>
						<?php
							}
						?>

<?php
$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$numbers = rand(1000000, 9999999);
$prefix = "HB";
$sufix = $letters[rand(0, 25)];

$random_string = $prefix . $numbers . $sufix;
echo $string; // printed "B74099731P" in my case

?>


				<form id="register_form" name="form1" method="post" action="add_device_a.php" >
				<div class="form-group">
					  <label for="Name">Device Code:</label>
					  <input type="text" maxlength="10" class="form-control" id="email" value="<?php echo $random_string; ?>" name="code" required>
					</div>
					<div class="form-group">
					  <label for="Name">Device Name:</label>
					  <input type="text" class="form-control" id="visitor_name" placeholder="Name" name="name" required>
					</div>
				
					<div class="form-group">
					  <label for="Name">Description:</label>
						<textarea class="form-control" name="description" id="Phone" required></textarea>
					</div>

					<div class="form-group">
					  <label for="Name">Capacity:</label>
					  <input type="number" class="form-control" id="capacity" placeholder=" Capacity In Litres" name="capacity" required>
					</div>
				
					<div class="form-group">
					  <label for="Name">Gps Cordinates:</label>
					  <input type="text" class="form-control" id="capacity" placeholder="Paste Cordinates here" name="gps" required>
					</div>
					<br>
					<div class="form-group">
					

					  <label for="Name"><h4><span class="badge badge-primary">Activate</span></h4></label>
					  <label class="switch">
								<input type="checkbox"  name="status" value="1" >
								<span class="slider round"></span>
								</label>
					</div>
					<input type="hidden" class="form-control" name="mode" value="1">
					<p align="center"><button type="submit" class="btn btn-primary" id="butsave">Add Device</button></p>
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