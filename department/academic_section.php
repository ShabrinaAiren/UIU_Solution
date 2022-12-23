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

if(isset($_GET['FileError']))
{
?>
        <div class="alert alert-danger alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            PDF files Only!
        </div>
        <?php 
}
?>
        <?php
             require 'custom_function.php';
            $section = fetch_all_data_usingDB($db, "select * from section_list where id = 1");
                
        ?>
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Academic Section List Form</h6>
            <p class="mg-b-20 mg-sm-b-30">A form for Academic Section List</p>
            <form action="action.php" method="POST" enctype="multipart/form-data">
                <div class="form-layout">

                    <div class="row mg-b-25">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">File: </label>
                                <input type="file" name="upload[]" multiple="on" class="form-control">
                            </div>
                        </div>


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-primary mg-r-5" name="btn_sectionUpload">Submit</button>
                        <a href="qa_index.php" class="btn btn-dark mg-r-5" style="color:white;">Back</a>

                        <?php 
                            if(!empty($section['url']))
                            {
                        ?>
                        <a href="PDF.php?file=<?= $section['url'] ?>" target="_blank" class="btn btn-purple mg-r-5"
                            style="color:white;">Download
                            File</a>
                        <?php
                            }
            

                            ?>

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