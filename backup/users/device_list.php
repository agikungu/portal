<?php
	include '../config/database.php';
	include 'includes/header.php';
?>
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
		  <div class="card-header py-3">
            <div class="row">
			     <div class="col-md-10">
					
					  <h6 class="m-0 font-weight-bold text-primary">Devices</h6>
					
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
								<strong>Success !</strong>Device Updated Successfully 
							</div>
						<?php
							}
						?>
				<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Device Name </th>
					  <th>Batch code</th>
					  <th>Capacity(liters)</th>
					  <th>Status</th>
                      <th>Gps</th>                      
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					//code ya ku display a single persons devices
					$email_id=$_SESSION["email_id"];
					$postidforcomments=$_GET["id"];

					$rs=mysqli_query($cn,"select * from devices_user WHERE device_user='$email_id'");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
						
					?>	
					                    
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php echo $row['device_name'];?></td>
					  <td><?php echo $row['device_code'];?></td>
					  <td><?php echo $row['capacity'];?></td>
                      <td><?php echo $row['status'];?></td>
                      <td><?php echo $row['gps'];?></td>


					  
					  
					  <td>
							<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal" 
							data-devicename="<?php echo $row['device_name'];?>"
							data-devicecode="<?php echo $row['device_code'];?>"
							data-description="<?php echo $row['device_description'];?>"
							data-capacity="<?php echo $row['capacity'];?>"
							data-status="<?php echo $row['status'];?>"
							data-gps="<?php echo $row['gps'];?>"
							data-id="<?php echo $row['id'];?>"
							><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash"></i></button>
							<a href="view_device.php?device_code=<?php echo $row['device_code'];?>"><i class="fas fa-eye"></i></a>

						  
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
		<form method="post" action="add_device_a.php">
        <div class="modal-body">
					<div class="form-group">
					  <label for="email">Device Name:</label>
					  <input type="text" class="form-control" id="device_name_u" placeholder="Name" name="name">
					</div>
					<div class="form-group">
					  <label for="email">Device code:</label>
					  <input type="text" class="form-control" id="device_code_u" placeholder="Batch Code" name="code">
					</div>
					<div class="form-group">
					  <label for="email">Description:</label>
                      <textarea class="form-control" name="description" id="description_u" required></textarea>

					</div>
					<div class="form-group">
					  <label for="email">Capacity:</label>
					  <input type="number" class="form-control" id="capacity_u" placeholder="capacity" name="capacity">
					</div>
                    <div class="form-group">
					  <label for="email">Status:</label>
					  <input type="number" class="form-control" id="status_u" placeholder="status" name="status">
					</div>
                    <div class="form-group">
					  <label for="email">Gps:</label>
					  <input type="text" class="form-control" id="gps_u" placeholder="cordinates" name="gps">
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
				url: "ajax/delete_device.php",
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
						$('#success').html('Security Deleted Successfully !'); 
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
		var devicename = button.data('devicename');
		var devicecode = button.data('devicecode');
		var description = button.data('description');
		var capacity = button.data('capacity');
		var status = button.data('status');
		var gps = button.data('gps');
		var id = button.data('id');
		var modal = $(this);
		modal.find('#device_name_u').val(devicename);
		modal.find('#device_code_u').val(devicecode);
		modal.find('#description_u').val(description);
		modal.find('#capacity_u').val(capacity);
        modal.find('#status_u').val(status);
        modal.find('#gps_u').val(gps);
		modal.find('#user_id_u').val(id);
});
});
</script>
