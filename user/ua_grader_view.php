<?php 
  require_once 'custom_function.php';
    session_start();
    $id = $_GET['id'];
    $DATA = fetch_all_data_usingDB($db, "select * from ua_grader_application where id = '$id'");
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
      <a class="breadcrumb-item" href="index.php">UIU Solutions</a>
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
          <h6 class="card-body-title">UA & Grader Application Form</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for UA & Grader</p>
          <!-- <form action="action.php" method="POST" enctype="multipart/form-data"> -->
          <div class="form-layout">

          <!-- <input type="hidden" name="user_id" value="<?= $user_id ?>"> -->

          <div class="row mg-b-25">

          <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Choose Type: </label>
                    <select name="type" class="form-control" disabled>
                        <option value="UA" 
                            <?php 
                                
                                if($DATA['type']=="UA"){
                                    ?>
                                    selected
                                    <?php 
                                }
                            ?>
                        
                        >Apply for UA</option>
                        <option value="GRADER" 
                        <?php 
                                
                                if($DATA['type']=="GRADER"){
                                    ?>
                                    selected
                                    <?php 
                                }
                            ?>
                        >Apply for GRADER</option>
                    </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Course: </label>
                    <select name="course_id" class="form-control" disabled>
                        <?php
                            foreach($course_list as $data)
                            {
                        ?>

                        <option value="<?=$data['id']?>" 
                                <?php 
                                    if($DATA['course_id'] == $data['id']){
                                ?>
                                    selected
                                <?php 
                                    }
                                ?>
                        ><?= $data['name'] ?></option>
                       
                        <?php 
                            }
                        ?>
                    </select>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Name: </label>
                    <input type="text" name="name" class="form-control" value="<?= $DATA['name'] ?>" disabled >
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Course Grade: </label>
                    <input type="text" name="course_grade" class="form-control"> value="<?= $DATA['course_grade'] ?>" disabled
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Phone: </label>
                    <input type="text" name="phone" class="form-control" value="<?= $DATA['phone'] ?>" disabled>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Section: </label>
                    <input type="text"  name="section" class="form-control" value="<?= $DATA['section'] ?>" disabled>
                </div>
              </div>

             
              

            </div><!-- row -->

            <div class="form-layout-footer">
              <a href="ua_grader_index.php" class="btn btn-dark mg-r-5" >Back</a>
              
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
