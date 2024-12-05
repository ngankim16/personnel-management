<?php include 'includes/session1.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
  <?php
      session_start();
      if (!isset($_SESSION['employee_id'])) {
          // Người dùng chưa đăng nhập, thực hiện các hành động khác như chuyển hướng hoặc thông báo lỗi.
          echo "Bạn chưa đăng nhập";
          // Thoát khỏi mã PHP để ngăn việc hiển thị danh sách nhân viên
          exit;
      }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ngoài giờ
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Nhân viên</li>
        <li class="active">Ngoài giờ</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Ngày</th>
                  <th>Mã Nhân Viên</th>
                  <th>Tên</th>
                  <th>Số giờ làm</th>
                  <th>Rate</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, overtime.id AS otid, employees.employee_id AS empid FROM overtime LEFT JOIN employees ON employees.id=overtime.employee_id ORDER BY date_overtime DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                    if ($row['empid'] == $_SESSION['employee_id']) {
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date_overtime']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".$row['hours']."</td>
                          <td>".$row['rate']."</td>
                          
                        </tr>
                      ";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>

</div>
<?php include 'includes/scripts.php'; ?>
<script>


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'overtime_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      var time = response.hours;
      var split = time.split('.');
      var hour = split[0];
      var min = '.'+split[1];
      min = min * 60;
      console.log(min);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.otid').val(response.otid);
      $('#datepicker_edit').val(response.date_overtime);
      $('#overtime_date').html(response.date_overtime);
      $('#hours_edit').val(hour);
      $('#mins_edit').val(min);
      $('#rate_edit').val(response.rate);
    }
  });
}
</script>
</body>
</html>
