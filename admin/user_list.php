<?php
	include '../config/database.php';
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
    <li class="breadcrumb-item active" aria-current="page">Users</li>
  </ol>
</nav> 	
			</div>
            <div class="card-body">
				<div class="alert alert-danger alert-dismissible" id="success" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				</div>
				<?php
					 echo errormessage(); 
					 echo successmessage(); 
 
						?>
						<div class="table-responsive">
						<table id="example" class="table table-striped table-hover text-nowrap">
                  <thead>
                    <tr>
					  <th>List No</th>
					  <th>Devices</th>
					  <th>Name </th>
					  <th>Email</th>
					  <th>Phone</th>
					  <th>City</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					$rs=mysqli_query($cn,"select * from mst_user");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
						
					?>	
					                    
                    <tr>
					  <td><?php echo $i;?></td>
                      <td>						  
					  <?php?>
					  <?php
					  $email_id= $row['email_id'];
				//  $count_device="SELECT COUNT(*) FROM devices";
				  $count_device="SELECT COUNT(*) FROM devices_user WHERE device_user='$email_id'";

                  $executecountdevice=mysqli_query($cn,$count_device);
                  $rowsdevice=mysqli_fetch_array($executecountdevice);
				  $totaldevice=array_shift( $rowsdevice);
				  if ($totaldevice>0) {
					echo $totaldevice;
					
				  }else {
					echo "none";
				  }
				  
                   ?>
					
					</td>
                      <td><?php echo $row['name'];?></td>
					  <td><?php echo $row['email_id'];?></td>
					  <td><?php echo $row['phone'];?></td>
					  <td><?php echo $row['city'];?></td>
					  
					  
					  <td>
							<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal" 
							data-devicecode="<?php echo $totaldevice;?>"
							data-username="<?php echo $row['name'];?>"
							data-useremail="<?php echo $row['email_id'];?>"
							data-userphone="<?php echo $row['phone'];?>"
							data-usercity="<?php echo $row['city'];?>"
							data-password="<?php echo $row['password'];?>"
							data-id="<?php echo $row['user_id'];?>"
							><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row['user_id'];?>"><i class="fa fa-trash"></i></button>
						  
					  </td>
                    </tr>
					<?php
					$i++;
					}
					?>
					</tbody>
                </table>
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
		<form method="post" action="add_user_a.php">
        <div class="modal-body">
		<div class="form-group">
					  <label for="email">Devices:</label>
					  <input disabled type="text" class="form-control" id="code_u" placeholder="Devices" name="code">
					</div>
					<div class="form-group">
					  <label for="email">Name:</label>
					  <input type="text" class="form-control" id="name_u" placeholder="Name" name="name">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" class="form-control" id="email_u" placeholder="Email" name="email_id">
					</div>
					<div class="form-group">
					  <label for="email">Phone:</label>
					  <input type="text" class="form-control" id="phone_u" placeholder="Phone" name="phone" maxlength="12">
					</div>
					<div class="form-group">
					  <label for="email">City:</label>
					  <input type="text" class="form-control" id="city_u" placeholder="City" name="city">
					</div>
					<div class="form-group">
					  <label for="email">Password:</label>
					  <input type="text" class="form-control" id="password_u" placeholder="Password" name="password">
					</div>
					<input type="hidden" class="form-control" id="user_id_u" name="user_id" >
					<input type="hidden" class="form-control" id="mode" name="mode" value="2">
		</div>
		
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
		</form>
      </div>
    </div>
  </div>	  
	  
<?php
	include 'includes/footer.php';
?>
<script>
$(document).ready(function() {
	$(document).on("click", ".delete", function() {
		var id=$(this).attr("data-id");
		var $ele = $(this).parent().parent();
		var checkstr =  confirm('are you sure you want to delete this?');
		if(checkstr == true){
			$.ajax({
				url: "ajax/delete_user.php",
				type: "POST",
				cache: false,
				data:{
					type: 2,
					id: id
				},
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$ele.fadeOut().remove();
						$("#success").show();
						$('#success').html('User Deleted Successfully !'); 
					}
				}
			});
		}
		else{
			return false;
		}
	});
});
$(function () {
	$('#updateModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var devicecode = button.data('devicecode');
		var username = button.data('username');
		var useremail = button.data('useremail');
		var userphone = button.data('userphone');
		var usercity = button.data('usercity');
		var password = button.data('password');
		var id = button.data('id');
		var modal = $(this);
		modal.find('#code_u').val(devicecode);
		modal.find('#name_u').val(username);
		modal.find('#email_u').val(useremail);
		modal.find('#phone_u').val(userphone);
		modal.find('#city_u').val(usercity);
		modal.find('#password_u').val(password);
		modal.find('#user_id_u').val(id);
});
});
</script>

