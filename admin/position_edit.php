<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$rate = $_POST['rate'];

		$sql = "UPDATE position SET description = '$title', rate = '$rate' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cập nhật thành công';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Hãy điền thông tin!!';
	}

	header('location:position.php');

?>