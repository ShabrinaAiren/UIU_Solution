<?php 
  require_once 'custom_function.php';
    session_start();
    $user_id = $_SESSION['user_id'];
  $course_list = fetch_all_data_usingPDO($pdo, "select * from course_list");

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
      <a class="breadcrumb-item" href="index.php">UIU Soluctions</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
    <?php

        if(isset($_GET['msg']))
        {
        ?>
            <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                Successfully Applied!
            </div>
        <?php 
        }
        ?>

    <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Project Proposal Form</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for Project Proposal</p>
          <form action="action.php" method="POST" enctype="multipart/form-data">
          <div class="form-layout">

          <input type="hidden" name="user_id" value="<?= $user_id ?>">

          <div class="row mg-b-25">

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Project Title: </label>
                    <input type="text" name="title" class="form-control">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Course: </label>
                    <select name="course_id" class="form-control">
                        <option  selected disabled>--Select Course--</option>
                        <?php
                            foreach($course_list as $data)
                            {
                        ?>
                        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                        <?php 
                            }
                        ?>
                    </select>
                </div>
              </div>


              

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Team Members: </label>
                    <input type="text" name="team" class="form-control">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Supervisor: </label>
                    <input type="text" name="supervisor" class="form-control">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Trimester: </label>
                    <input type="text"  name="trimester" class="form-control">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Position: </label>
                    <input type="text"  name="position" class="form-control">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Details: </label>
                            <textarea name="details" class="form-control" cols="30" rows="10"></textarea>
                </div>
              </div>
             
              

            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-primary mg-r-5" name="btn_ProjectProposalFormSubmit">Submit</button>
              
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
