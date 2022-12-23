<?php require 'd_header.php' ?>

<?php 
  
  require 'custom_function.php';
  
    $user_id = $_SESSION['user_id'];

    $data = fetch_all_data_usingDB($db,"select * from user where id = '$user_id'");
   
?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

    

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item">Inventory</a>
      <span class="breadcrumb-item active">Update Profile</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
		<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Profile Update</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for updating Profile</p>

          <?php

            if(isset($_GET['update']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Profile Updated Successfully!
          </div>
          <?php 
            }
          ?>

          <form action="action.php" method="POST" enctype="multipart/form-data">
            
         
          <div class="form-layout">
            <div class="row mg-b-25">
              
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Name: </label>
                  <input class="form-control" type="text" value="<?= $data['name'] ?>" name="name"  required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Contact: </label>
                  <input class="form-control" type="text" value="<?= $data['contact'] ?>" name="contact"  required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Official ID: </label>
                    <input class="form-control" type="text" value="<?= $data['official_id'] ?>" name="official_id">
                  </div>
                </div><!-- col-4 -->

              <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Designation: </label>
                    <input class="form-control" type="text" value="<?= $data['designation'] ?>" name="designation">
                  </div>
                </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: </label>
                  <input class="form-control disabled" type="text" value="<?= $data['email'] ?>" name="email" disabled>
                </div>
              </div><!-- col-4 -->
              
             

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Password: </label>
                  <input class="form-control" type="text" value="<?= $data['password'] ?>" name="password"  required>
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">User Type: </label>
                  <input class="form-control" type="text" value="<?= $data['user_type'] ?>" name="user_type"  disabled>
                </div>
              </div><!-- col-4 -->


              <?php 

                if($data['user_type'] == "TEACHER")
                {

                    $school_name = fetch_all_data_usingDB($db,"select * from user join schools on schools.id=user.school_division where user.id = '$user_id'");                  

                ?>
                
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">School Name: </label>
                    <input class="form-control" type="text" value="<?= $school_name['school_name'] ?>" name="school_name"  disabled>
                  </div>
                </div><!-- col-4 -->



                <?php 
                }
                else{

                    $division_name = fetch_all_data_usingDB($db,"select * from user join division on division.id=user.school_division where user.id = '$user_id'");

                    
                ?>

                 <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Division Name: </label>
                    <input class="form-control" type="text" value="<?= $division_name['division_name'] ?>" name="division_name"  disabled>
                  </div>
                </div><!-- col-4 -->


                <?php 
                }
              ?>


              
             
            </div><!-- row -->
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <div class="form-layout-footer">
              <button type="submit" class="btn btn-success mg-r-5" name="btn-ProfileUpdate">Update Profile</button>
              
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
