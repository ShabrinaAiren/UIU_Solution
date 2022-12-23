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
                <h6 class="card-body-title">Requsition Pending List</h6>
            </div>


            <div class="table-wrapper">
                <table id="myTable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Faculty</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Req Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require_once 'custom_function.php';
                        $user_id = $_SESSION['user_id'];
                        $list = fetch_all_data_usingPDO($pdo, "select * from requisition_order_list where status = 0 order by id desc");
                        function get_user_name($db, $user_id){
                            $user = fetch_all_data_usingDB($db, "select * from user where id = '".$user_id."'");
                            return $user['name'];
                        }
                    ?>

                        <?php

                    foreach ($list as $key => $data) {
                ?>

                        <tr>

                            <td><?php echo $key+1; ?></td>
                            <td><?php echo get_user_name($db,$data['user_id']) ?></td>
                            <td><?php echo $data['item']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td>
                                <?php 
                                    if($data['status'] == 0){
                                        echo '<b>Pending</b>';
                                    }
                                    else{
                                        echo '<b>Delivered</b>';
                                    }

                                ?>
                            </td>
                            <td><?php echo $data['created_at']; ?></td>

                            <td>
                                <?php 
                                    if($data['status'] == 0){
                                ?>
                                <a href="action.php?requsition_accrpt_id=<?= $data['id'] ?>"
                                    class="btn btn-primary">Deliver</a>
                                <?php 
                                    }
                                   

                                ?>

                            </td>

                        </tr>

                        <?php
                    }

                ?>



                    </tbody>

                </table>


            </div><!-- table-wrapper -->
        </div>

    </div>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <div class="d-flex justify-content-between">
                <h6 class="card-body-title">Requsition Delivered List</h6>
            </div>


            <div class="table-wrapper">
                <table id="myTable2" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Faculty</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Req Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // require_once 'custom_function.php';
                        // $user_id = $_SESSION['user_id'];
                        $list = fetch_all_data_usingPDO($pdo, "select * from requisition_order_list where status = 1 order by id desc");
                        // function get_user_name($db, $user_id){
                        //     $user = fetch_all_data_usingDB($db, "select * from user where id = '".$user_id."'");
                        //     return $user['name'];
                        // }
                    ?>

                        <?php

                    foreach ($list as $key => $data) {
                ?>

                        <tr>

                            <td><?php echo $key+1; ?></td>
                            <td><?php echo get_user_name($db,$data['user_id']) ?></td>
                            <td><?php echo $data['item']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td>
                                <?php 
                                    if($data['status'] == 0){
                                        echo '<b>Pending</b>';
                                    }
                                    else{
                                        echo '<b>Delivered</b>';
                                    }

                                ?>
                            </td>
                            <td><?php echo $data['created_at']; ?></td>

                            <td>
                                <?php 
                                    if($data['status'] == 0){
                                ?>
                                <a href="action.php?requsition_accrpt_id=<?= $data['id'] ?>"
                                    class="btn btn-primary">Deliver</a>
                                <?php 
                                    }
                                   

                                ?>

                            </td>

                        </tr>

                        <?php
                    }

                ?>



                    </tbody>

                </table>


            </div><!-- table-wrapper -->
        </div>

    </div>


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