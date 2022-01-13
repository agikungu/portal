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
              <h6 class="m-0 font-weight-bold text-primary">Success</h6>
            </div>
            <div class="card-body">
				
				<p style="text-align:center;font-size:50px;color:green;"><i class="fas fa-check"></i> </p>
				<h3 align="center">Film Submitted Successfully !</h3>
				<br>
					<p align="center"><button type="submit" class="btn btn-success" name="final_save" id="butsave" value="4">Take Print</button></p>		
				
               
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
	  
<?php
	include 'includes/footer.php';
?>
