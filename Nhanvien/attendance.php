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
          Điểm danh
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Ca làm</li>
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
                    <th>Mã nhân viên</th>
                    <th>Tên</th>
                    <th>Bắt đầu ca</th>
                    <th>Kết thúc ca</th>
                  
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT *, employees.employee_id AS empid, attendance.id AS attid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id ORDER BY attendance.date DESC, attendance.time_in DESC";
                      $query = $conn->query($sql);
                      while($row = $query->fetch_assoc()){
                        // Kiểm tra xem id của nhân viên có khớp với id của người dùng đăng nhập hay không
                        if ($row['empid'] == $_SESSION['employee_id']) {
                            $status = ($row['status'])?'<span class="label label-warning pull-right">Đúng giờ</span>':'<span class="label label-danger pull-right">Trễ</span>';
                            echo "
                              <tr>
                                <td class='hidden'></td>
                                <td>".date('M d, Y', strtotime($row['date']))."</td>
                                <td>".$row['empid']."</td>
                                <td>".$row['firstname'].' '.$row['lastname']."</td>
                                <td>".date('h:i A', strtotime($row['time_in'])).$status."</td>
                                <td>".date('h:i A', strtotime($row['time_out']))."</td>
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
      url: 'attendance_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#datepicker_edit').val(response.date);
        $('#attendance_date').html(response.date);
        $('#edit_time_in').val(response.time_in);
        $('#edit_time_out').val(response.time_out);
        $('#attid').val(response.attid);
        $('#employee_name').html(response.firstname+' '+response.lastname);
        $('#del_attid').val(response.attid);
        $('#del_employee_name').html(response.firstname+' '+response.lastname);
      }
    });
  }
  </script>
  </body>
  </html>
