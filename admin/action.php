<?php 
	
	require '../db_config.php';
	require 'custom_function.php';


	//admin login
	if(isset($_POST['btn-login_admin']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "Select count(*),id,name from admin where email='$email' and password='$password';";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		


		if($row['count(*)']=="1")
		{

			session_start();
			$_SESSION['admin']="VERIFIED";
			$_SESSION['admin_id']=$row['id'];
			$_SESSION['admin_name']=$row['name'];

			header("Location: index.php");
		}
		else
		{
			header("Location: login.php?msg=error");
		}


	}


	//category insert
	if(isset($_POST['btn-CategoryInsert']))
	{
		$category_name= $_POST['category_name'];
		$master_category_name= $_POST['master_category_name'];
		

		$sql = "INSERT INTO category (category_name, master_category_name) VALUES ('$category_name','$master_category_name')";

		if ($db->query($sql) === TRUE) {
		  header('Location: category_create.php');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}


	//category delete 
	if(isset($_GET['delete_category_id']))
	{
		$id = $_GET['delete_category_id'];
		
		$sql = "delete from category where id='$id';";
		$db->query($sql);
		header("Location: category_list.php?delete=on");		
		
	}

	//catgory update
	if(isset($_POST['btn-CategoryUpdate'])){
		$category_id = $_POST['category_id'];
		$category_name= $_POST['category_name'];
		$master_category_name= $_POST['master_category_name'];
		
		$sql = "UPDATE `category` SET category_name = '$category_name' , master_category_name = '$master_category_name' WHERE id='$category_id'";

		$db->query($sql);

		header("Location: category_list.php?update=on");
	}

	//product insert
	if(isset($_POST['btn-ProductInsert']))
	{
		$category_id= $_POST['category_id'];
		$product_name= $_POST['product_name'];
		$product_quantity= $_POST['product_quantity'];
		

		$sql = "INSERT INTO product (product_name,quantity, category_id) VALUES ('$product_name','$product_quantity', '$category_id')";

		if ($db->query($sql) === TRUE) {
		  header('Location: product_create.php');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}

	//product delete
	if(isset($_GET['delete_product_id']))
	{
		$id = $_GET['delete_product_id'];
		
		$sql = "delete from product where id='$id';";
		$db->query($sql);
		header("Location: product_list.php?delete=on");		
		
	}

	//product update
	if(isset($_POST['btn-ProductUpdate'])){
		
		$product_id = $_POST['product_id'];		
		$category_id = $_POST['category_id'];
		$product_name= $_POST['product_name'];
		$quantity= $_POST['quantity'];
		
		$sql = "UPDATE `product` SET product_name = '$product_name' , category_id = '$category_id',quantity = '$quantity' WHERE id='$product_id'";

		$db->query($sql);

		header("Location: product_list.php?update=on");
	}



	//user approval
	if(isset($_GET['user_approve_id']))
	{
		$id = $_GET['user_approve_id'];

		$sql = "UPDATE `user` SET status = 1 WHERE id='$id'";

		$db->query($sql);

		header("Location: user_account_approval_list.php?update=on");

	}



	//school insert
	if(isset($_POST['btn-SchoolInsert'])){
		
		$school_name = $_POST['school_name'];

		$sql = "INSERT INTO `schools` (`school_name`) VALUES ('$school_name');";

		if ($db->query($sql) === TRUE) {
		  header('Location: school_insert.php');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}


	//school update 

	if(isset($_POST['btn-SchoolUpdate'])){
		
		$school_id = $_POST['school_id'];		
		$school_name = $_POST['school_name'];
		
		$sql = "UPDATE `schools` SET school_name = '$school_name' WHERE id='$school_id'";

		$db->query($sql);

		header("Location: school_list.php?update=on");
	}


	//division insert
	if(isset($_POST['btn-DivisionInsert']))
	{
		$division_name = $_POST['division_name'];

		$sql = "INSERT INTO `division` (`division_name`) VALUES ('$division_name');";
		if ($db->query($sql) === TRUE) {
		  header('Location: division_insert.php');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}
	}

	//division update
	if(isset($_POST['btn-DivisionUpdate']))
	{
		$division_id = $_POST['division_id'];		
		$division_name = $_POST['division_name'];
		
		$sql = "UPDATE `division` SET division_name = '$division_name' WHERE id='$division_id'";

		$db->query($sql);

		header("Location: division_list.php?update=on");
	}


	//confirming order 
	if($_GET['confirm_order_id'])
	{
		$id = $_GET['confirm_order_id'];
		$sql = "UPDATE `requisition_order_list` SET status = 1 WHERE id='$id'";
		$db->query($sql);

		header("Location: order_pending.php?orderConfirm=on");

	}




	//creating an user account from admin panel

	if(isset($_POST['btn-USERCREATE']))
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

 		$sql = "INSERT INTO user (name, email, contact, user_type, school_division,status, official_id,designation,password) VALUES ('$name','$email','$contact','$user_type','$school_division',1,'$official_id','$designation','$password')";

		if ($db->query($sql) === TRUE) {
		  header('Location: user_account_create.php?msg=inserted');
		 
		} else {
		  echo "Error: " . $sql . "<br>" . $db->error;
		}

	}



	if(isset($_GET['user_approve_id_delete']))
	{
		$id = $_GET['user_approve_id_delete'];


		$sql = "delete from user where id='$id';";
		$db->query($sql);
		header("Location: user_account_approval_list.php?delete=on");	


	}

?>