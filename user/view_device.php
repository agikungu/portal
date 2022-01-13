<?php
	include '../config/database.php';
	include 'includes/header.php';
?>
		<!-- Begin Page Content -->
        <div class="container-fluid ">
		<!-- DataTales Example -->
          <div class="card shadow mb-4 ">
		  <div class="card-header py-3 ">
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb font-weight-bold m-0">
  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="device_list.php">Devices</a></li>
    <li class="breadcrumb-item active" aria-current="page">Preview Device</li>
  </ol>
</nav>  
      </div>
      <div class="card-body">
      <?php
					//code ya ku display a  device details
                    //$email_id=$_SESSION["email_id"];
                    //$email_id=2;
                    $device_code=$_GET["device_code"];

					$rs1=mysqli_query($cn,"select * from milk_status WHERE device_code='$device_code'");
					$i=1;
					while($row=mysqli_fetch_array($rs1))
					{
            $code=$row['device_code'];
            $temperature=$row['temperature'];
            $ph=$row['ph'];
            $conductivity=$row['conductivity'];

                    }
						
					?>	
   <div class="row">
    <div class="col-md-2 mb-3">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Temperature</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ph</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#conductivity" role="tab" aria-controls="profile" aria-selected="false">Conductivity</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="contact" aria-selected="false">ID</a>
  </li>
</ul>
    </div>
    <!-- /.col-md-4 -->
        <div class="col-md-2">
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <p><?php echo $temperature;?></p>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <p><?php echo $ph;?></p>
  </div>
  <div class="tab-pane fade" id="conductivity" role="tabpanel" aria-labelledby="profile-tab">
    <p><?php echo $conductivity;?></p>
  </div>

  <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="contact-tab">
    <p><?php echo $device_code;?></p>
  
  </div>
</div>
    </div>
    <!-- /.col-md-8 -->
    <div class="col-md-8 mb-3">
<!--Google map-->
<div id="map-container-google-3" class="z-depth-1-half map-container-3">
   <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1LvGstT16WHaVYL8YLYXPklnX_EqUNHgh"width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
    
</div>
  </div>
 
  
  

          </div>

</div>
<!-- /.container-fluid -->
<?php
	include 'includes/footer.php';
?>