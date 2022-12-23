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
        <?php 
            require 'custom_function.php';
            // session_start();
            $id = $_SESSION['user_id'];
            $user = fetch_all_data_usingDB($db, "select * from user where id = '$id'");
            
        ?>
        <div class="card pd-20 pd-sm-40">
            <div class="row">

                <div class="col-md-12" style="color:black;">
                    <div class="text-center">
                        <h2>Subscription FEE<h2><br>
                                <h3>
                                    For viewing the Answer Script you have to pay 1000 Taka. After payment you will
                                    get to access the answer script.
                                </h3>

                                <h4>Bkash: <span style="font-size:25px;color:green;font-weight:bold;">+880
                                        1761478541</span></h4>
                                <h4>Nagad: <span style="font-size:25px;color:green;font-weight:bold;">+880
                                        1761478541</span></h4>
                                <h4>Rocket: <span style="font-size:25px;color:green;font-weight:bold;">+880
                                        1761478541</span></h4>

                                <p style="color:red;font-weight:700;">Make sure you complete the payment first and put
                                    you ID
                                    in the
                                    reference and
                                    submit
                                    the form</p>
                                <a href="action.php?sub_id=<?= $_GET['user_id'] ?>"
                                    class="btn btn-primary">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
    <!-- END MAIN CONTENT -->


    <?php require 'd_footer.php' ?>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require 'd_javascript.php' ?>
</body>

</html>