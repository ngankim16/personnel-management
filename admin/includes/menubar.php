<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['username']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Báo cáo</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span></a></li>
        <li class="header">Quản Lý</li>
        
        <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Chấm Công</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Nhân viên</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="employee.php"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Ngoài giờ</a></li>
            <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i>Ứng tiền</a></li>
            <li><a href="schedule.php"><i class="fa fa-circle-o"></i> Giờ làm</a></li>
          </ul>
        </li>
  
        <li><a href="position.php"><i class="fa fa-suitcase"></i> Vị trí</a></li>
        <li class="header">Bảng in</li>
        <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Lương</span></a></li>
        <li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Lịch làm</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>