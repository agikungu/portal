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
    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
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

<?php
                   					$email_id=$_SESSION["email_id"];


	





                  $count_notification="SELECT COUNT(*) FROM device_notification WHERE seen='NO' AND device_user='$email_id'";
                  $executecountnotification=mysqli_query($cn,$count_notification);
                  $rowsnotification=mysqli_fetch_array($executecountnotification);
                  $totalnotification=array_shift( $rowsnotification);                   
                   ?>  
				   					  <?php if($totalnotification>0){ ?>
                  
					  
										
					  
				<div class="table-responsive">
                <table class="table table-striped table-hover text-nowrap" id="" width="100%" cellspacing="0">
                <caption>Unread messages</caption>
                  <thead>
				  <tr colspan="4">
				  <center>
				  UNREAD MESSAGES
				  </center>
				  </tr>

                    <tr>
					 <th>Sl No</th>
					  <th>Device </th>
					  <th>Date</th>
					  <th>Message</th>
                    

			        </tr>
                  </thead>
                  <tbody>
					<?php
					//code ya ku display a single persons devices
					$email_id=$_SESSION["email_id"];
					$rs=mysqli_query($cn,"select * from device_notification  WHERE seen='NO' AND device_user='$email_id' ORDER BY date desc");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
                        $id=$row['id'];
						
					?>	
					                    
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php echo $row['device_code'];?></td>

                      <td><?php echo $row['date'];?></td>

                      
                      <td>
					 
					  <a class="text-info" href="read_notification.php?id=<?php echo $id;?>"> 
                       <i class="fas fa-envelope"></i>&nbsp;
                            <?php
                            $message=$row['message'];
                            if (strlen($message)>10) 
                                {
                                $message=substr($message,0,10).'...' ; 
                                }
                            
                            
                            
                            echo $message; ?></a>
 </td>


                    </tr>
					<?php
					$i++;
					}
					?>
					</tbody>
                </table>
			  
            </div>
  
            <?php  } ?>
     
    <hr>
        
		
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
                <table class="table table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                <caption>Read Messages</caption>
                  <thead>
				  <tr colspan="4">
				  <center>
				  VIEWED MESSAGES
				  </center>
				  </tr>

                    <tr>
					  <th>Sl No</th>
					  <th>Device </th>
					  <th>Date</th>
					  <th>Message</th>
					  <th>Action</th>
                

			        </tr>
                  </thead>
                  <tbody>
					<?php
					//code ya ku display a single persons devices
					$email_id=$_SESSION["email_id"];
					$rs=mysqli_query($cn,"select * from device_notification  WHERE seen='YES' AND device_user='$email_id' ORDER BY date desc");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
                        $id=$row['id'];
						
					?>	
					                    
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php echo $row['device_code'];?></td>

                      <td><?php echo $row['date'];?></td>

                      
                      <td>
					 
					  <a class="text-dark" href="read_notification.php?id=<?php echo $id;?>">
                            <i class="fas fa-envelope-open"></i>&nbsp;
                            <?php
                            $message=$row['message'];
                            if (strlen($message)>10) 
                                {
                                $message=substr($message,0,10).'...' ; 
                                }
                            
                            
                            
                            echo $message; ?></a>
 </td>
				<td><button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash"></i></button>
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
				url: "ajax/delete_message.php",
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
						$('#success').html('Message Deleted Successfully !'); 
					}
				}
			});
		}
		else{
			return false;
		}
	});
});



</script>