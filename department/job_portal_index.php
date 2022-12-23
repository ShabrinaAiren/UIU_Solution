<?php require 'd_header.php' ?>

<?php 
  
    require 'custom_function.php';
  
    $user_id = $_SESSION['user_id'];

    $list = fetch_all_data_usingPDO($pdo,"select * from project_proposal where status = 1 order by id desc");
 

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
        <a class="breadcrumb-item" href="index.php">UIU Solution</a>
        <span class="breadcrumb-item active">Project Proposals List</span>
    </nav>

    <div class="sl-pagebody">
        <!-- MAIN CONTENT -->
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Project Proposals Details</h6>



            <div class="table-wrapper">
                <table id="myTable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Project Name</th>
                            <th>Supervisor</th>
                            <th>Trimester</th>
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
                            <td><?php echo $data['supervisor']; ?></td>
                            <td><?php echo $data['trimester']; ?></td>

                            <td>
                                <a href="project_proposal_view.php?id=<?= $data['id'] ?>"
                                    class="btn btn-primary">View</a>
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