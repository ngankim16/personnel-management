<?php
	include 'includes/session1.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'hom.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$contact_info= $_POST['contact_info'];
		$photo = $_FILES['photo']['name'];
		$password = $_POST['password'];
		if(password_verify($curr_password, $user['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password= password_hash($password, PASSWORD_DEFAULT);
			}

			$sql = "UPDATE employees SET firstname = '$firstname', password = '$password', birthdate = '$birthdate', contact_info = '$contact_info', photo = '$filename' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Cập nhật thành công';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Sai mật khẩu';
		} 
	}
	else{
		$_SESSION['error'] = 'Điền đủ yêu cầu';
	}

	header('location:'.$return);

?>