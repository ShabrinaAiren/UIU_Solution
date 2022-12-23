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
        <?php 
        require 'custom_function.php';
            function countData($db, $sql){
                // $sql = "Select count(*),id,name,user_type from user where email='$email' and password='$password' and status =1;";
		        $result = mysqli_query($db,$sql);
		        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);       
                return $row['count(*)'] ;           
            }
            $t_user = countData($db,"select count(*) from user");
            $t_question = countData($db,"select count(*) from question_answer_solutions where question is not NULL");
            $t_answer = countData($db,"select count(*) from question_answer_solutions where answer is not NULL");
            $t_proposal = countData($db,"select count(*) from project_proposal where status =1");
            $t_faculty = countData($db,"select count(*) from user where user_type = 'TEACHER'");
            $t_student = countData($db,"select count(*) from user where user_type = 'STUDENT'");
            $t_jobs = countData($db,"select count(*) from job_portal");
            $t_ua_grader = countData($db,"select count(*) from ua_grader_application where status =2");

           
        ?>

        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">Users</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_user ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-success">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">Questions</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">5,7,3,3,9,6,5,9,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_answer ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-secondary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">Answers</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">5,7,3,3,5,1,3,9,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_question ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="card pd-20 bg-dark">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">Project Proposal</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">3,9,9,6,5,5,7,9,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_proposal ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>

            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="card pd-20 bg-warning">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">Faculty</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">3,4,2,4,6,5,7,1,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_faculty ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="card pd-20 bg-dark">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">Student</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">3,4,2,6,5,5,7,1,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_student ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>


            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="card pd-20 bg-primary">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">Job Post</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">1,4,2,3,5,7,7,1,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_jobs ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3 mb-3">
                <div class="card pd-20 bg-purple">
                    <div class="d-flex justify-content-between align-items-center mg-b-10">
                        <h4 class="mg-b-0 tx-spacing-1 tx-white">UA/Grader</h4>
                        <a href="" class="tx-white-8 hover-white"></a>
                    </div><!-- card-header -->
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="sparkline2">1,6,2,3,5,2,2,1,5,2</span>
                        <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $t_ua_grader ?? '0' ?></h3>
                    </div><!-- card-body -->

                </div><!-- card -->
            </div>

        </div>
    </div>

    <?php require 'd_footer.php' ?>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require 'd_javascript.php' ?>
</body>

</html>