<?php 
    session_start();
    require 'custom_function.php';
    $list = fetch_all_data_usingPDO($pdo,'select * from faculty_issues where user_id = '.$_SESSION['user_id'].' ORDER BY id DESC');

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
        <a class="breadcrumb-item" href="index.php">UIU Solution</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
        <!-- MAIN CONTENT -->
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Academic Details</h6>

            <?php

            if(isset($_GET['update']))
            {
          ?>

            <div class="alert alert-success alert-dismissible" style="height: 50px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Updated Successfully!
            </div>
            <?php 
            }
          ?>


            <?php

            if(isset($_GET['delete']))
            {
          ?>

            <div class="alert alert-danger alert-dismissible" style="height: 50px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Deleted Successfully!
            </div>
            <?php 
            }
          ?>

            <div class="table-wrapper">
                <table id="myTable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php

                    foreach ($list as $key => $data) {
                ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo substr($data['issue'], 0 , 50); ?></td>
                            <td>
                                <?php
                                if($data['status'] == 0)
                                {
                                echo 'Pending';
                                }
                                else{
                                    echo 'Replied';
                                }
                            ?>

                            </td>

                            <td>

                                <a href="issues_show.php?issue_id=<?= $data['id']  ?>" class="btn btn-primary">View</a>

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
</body>

</html>