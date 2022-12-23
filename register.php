<?php 
  
  require 'db_config.php';

  function fetch_all_data_usingPDO($pdo,$sql)
  {
    
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $row = $statement->fetchAll();

    return $row;
  }

  $schools = fetch_all_data_usingPDO($pdo,"select * from schools");
  $division = fetch_all_data_usingPDO($pdo,"select * from division");


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>User Registration</title>
    
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
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Official's Registration</div>
        <div class="tx-center mg-b-60">Register with valid Information</div>

        <form action="action.php" method="POST">

          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required> 
          </div><!-- form-group -->


        	<div class="form-group">
	          <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
	        </div><!-- form-group -->

          <div class="form-group">
            <input type="text" class="form-control" name="contact" placeholder="Enter your contact" required>
          </div><!-- form-group -->

          <div class="form-group">
            <input type="radio" value="TEACHER"  name="user_type" id="user_type1" onclick="myFunctionSchool()" > <label for="user_type1">Teacher</label>

            &nbsp&nbsp&nbsp&nbsp
            
            <input type="radio" value="OFFICIAL" name="user_type" id="user_type2" onclick="myFunctionDivision()" > <label for="user_type2">Official</label>
            &nbsp&nbsp&nbsp&nbsp
            <input type="radio" value="STUDENT" name="user_type" id="user_type3" onclick="myFunctionStudent()" > <label for="user_type3">Student</label>
          </div><!-- form-group -->


                <div class="form-group mg-b-10-force" style="display: none;" id="SCHOOL">
                  <label class="form-control-label">Academic Institution:</label>
                   <select class="form-control" name="school">
                      
                      <option value="">--Select Type--</option>
                      <?php

                        foreach ($schools as $key => $data) {
                      ?>

                         <option value="<?= $data['id'] ?>"><?= $data['school_name'] ?></option>

                      <?php 
                        }
                      ?>
                    </select>
                </div>

                <div class="form-group mg-b-10-force" style="display: none;" id="DIVISION">
                  <label class="form-control-label">Division:</label>
                   <select class="form-control" name="division">
                      
                      <option value="">--Select Type--</option>
                      <?php

                        foreach ($division as $key => $data) {
                      ?>

                         <option value="<?= $data['id'] ?>"><?= $data['division_name'] ?></option>

                      <?php 
                        }
                      ?>
                    </select>
                </div>
          
          <div class="form-group">
            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter your Designation" required>
          </div><!-- form-group -->

          <div class="form-group">
            <input type="text" class="form-control" name="official_id" placeholder="Enter your ID" required> 
          </div><!-- form-group -->

	        <div class="form-group">
	          <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
	          
	        </div><!-- form-group -->
        
        <button type="submit" name="btn-register_user" class="btn btn-info btn-block">Sign Up</button>

        <hr>


        

        <a href="index.php" class="btn btn-success btn-block">Login</a>

        
        </form>
        
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script>
      
      function myFunctionSchool() {
          var x = document.getElementById('SCHOOL');
          var y = document.getElementById('DIVISION');
          if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
          } else {
            x.style.display = "none";
          }
        }

        function myFunctionStudent(){
          document.getElementById('designation').value = 'student';
          document.getElementById('SCHOOL').style.display = 'block';
        }
        function myFunctionDivision() {
          var x = document.getElementById('DIVISION');
          var y = document.getElementById('SCHOOL');
          if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
          } else {
            x.style.display = "none";
          }
        }

    </script>
    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>

  </body>
</html>

