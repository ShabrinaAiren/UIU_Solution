<?php 
  
  require 'custom_function.php';
  
  if(isset($_GET['edit_school_id'])){
    $edit_school_id = $_GET['edit_school_id'];

    $data = fetch_all_data_usingDB($db,"select * from schools where id = '$edit_school_id'");

  }

  else{
    header("Location: school_list.php");
  }

?>



<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

    

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item">UIU Solution</a>
      <span class="breadcrumb-item active">Update Academics</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
		<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Academics Update</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for updating Academics</p>
          <form action="action.php" method="POST" enctype="multipart/form-data">
            
         
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Academic Name: </label>
                  <input class="form-control" type="text" value="<?= $data['school_name'] ?>" name="school_name" placeholder="Enter school name" required>
                </div>
              </div><!-- col-4 -->
              

             <input type="hidden" name="school_id" value="<?= $data['id'] ?>">
             
            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-success mg-r-5" name="btn-SchoolUpdate">Update Academic</button>
              
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->

          </form>
    </div>      

    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>
  </body>
</html>
