<?php

	require '../db_config.php';
	require 'custom_function.php';
	session_start();



	//subscription request
	if(isset($_GET['sub_id'])){
		$id = $_GET['sub_id'];

		
		$sql = "UPDATE `user` SET subscription = 1  WHERE id='$id'";

		$db->query($sql);

		header("Location: qa_s1.php?msg=success");
	}
	
	//commenting to a post
	if(isset($_POST['btn_CommenSubmit'])){
		$user_id = $_POST['user_id'];
		$comment = $_POST['comment'];
		$post_id = $_POST['post_id'];
		$sql = "INSERT INTO comment (comment,user_id,  post_id) VALUES ('$comment','$user_id', '$post_id')";

		if ($db->query($sql) === TRUE) {
			header("Location: community_post_view.php?id=$post_id");		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}
	}

	//post form submit
	if(isset($_POST['BTN_POSTFORMSUBMIT'])){
		$user_id = $_POST['user_id'];
		$title = $_POST['title'];
		$details = $_POST['details'];
		$sql = "INSERT INTO post (title,user_id,  details) VALUES ('$title','$user_id', '$details')";

		if ($db->query($sql) === TRUE) {
		  header('Location: community_post_form.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}

	//project Proposal form submit
	if(isset($_POST['btn_ProjectProposalFormSubmit'])){
		$user_id = $_POST['user_id'];
		$title = $_POST['title'];
		$supervisor = $_POST['supervisor'];
		$course_id = $_POST['course_id'];
		$details = $_POST['details'];
		$team = $_POST['team'];
		$position = $_POST['position'];
		$trimester = $_POST['trimester'];

		$sql = "INSERT INTO project_proposal (title,user_id, course_id,supervisor, details,team, position,trimester) VALUES ('$title','$user_id', '$course_id', '$supervisor', '$details', '$team', '$position', '$trimester')";

		if ($db->query($sql) === TRUE) {
		  header('Location: project_proposal_form.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}


	}

	//UA/Grader Submission

	if(isset($_POST['btn-UAGRADE_submission'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$course_grade = $_POST['course_grade'];
		$section = $_POST['section'];
		$course_id = $_POST['course_id'];
		$type = $_POST['type'];
		$user_id = $_POST['user_id'];
		$faculty_id = $_POST['faculty_id'];


		$sql = "INSERT INTO ua_grader_application (name,user_id, course_id, course_grade, phone, section, type,faculty_id) VALUES ('$name','$user_id', '$course_id', '$course_grade', '$phone', '$section', '$type', '$faculty_id')";

		if ($db->query($sql) === TRUE) {
		  header('Location: ua_grader_form.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}
	}
	
	//qa_reply
	if(isset($_POST['btn_qa_replyBTN'])){
		$id = $_POST['id'];
		$reply = $_POST['reply'];

		$sql = "UPDATE `question_answer_solutions` SET reply = '$reply'  WHERE id='$id'";

		$db->query($sql);

		header("Location: qa_s3.php?qa_id=$id&update=on");
	}

	//qa_submission
	if(isset($_POST['btn-qa_submission'])){

		$user_id = $_SESSION['user_id'];
		$title = $_POST['title'];
		$course = $_POST['course'];
		$trimester = $_POST['trimester'];
		$mid_final = strtolower( $_POST['mid_final']);
		
		if (isset($_FILES["fileToUpload"]["name"])) {
			
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			  
			  $uploadOk = 0;
			  header("Location: aq_create.php?error=imgerror");
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			  } else {
			    echo "Sorry, there was an error uploading your file.";
			  }
			}


		}

		$sql = "INSERT INTO question_answer_solutions (title,user_id, course_name, trimester, mid_final, question) VALUES ('$title','$user_id', '$course', '$trimester', '$mid_final', '$target_file')";

		if ($db->query($sql) === TRUE) {
		  header('Location: qa_create.php?msg=success');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}
	}



	//User profile Edit or Update
	if(isset($_POST['btn-ProfileUpdate']))
	{
		$user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$password = $_POST['password'];
		$official_id = $_POST['official_id'];
		$designation = $_POST['designation'];



		$sql = "UPDATE `user` SET name = '$name' , contact = '$contact',password = '$password', official_id = '$official_id' , designation='$designation' WHERE id='$user_id'";

		$db->query($sql);

		header("Location: profile.php?update=on");


	}


	

?>