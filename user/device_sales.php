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
</nav>   <hr>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sales</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Monthly Sales</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Charts</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
<br>

  <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
  <caption>Sales for:&nbsp;<?php  echo $code;?>  </caption>
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Date</th>
					  <th>Stock sold (Litres)</th>
					  <th>Unit Price (Ksh)</th>
					  <th>Total sales</th>
                      </tr>
                  </thead>
                  <tbody>
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
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="table-responsive">
  <table id="example" class="table table-striped table-hover text-nowrap">
        <thead>
            <tr>
                <th>User</th>
                <th>NAme</th>
                <th>Location</th>
                <th>id</th>
                <th>Start date</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
      
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
  </div>
			  
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  onsequat occaecat ullamco amet non eiusmod nostrud dolore irure incididunt
   est duis anim sunt officia. Fugiat velit proident aliquip nisi incididunt nostrud exercitation proident est nisi. Irure magna elit commodo anim ex veniam culpa eiusmod id nostrud sit cupidatat in veniam ad. Eiusmod consequat eu adipisicing minim anim aliquip cupidatat culpa excepteur quis.
   Occaecat sit eu exercitation irure Lorem incididunt nostrud.
  </div>
</div>

<!-- /.container-fluid -->





<?php
	include 'includes/footer.php';
?>