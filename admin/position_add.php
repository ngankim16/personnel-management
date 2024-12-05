<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$rate = $_POST['rate'];

		$sql = "INSERT INTO position (description, rate) VALUES ('$title', '$rate')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Thêm thành công';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Hãy điền thông tin!!';
	}

	header('location: position.php');

?>