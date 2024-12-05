<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login1'])){
		$employee_id = $_POST['employee_id'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM employees WHERE employee_id = '$employee_id'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Không tìm thấy tên tài khoản';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['employees'] = $row['id'];
				$_SESSION['employee_id'] = $row['employee_id'];
			}
			else{
				$_SESSION['error'] = 'Sai mật khẩu';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Hãy nhập thông tin';
	}

	header('location: inde.php');

?>