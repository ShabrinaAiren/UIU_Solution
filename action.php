<?php 
	
 	require 'db_config.php';

 	if(isset($_POST['btn-register_user']))
 	{
 		$name = $_POST['name'];
 		$email = $_POST['email'];
 		$user_type = $_POST['user_type'];
 		$contact = $_POST['contact'];
 		$designation = $_POST['designation'];

 		
 		if(!empty($_POST['school']))
 		{
 			$school_division = $_POST['school'];
 		}
 		else
 		{
 			$school_division = $_POST['division'];
 		}

 		$official_id = $_POST['official_id'];
 		$password = $_POST['password'];

 		$sql = "INSERT INTO user (name, email, contact, user_type, school_division, official_id,designation,password) VALUES ('$name','$email','$contact','$user_type','$school_division','$official_id','$designation','$password')";

		if ($db->query($sql) === TRUE) {
		  header('Location: index.php?msg=inserted');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}


 	}


	//user login
	if(isset($_POST['btn-login_user']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "Select count(*),id,name,user_type from user where email='$email' and password='$password' and status =1;";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
	
		if($row['count(*)']=="1")
		{
			
			$user_type = $row['user_type'];
			
			session_start();
			$_SESSION['user']="VERIFIED";
			$_SESSION['user_id']=$row['id'];
			$_SESSION['user_name']=$row['name'];
			$_SESSION['user_type']=$row['user_type'];
			
			if($user_type == 'TEACHER')
			{
				header("Location: teacher/index.php");

			}
			elseif($user_type== "STUDENT"){
				header("Location: user/index.php");
			}
			elseif($user_type == "OFFICIAL"){
				header("Location: department/index.php");
				
			}
		}
		else
		{
			header("Location: index.php?emsg=error");
		}


	}

	// checking if email exist or not
	if(isset($_POST['btn-forgotpassword']))
	{
		$email = $_POST['email'];

		$check = fetch_all_data_usingDB($db, "select count(*) as 'count' from user where email = '$email'");

		if($check['count'] == '1')
		{
			session_start();
			$_SESSION['CHANGE_EMAIL']=$email;

			header('Location: change_password.php');

		}
		else
		{
			header('Location: forget_password.php?emsg=error');
		}

	}


	//changing the account password from the email
	if(isset($_POST['btn-changepassword']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "UPDATE `user` SET password = '$password' WHERE email='$email'";

		$db->query($sql);

		header("Location: index.php?chmsg=success");



	}


	 function fetch_all_data_usingDB($db,$sql){
			
			$result = mysqli_query($db,$sql);
		    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		    mysqli_free_result($result);
		    return $row;
		}

?>