<?php 
  require_once 'custom_function.php';
  session_start();
  $user_id = $_SESSION['user_id'];
  
  $post  = fetch_all_data_usingDB($db, "select * from post where id = '".$_GET['id']."'");


  function postOwner($db, $id){
    $sql = "select * from user where id = '".$id."'";

    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $row['name'];
}


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
        <!-- MAIN CONTENT -->
        <?php

        if(isset($_GET['msg']))
        {
        ?>
        <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Successfully Posted!
        </div>
        <?php 
        }
        ?>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">POST Form</h6>
            <p class="mg-b-20 mg-sm-b-30">A form for POST</p>
            <div class="form-layout">


                <div class="row mg-b-25">


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Posted By: </label>
                            <input type="text" name="owner" class="form-control"
                                value="<?= postOwner($db, $post['user_id']) ?? "" ?>" disabled>
                        </div>
                    </div>

                    <div1 class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Posted At: </label>
                            <input type="text" name="owner" class="form-control"
                                value="<?= date('d M, y', strtotime($post['created_at'])) ?? "" ?>" disabled>
                        </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">Title: </label>
                        <input type="text" name="title" class="form-control" value="<?= $post['title'] ?? "" ?>"
                            disabled>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">Details: </label>
                        <textarea name="details" class="form-control" cols="30" rows="10"
                            disabled><?= $post['details'] ?? "" ?></textarea>
                    </div>
                </div>

                <br><br><br>



                <?php
                 $comment_list = fetch_all_data_usingPDO($pdo, "select * from comment where post_id = '".$post['id']."'");
                 
                 if(!empty($comment_list))
                 {


                  ?>
                <h5>Comments</h5>
                <?php
                   foreach($comment_list as $data)
                   {
                     ?>
                <div>
                </div>
                <div class="row mb-4 ml-4">
                    <div class="col-md-12">
                        <h4><?= postOwner($db, $data['user_id'])?? '' ?></h4>
                    </div>

                    <div>
                        <p class="ml-4"><?= $data['comment'] ?? '' ?></p>
                    </div>
                </div>


                <?php
                    }
                 }
              
              ?>

                <div>

                </div>
                <h6>Leave A Comment</h6>
                <div class="container">
                    <div class="form-layout">
                        <form action="action.php" method="POST">

                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Comment: </label>
                                        <textarea name="comment" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <button type="submit" name="btn_CommenSubmit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div><!-- form-layout -->

        </div>


    </div><!-- sl-pagebody -->
    <!-- END MAIN CONTENT -->


    <?php require 'd_footer.php' ?>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require 'd_javascript.php' ?>
</body>

</html>