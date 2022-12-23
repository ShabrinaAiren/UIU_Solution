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


    <!-- MAIN CONTENT -->
    <?php 
            require 'custom_function.php';
            // session_start();
            $id = $_SESSION['user_id'];
            $user = fetch_all_data_usingDB($db, "select * from user where id = '$id'");
            $jobs = fetch_all_data_usingPDO($pdo, "select * from job_portal order by id desc");
    ?>


    <?php 
    if(!empty($jobs)){
        ?>
    <div class="row">

        <div class="col-md-12">
            <h3 class="text-center mb-3 mt-3">Job Portal</h3>
        </div>
        <?php 
            foreach($jobs as $job){

        ?>
        <div class="col-md-4">
            <div class="sl-pagebody">
                <a href="job_details.php?id=<?= $job['id'] ?>">
                    <div class="card pd-20 pd-sm-40"
                        style="border-radius:25px;border: 2px solid white;background-color:white;padding:15px;color:black;">
                        <h6><?= $job['title'] ?></h6>
                        <span><?= $job['dept'] ?></span>
                        <span>Deadline: <?= date('d M, Y', strtotime($job['deadline']))?></span>
                        <span>Company: <?= $job['company'] ?></span>
                        <span>posted: <?= date('d M, Y', strtotime($job['created_at'])) ?></span>
                    </div>
                </a>
            </div>
        </div>
        <?php
            }
                
        ?>
    </div>
    <?php
    }
?>








    <?php require 'd_footer.php' ?>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require 'd_javascript.php' ?>
</body>

</html>