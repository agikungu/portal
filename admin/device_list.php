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
    <li class="breadcrumb-item active" aria-current="page">Devices</li>
  </ol>
</nav> 	 
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
				<table id="example" class="table table-striped table-hover text-nowrap">
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Device Name </th>
					  <th>Batch code</th>
					  <th>Status</th>
                      <th>sales</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					
					$rs=mysqli_query($cn,"select * from devices ORDER BY date desc");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
						
					?>	
					                    
                    <tr>
					  <td><?php echo $i;?></td>
                      <td>
					  <a href="view_device.php?device_code=<?php echo $row['device_code'];?>"> 
					  <?php echo $row['device_name'];?>
					</a>
				</td>
					  <td><?php echo $row['device_code'];?></td>
						 <!--display on off button-->
                      <!--<td><?php	// echo $row['status'];?></td>-->
					  <td>
					   <label class="switch">
								<input type="checkbox"name="status" value="1"
								<?php
								$status=$row['status'];	
								?>
								 <?php if($status==1) { ?> checked="checked" <?php } ?>
								 disabled
								 >
								<span class="slider round"></span>
								</label>			</td>
								<td>
					  <a href="device_sales.php?device_code=<?php echo $row['device_code'];?>">

<button type="button" class="btn btn-primary btn-sm">
<i class="fas fa-chart-line"></i>

</button>
</a>
					  </td>


					  
					  
					  <td>
					 
					<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal" 
							data-devicename="<?php echo $row['device_name'];?>"
							data-devicecode="<?php echo $row['device_code'];?>"
							data-description="<?php echo $row['device_description'];?>"
							data-capacity="<?php echo $row['capacity'];?>"
							data-status="<?php echo $row['status']; $status=$row['status'];?>"
							data-gps="<?php echo $row['gps'];?>"
							data-id="<?php  echo $row['id'];?>"
							><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash"></i></button>
						  
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Device</h5>
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
					  <input disabled type="text" class="form-control" id="device_code_u" placeholder="Batch Code" name="code">
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
					  <label  for="email">Status:</label>
					  <input type="number" class="form-control" id="status_u" placeholder="status" name="status" max="1" Min="0">
				
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
  $('#status_u').focusout(function() {
    var max = $(this).val();
    if (max > 1) {
      $(this).val("1");
      alert("Maximum is 1");
    }
  });

});

</script>
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