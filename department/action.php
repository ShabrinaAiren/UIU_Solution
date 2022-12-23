<?php

	require '../db_config.php';
	require 'custom_function.php';
	session_start();



	//uploading section list
	if(isset($_POST['btn_sectionUpload'])){
		//check the file type whether PDF or not
		$check = 1;
			foreach ($_FILES['upload']['type'] as $key => $val) {
				
				if($val!="application/pdf")
				{
					$check = 0;
					break;
				}
			}
		
		if($check == 0)
		{
		
			header("Location: academic_section.php?FileError=on");
			die();
		}

		//checking files are submitted or not
		if(isset($_FILES['upload']['name']))
		{
			$files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
			// Count the number of uploaded files in array
			$total_count = count($_FILES['upload']['name']);
			
			// Loop through every file
			for( $i=0 ; $i < $total_count ; $i++ ) {
			   //The temp file path is obtained
			   $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
			   //A file path needs to be present
			   if ($tmpFilePath != ""){
			      //Setup our new file path
			      $newFilePath = "../academic_section/" .'_'. $_FILES['upload']['name'][$i];
			      //File is uploaded to temp dir
			      if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			     	$sql = "UPDATE `section_list` SET url = '$newFilePath'  WHERE id=1 ";
					$db->query($sql);
			      }
			   }
			}
		}
		else
		{
			header("Location: academic_section.php?FileError=on");
			die();
		}

		header("Location: academic_section.php?msg=on");	
	}
	
	//course delete
	if(isset($_GET['course_delete_id'])){
		$id = $_GET['course_delete_id'];

		$sql = "DELETE FROM course_list WHERE id = '$id'";
		$db->query($sql);
		header('Location: course_list.php?mssg=removed');
	}
	//adding course 
	if(isset($_POST['btn_add_course'])){
		$course = $_POST['name'];
	

		$sql = "INSERT INTO course_list (name) VALUES ('$course')";

		if ($db->query($sql) === TRUE) {
		  header('Location: course_list.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}
	}
	//requsition accept
	if(isset($_GET['requsition_accrpt_id'])){
		$id = $_GET['requsition_accrpt_id'];

		$sql = "UPDATE `requisition_order_list` SET status = 1  WHERE id='$id'";

		$db->query($sql);

		header("Location: requsition.php?msg=success");
	}
	//notice delete
	if(isset($_GET['notice_delete_id'])){
		$id = $_GET['notice_delete_id'];

		$sql = "DELETE FROM notice WHERE id = '$id'";
		$db->query($sql);
		header('Location: notice_board.php?mssg=removed');
	}

	//posting Notice
	if(isset($_POST['btn_notice_submission']))	{
		$title = $_POST['title'];
		$details = $_POST['details'];
		
		$sql = "INSERT INTO notice (title,details) VALUES ('$title','$details')";

		if ($db->query($sql) === TRUE) {
		  header('Location: notice_board.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}
		
		
	}
	//posting Answer to the Questions 
	if(isset($_POST['btn-qa_answer_submission'])){
		$id = $_POST['id'];


		//check the file type whether PDF or not
		$check = 1;
			foreach ($_FILES['upload']['type'] as $key => $val) {
				
				if($val!="application/pdf")
				{
					$check = 0;
					break;
				}
			}
		
		if($check == 0)
		{
		
			header("Location: qa_answer_create.php?FileError=on");
			die();
		}

		//checking files are submitted or not
		if(isset($_FILES['upload']['name']))
		{
			$files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
			// Count the number of uploaded files in array
			$total_count = count($_FILES['upload']['name']);
			
			// Loop through every file
			for( $i=0 ; $i < $total_count ; $i++ ) {
			   //The temp file path is obtained
			   $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
			   //A file path needs to be present
			   if ($tmpFilePath != ""){
			      //Setup our new file path
			      $newFilePath = "../qa/" .'answers__'. $_FILES['upload']['name'][$i];
			      //File is uploaded to temp dir
			      if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			     	$sql = "UPDATE `question_answer_solutions` SET answer = '$newFilePath'  WHERE id='$id'";
					$db->query($sql);
			      }
			   }
			}
		}
		else
		{
			header("Location: qa_answer_create.php?FileError=on");
			die();
		}

		header("Location: qa_index.php?msg=on");	

	}
	//posting Question
	if(isset($_POST['btn-qa_submission']))
	{
		
		//check the file type whether PDF or not
		$check = 1;
			foreach ($_FILES['upload']['type'] as $key => $val) {
				
				if($val!="application/pdf")
				{
					$check = 0;
					break;
				}
			}
		
		if($check == 0)
		{
		
			header("Location: qa_create.php?FileError=on");
			die();
		}
		
		$user_id = $_SESSION['user_id'];
		$title = $_POST['title'];
		$course = $_POST['course'];
		$trimester = $_POST['trimester'];
		$mid_final = strtolower( $_POST['mid_final']);



		//checking files are submitted or not
		if(isset($_FILES['upload']['name']))
		{
			$files = array_filter($_FILES['upload']['name']); //Use something similar before processing files.
			// Count the number of uploaded files in array
			$total_count = count($_FILES['upload']['name']);
			
			// Loop through every file
			for( $i=0 ; $i < $total_count ; $i++ ) {
			   //The temp file path is obtained
			   $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
			   //A file path needs to be present
			   if ($tmpFilePath != ""){
			      //Setup our new file path
			      $newFilePath = "../qa/" .'__'. $_FILES['upload']['name'][$i];
			      //File is uploaded to temp dir
			      if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			        $sql1 = "INSERT INTO question_answer_solutions (title,user_id, course_name, trimester, mid_final, question) VALUES ('$title','$user_id', '$course', '$trimester', '$mid_final', '$newFilePath')";
			        $db->query($sql1);
			      }
			   }
			}
		}
		else
		{
			header("Location: qa_create.php?FileError=on");
			die();
		}

		header("Location: qa_create.php?msg=on");		
	}
	

	//approve subscription request
	if(isset($_GET['sub_id'])){
		$id = $_GET['sub_id'];
		$sql = "UPDATE `user` SET subscription = 2  WHERE id='$id'";

		$db->query($sql);

		header("Location: sub.php?msg=success");
	}
	//creating a job post
	if(isset($_POST['btn_jobportalFormSubmit'])){
		$title = $_POST['title'];
		$company = $_POST['company'];
		$position = $_POST['position'];
		$dept = $_POST['dept'];
		$deadline = $_POST['deadline'];
		$details = $_POST['details'];
		
		$sql = "INSERT INTO job_portal (title,company, position, dept, deadline, details) VALUES ('$title','$company', '$position', '$dept', '$deadline', '$details')";

		if ($db->query($sql) === TRUE) {
		  header('Location: job_portal_form.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}
	}

	//approving grader application
	if(isset($_GET['grader_permit_recommend_id'])){
		$id = $_GET['grader_permit_recommend_id'];
		$sql = "UPDATE `ua_grader_application` SET status = 2 WHERE id='$id'";

		$db->query($sql);
  
		header("Location: grader_request.php?msg=success");
	}

	//reject grader application
	if(isset($_GET['grader_reject_recommend_id'])){
		$id = $_GET['grader_reject_recommend_id'];


		// sql to delete a record
		$sql = "DELETE FROM ua_grader_application WHERE id='$id'";

		if ($db->query($sql) === TRUE) {
			header("Location: grader_request.php?msg=removed");
			die();
		} else {
		echo "Error deleting record: " . $conn->error;
		}


		
	}

	// apporving project proposal
	if(isset($_GET['proposeID'])){
		$id = $_GET['proposeID'];
		$sql = "UPDATE `project_proposal` SET status = 1 WHERE id='$id'";

		$db->query($sql);
  
		header("Location: project_proposal_application.php?update=on");


	}
	//creating a complaint/issue to Department
	if(isset($_POST['btn-ReplyfacultyIssue'])){
		$issue_id = $_POST['issue_id'];
		$reply = $_POST['reply'];
		

		$sql = "UPDATE `faculty_issues` SET reply = '$reply', status = 1 WHERE id='$issue_id'";

		$db->query($sql);
  
		header("Location: issues_index.php?update=on");


	}






?>