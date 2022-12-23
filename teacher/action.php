<?php

	require '../db_config.php';
	require 'custom_function.php';
	session_start();

	//requestiong for requsition
	if(isset($_POST['btn_requsition_form_submission'])){

		$user_id = $_POST['user_id'];
		$item = $_POST['item'];
		$quantity = $_POST['quantity'];
		$details = $_POST['details'] ?? '';

		$sql = "INSERT INTO requisition_order_list (item,quantity,details, user_id) VALUES ('$item','$quantity', '$details', '$user_id')";

		if ($db->query($sql) === TRUE) {
		  header('Location: req_form.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}

	//creating a complaint/issue to Department
	if(isset($_POST['btn-facultyIssue'])){
		$issue = $_POST['issue'];
		$user_id = $_SESSION['user_id'];
		$sql = "INSERT INTO faculty_issues (issue, user_id) VALUES ('$issue','$user_id')";

		if ($db->query($sql) === TRUE) {
		  header('Location: issues_create.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}


	}


	//recommending a grader to department
	if(isset($_GET['recommend_id'])){
		$id = $_GET['recommend_id'];

		$sql = "UPDATE ua_grader_application SET status = 1 WHERE id = '$id'";
		$db->query($sql);

		header("Location: grader_index.php?msg=success");
	}
		



?>