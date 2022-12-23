<?php 
    require_once 'custom_function.php';
   

    $list = fetch_all_data_usingPDO($pdo, 'select * from question_answer_solutions');
   

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
        <a class="breadcrumb-item" href="index.php">UIU Soluctions</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
            <?php
                 $userID = $_SESSION['user_id'];
                 $USERDATA = fetch_all_data_usingDB($db, "select * from user where id = '".$userID."'");
            ?>

        <div class="card pd-20 pd-sm-40">
            <div class="d-flex justify-content-between">
            <h6 class="card-body-title">Q/A Section</h6>
            <?php 
                if($USERDATA['subscription'] == 0){
            ?>
            <div>
            <span style="color:red; font-weight:bold;">Want to see the answers Scripts?</span>
            <a href="sub.php?user_id=<?= $USERDATA['id'] ?>" class="mb-3" style="font-size:22px;font-weight:bold;">Click here</a>
            </div>  
            <?php 
    
                }
            ?>  
            </div>


            <div class="table-wrapper">
                <table id="myTable" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Trimester</th>
                            <th>Mid/Final</th>
                            <?php 
                                if($USERDATA['subscription'] == 2){
                            ?>
                                
                                <th>Answer</th>

                            <?php
                                }
                            ?>
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
                            <td><?php echo $data['course_name']; ?></td>
                            <td><?php echo $data['trimester']; ?></td>
                            <td><?php echo $data['mid_final']; ?></td>
                            <?php 
                                if($USERDATA['subscription'] == 2){
                            ?>
                                
                            <td>
                                
                                    <?php
                                            if(!empty($data['answer'])){
                                    ?>
                                        <a href="PDF.php?file=<?= $data['answer']  ?>" target="_blank" class="btn btn-success">View Answer</a>

                                    <?php
                                            }else {
                                                echo 'No Answer Script';
                                            }
                                    ?>
                            </td>

                            <?php
                                }
                            ?>
                            <td>
                                <a href="PDF.php?file=<?= $data['question']  ?>" target="_blank" class="btn btn-primary">View Question</a>

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