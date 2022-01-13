<?php
	include '../config/database.php';
	include 'includes/header.php';
?>
		<!-- Begin Page Content -->
        <div class="container-fluid ">
		<!-- DataTales Example -->

        <!--

          <div class="card shadow mb-4 ">
		  <div class="card-header py-3 ">
                              
          </div>
          </div>
          -->

      <?php
					//code ya ku display a  device details
                    //$email_id=$_SESSION["email_id"];
                    //$email_id=2;
                    $device_code=$_GET["device_code"];

					$rs1=mysqli_query($cn,"select * from device_data WHERE device_code='$device_code'");
					$i=1;
					while($row=mysqli_fetch_array($rs1))
					{
            $code=$row['device_code'];
            $stock_remaining=$row['stock_remaining'];
            $stock_in=$row['stock_in'];
            // $name=$row['device_name'];
                       // $description=$row['device_description'];
                        //$capacity=$row['capacity'];
                       // $gps=$row['gps'];
                       $status=$row['status'];
                       $sales=$row['sales'];
                    }
						
					?>	
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb font-weight-bold m-0">
  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="device_list.php">Devices</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sales</li>
  </ol>
</nav>  
  <hr>
  
  <div class="table-responsive">
  <table id="example" class="table table-striped table-hover text-nowrap">
  <caption>Sales for:&nbsp;&nbsp;<?php  echo $code;?>  </caption>
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Date</th>
					  <th>Stock sold (Litres)</th>
					  <th>Unit Price (Ksh)</th>
					  <th>Total sales</th>
                      </tr>
                  </thead>
                  <tbody class="table-hover">
					<?php
					//code ya ku display a single persons devices
					//$email_id=$_SESSION["email_id"];
					//$postidforcomments=$_GET["id"];

					$rs=mysqli_query($cn,"select * from device_data WHERE device_code='$device_code'");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
						
					?>	
					                    
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php  echo $row['date'];?>  </td>
					  <td><?php echo $row['stock_sold'];?></td>
					  <td><?php echo $row['unit_price'];?></td>
                      <td><?php echo $row['sales'];?></td>
                  
                    </tr>
					<?php
					$i++;
					}
                    ?>
                   
					</tbody>
                </table>
              </div>
 


</div>

<!-- /.container-fluid -->





<?php
	include 'includes/footer.php';
?>