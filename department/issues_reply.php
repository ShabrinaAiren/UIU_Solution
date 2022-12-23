<?php 

  $issueId = $_GET['issue_id'];
  require 'custom_function.php';
  $DATA = fetch_all_data_usingDB($db, "select * from faculty_issues where id ='$issueId'");

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
      <a class="breadcrumb-item" href="index.php">Inventory</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
    <?php

        if(isset($_GET['msg']))
        {
        ?>
            <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                Issue Created Successfully!
            </div>
        <?php 
        }
        ?>

    <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Issues Create</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for complaint/issues</p>
          <form action="action.php" method="POST" enctype="multipart/form-data">
          <div class="form-layout">
            <div class="row mg-b-25">
              
              <input type="hidden" name="issue_id" value="<?= $DATA['id'] ?>">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Issue: </label>
                    <textarea name="issue" class="form-control" cols="100" rows="10" disabled><?= $DATA['issue'] ?></textarea>
                </div>
              </div><!-- col-4 -->



              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Reply to Issue: </label>
                    <textarea name="reply" class="form-control" cols="100" rows="10"></textarea>
                </div>
              </div><!-- col-4 -->


            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-primary mg-r-5" name="btn-ReplyfacultyIssue">Submit</button>
              <a href="issues_index.php" class="btn btn-dark mg-r-5" >Back</a>
              
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
