<?php 
  

    session_start();

    if(!empty($_SESSION['admin']))
    {
        $admin = $_SESSION['admin'];
    }
    else
    {
      header('Location: login.php');

    }


?>
