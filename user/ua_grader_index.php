<?php require 'd_header.php' ?>

<?php 
  
    require 'custom_function.php';
  
    $user_id = $_SESSION['user_id'];

    $list = fetch_all_data_usingPDO($pdo,"select * from ua_grader_application where user_id = '$user_id'");
 

?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

    

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php">Inventory</a>
      <span class="breadcrumb-item active">My Application List</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">My Application Details</h6>
          
          
         
          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th >SL</th>
                  <th >Type</th>
                  <th >Applied Date</th>
                  <th >Status</th>
                  <th >Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($list as $key => $data) {
                ?>
                  
                    <tr>
                      
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $data['type']; ?></td>
                      <td><?php echo $data['created_at']; ?></td>
                      <td><?php 
                            if($data['status'] == 0){
                                echo 'Pending';
                            }
                            else{
                                echo 'Processing';
                            }
                      ?></td>
                      
                      <td>
                         <a href="ua_grader_view.php?id=<?= $data['id'] ?>" class="btn btn-primary">View</a>
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
