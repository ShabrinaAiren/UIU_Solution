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
            Form Submitted Successfully!
        </div>
        <?php 
        }
        ?>

        <?php 
        require 'custom_function.php';
        $id = $_GET['notice_view_id'];
            $notice = fetch_all_data_usingDB($db, "select * from notice where id = '$id'");
        ?>


        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Notice Details</h6>
            <p class="mg-b-20 mg-sm-b-30">Notice Details </p>
            <div class="form-layout">

                <div class="row mg-b-25">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Title: </label>
                            <input type="text" name="title" class="form-control" disabled
                                value="<?= $notice['title'] ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Details: </label>
                            <textarea name="details" class="form-control" cols="30" rows="10"
                                disabled><?= $notice['details'] ?? '' ?></textarea>
                        </div>
                    </div>



                </div><!-- row -->

                <div class="form-layout-footer">
                    <!-- <button type="submit" class="btn btn-primary mg-r-5" name="btn_notice_submission">Submit</button> -->
                    <a href="notice_board.php" class="btn btn-dark mg-r-5" style="color:white;">Back</a>

                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->

        </div>
    </div><!-- sl-pagebody -->
    <!-- END MAIN CONTENT -->



    <?php require 'd_footer.php' ?>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require 'd_javascript.php' ?>
<script>
$('#myTable').DataTable({
    bLengthChange: true,
    searching: true,
    responsive: true
});
</script>
</body>

</html>