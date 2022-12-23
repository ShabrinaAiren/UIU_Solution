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

        <div class="card pd-20 pd-sm-40">
            <div class="d-flex justify-content-between">
                <h6 class="card-body-title">Requsition List</h6>
                <a href="req_form.php" class="btn btn-primary mb-4">Add Requsition</a>
            </div>


            <div class="table-wrapper">
                <table id="myTable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Req Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require_once 'custom_function.php';
                        $user_id = $_SESSION['user_id'];
                        $list = fetch_all_data_usingPDO($pdo, "select * from requisition_order_list where user_id = '".$user_id."' order by id desc");

                    ?>

                        <?php

                    foreach ($list as $key => $data) {
                ?>

                        <tr>

                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $data['item']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td>
                                <?php 
                                    if($data['status'] == 0){
                                        echo 'Pending';
                                    }
                                    else{
                                        echo 'Delivered';
                                    }

                                ?>
                            </td>
                            <td><?php echo $data['created_at']; ?></td>



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