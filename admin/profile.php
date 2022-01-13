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
            <div class="row">
			     <div class="col-md-10">
					
					  <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
					
				 </div>
				 
			</div>
			</div>
            <div class="card-body">
				<div class="alert alert-danger alert-dismissible" id="success" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				</div>
				<?php
						if($_GET['status']==200)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong>Profile Updated Successfully 
							</div>
						<?php
							}
						?>

				<div class="table-responsive">
			
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Contact No</th>
<th>city</th>

</tr>

</thead>
					
					<tbody>
					<?php

$user_id = $_SESSION["user_id"];
$rs=mysqli_query($cn,"select * from login_user WHERE user_id= $user_id");
$i=1;
while($row=mysqli_fetch_array($rs))
{

?>
					    <tr>
						
						  <td><?php echo $row['name'];?></td>
					
						  <td><?php echo $row['email_id'];?></td>
					
						  <td><?php echo $row['phone'];?></td>
						  <td><?php echo $row['city'];?></td>
						</tr>
						
						<tbody>
					</table>
						<input type="hidden" class="form-control" name="mode" value="1">
						<p align="center"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateModal" 
						    data-username="<?php echo $row['name'];?>"
							data-useremail="<?php echo $row['email_id'];?>"
							data-userphone="<?php echo $row['phone'];?>"
							data-usercity="<?php echo $row['city'];?>"
							
							
							data-id="<?php echo $row['user_id'];?>"><i class="fa fa-edit"></i>&nbsp;Edit</button></p>
						
						
					    <?php
						$i++;
						}
						?>
					</form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<!-- Edit Modal-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
		<form method="post" action="process.php">
        <div class="modal-body">
					<div class="form-group">
					  <label for="email">Name:</label>
					  <input type="text" class="form-control" id="user_name_u" placeholder="Enter your Name" name="name">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" class="form-control" id="user_email_u" placeholder="Enter your Email" name="email_id" >
					</div>
					<div class="form-group">
					  <label for="number">Phone:</label>
					  <input type="text" class="form-control" id="user_phone_u" placeholder="" name="phone">
					</div>
					<div class="form-group">
					  <label for="number">City:</label>
					  <input type="text" class="form-control" id="user_city_u" placeholder="" name="city">
					</div>
					<input type="hidden" class="form-control" id="user_id_u" name="user_id" >
					<input type="hidden" class="form-control" id="mode" name="mode" value="2">
		</div>
		
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="save">Update</button>
        </div>
		</form>
      </div>
    </div>
  </div>	  
	  
<?php
	include 'includes/footer.php';
?>
<script>
$(function () {
	$('#updateModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var username = button.data('username');
		var useremail = button.data('useremail');
		var userphone = button.data('userphone');
		//var usercontacttwo = button.data('usercontacttwo');
		var usercity = button.data('usercity');
		var id = button.data('id');
		var modal = $(this);
		modal.find('#user_name_u').val(username);
		modal.find('#user_email_u').val(useremail);
		modal.find('#user_phone_u').val(userphone);
	//	modal.find('#user_contact_u').val(usercontacttwo);
		modal.find('#user_city_u').val(usercity);
		modal.find('#user_id_u').val(id);
});
});
</script>