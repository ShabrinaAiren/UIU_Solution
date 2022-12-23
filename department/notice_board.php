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



        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Notice Create</h6>
            <p class="mg-b-20 mg-sm-b-30">A form for Notice </p>
            <form action="action.php" method="POST" enctype="multipart/form-data">
                <div class="form-layout">

                    <div class="row mg-b-25">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label">Title: </label>
                                <input type="text" name="title" class="form-control">
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
                            name="btn_notice_submission">Submit</button>
                        <!-- <a href="qa_index.php" class="btn btn-dark mg-r-5" style="color:white;">Back</a> -->

                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->

            </form>
        </div>
    </div><!-- sl-pagebody -->
    <!-- END MAIN CONTENT -->

    <div class="sl-pagebody">
        <!-- MAIN CONTENT -->
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Notice Details</h6>

            <?php 
                require 'custom_function.php';
                $list = fetch_all_data_usingPDO($pdo, 'select * from notice order by id desc');
            ?>

            <div class="table-wrapper">
                <table id="myTable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Created At</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                    foreach ($list as $key => $data) {
                ?>

                        <tr>

                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['details']; ?></td>
                            <td><?php echo date('d M, Y', strtotime($data['created_at'])); ?></td>

                            <td>
                                <a href="action.php?notice_delete_id=<?= $data['id'] ?>"
                                    class="btn btn-danger">Remove</a>
                            </td>

                        </tr>

                        <?php
                    }

                ?>



                    </tbody>

                </table>


            </div><!-- table-wrapper -->
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