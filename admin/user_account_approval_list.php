<?php 
  
    require 'custom_function.php';
    $user_list = fetch_all_data_usingPDO($pdo,'select * from user where status = 0 ORDER BY id DESC');

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
      <a class="breadcrumb-item" href="index.php">UIU Solution</a>
      <span class="breadcrumb-item active">User Pending List</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">User Details</h6>
          
          <?php

            if(isset($_GET['update']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              Updated Successfully!
          </div>
          <?php 
            }
          ?>


          <?php

            if(isset($_GET['delete']))
            {
          ?>

           <div class="alert alert-danger alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Deleted Successfully!
          </div>
          <?php 
            }
          ?>
         
          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th >SL</th>
                  <th >Name</th>
                  <th >Email</th>
                  <th >Contact</th>
                  <th >User Type</th>
                  <th >Official ID</th>

                  
                  <th >Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($user_list as $key => $data) {
                ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $data['name']; ?></td>
                      <td><?php echo $data['email']; ?></td>
                      <td><?php echo $data['contact']; ?></td>
                      <td><?php echo $data['user_type']; ?></td>
                      <td><?php echo $data['official_id']; ?></td>
                      
                      <td>
                        
                        <a href="action.php?user_approve_id=<?= $data['id']  ?>" class="btn btn-success">Approve</a>
                        <a href="action.php?user_approve_id_delete=<?= $data['id']  ?>" class="btn btn-danger">Delete</a>
                        
                      </td>
                    </tr>
                <?php
                    }

                ?>
               
                
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>    

      
    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


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
