<?php 

  session_start();

  $email = $_SESSION['CHANGE_EMAIL'];



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Change Password</title>
    
    <!--Fabicon Image-->
    <link rel="shortcut icon"  href="../f-black.png">
    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">UIU Solution</div>
        <div class="tx-center mg-b-30">Change your password</div>

        <form action="action.php" method="POST">
        	<div class="form-group">
            <label style="font-weight: 700;color: blue;margin-left: 20%;">Enter your new Password</label>
	          <input type="text" class="form-control" name="password" placeholder="Enter your new password">
	        </div><!-- form-group -->
	        
            <input type="hidden" class="form-control" name="email" value="<?= $email ?>">

        
        <button type="submit" name="btn-changepassword" class="btn btn-info btn-block">Change Password</button>

        <?php

            if(isset($_GET['msg']))
            {
          ?>

           <p style="color: green;font-weight: 700;">Password Changed Succesfully!</p>
           <hr>

        <a href="index.php" class="btn btn-success">Login</a> 

       <hr>
         <br>
        <a href="index.php" class="btn btn-dark btn-block">Back to Home</a> 


          <?php 
            }
          ?>


        </form>
        
      </div><!-- login-wrapper -->

    </div><!-- d-flex -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>

  </body>
</html>

