<?php 
  

    session_start();

    if(!empty($_SESSION['user']))
    {
        $user = $_SESSION['user'];
    }
    else
    {
      header('Location: logout.php');

    }


?>
