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

    <div class="sl-pagebody">

        <?php 
            require 'custom_function.php';
            $id = $_GET['id'];
            $job = fetch_all_data_usingDB($db, "select * from job_portal where id = '$id'");
           

        ?>
        <!-- MAIN CONTENT -->
        <?php

        if(isset($_GET['msg']))
        {
        ?>
        <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Successfully Posted!
        </div>
        <?php 
        }
        ?>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Job Portal Details</h6>
            <p class="mg-b-20 mg-sm-b-30">Job Details</p>
            <div class="form-layout">


                <div class="row mg-b-25">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Job Title: </label>
                            <input type="text" name="title" class="form-control" value="<?= $job['title']  ?? '' ?>"
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Company Name: </label>
                            <input type="text" name="company" class="form-control" value="<?= $job['company']  ?? '' ?>"
                                disabled>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Position: </label>
                            <input type="text" name="position" class="form-control"
                                value="<?= $job['position']  ?? '' ?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">DEPT: </label>
                            <input type="text" name="dept" class="form-control" value="<?= $job['dept']  ?? '' ?>"
                                disabled>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Deadline: </label>
                            <input type="date" name="deadline" class="form-control"
                                value="<?= $job['deadline']  ?? '' ?>" disabled>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Details: </label>
                            <textarea name="details" class="form-control" cols="30" rows="30"
                                disabled><?= $job['details']  ?? '' ?></textarea>
                        </div>
                    </div>



                </div><!-- row -->

                <div class="form-layout-footer">
                    <a href="job_portal.php" class="btn btn-dark mg-r-5">Back</a>

                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->

            </form>
        </div>
    </div><!-- sl-pagebody -->
    <!-- END MAIN CONTENT -->


    <?php require 'd_footer.php' ?>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require 'd_javascript.php' ?>
</body>

</html>