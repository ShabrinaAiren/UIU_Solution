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
            <h6 class="card-body-title">Job Portal Form</h6>
            <p class="mg-b-20 mg-sm-b-30">A form for Job Portal</p>
            <form action="action.php" method="POST" enctype="multipart/form-data">
                <div class="form-layout">


                    <div class="row mg-b-25">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Job Title: </label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Company Name: </label>
                                <input type="text" name="company" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Position: </label>
                                <input type="text" name="position" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Dept: </label>
                                <select name="dept" class="form-control">
                                    <option disabled selected>-- Select Dept --</option>
                                    <option value="CSE">CSE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="BBA">BBA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Deadline: </label>
                                <input type="date" name="deadline" class="form-control">
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
                        <button type="submit" class="btn btn-primary mg-r-5"
                            name="btn_jobportalFormSubmit">Submit</button>

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