<?php
  session_start();
  
  if(isset($_SESSION['employees'])){
    header('location:hom.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Đăng Nhập Nhân viên</p>

    	<form action="login1.php" method="POST">
		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="employee_id" placeholder="Nhập mã" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="lastname" placeholder="Nhập tên " required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Nhập Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login1"><i class="fa fa-sign-in"></i> ĐĂNG NHẬP</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>