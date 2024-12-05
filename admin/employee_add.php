<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee_id = $_POST['employee_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
		$filename = $_FILES['photo']['name'];
		$password = $_POST['password'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating employeeid
		
		//
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		$sql = "INSERT INTO employees (employee_id, firstname, lastname, address, birthdate, contact_info, gender, position_id, schedule_id, photo, created_on,password) VALUES ('$employee_id', '$firstname', '$lastname', '$address', '$birthdate', '$contact', '$gender', '$position', '$schedule', '$filename', NOW(),'$password')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Thêm thành công';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Hãy điền thông tin!!!';
	}

	header('location: employee.php');
?>