<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->

    <a href="" class="brand-link bg-primary">
      <img src="../assets/img/logo/Logo-mut.png"
           alt="Logo"
           class="brand-image"
          >
      <span class="brand-text font-weight-light">ระบบรวบรวมวิจัย</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <img src="../assets/img/member/<?php echo $_SESSION['mem_img'];?>" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <div class="info">
        <a href="profile.php" target="" class="d-block"> <?php echo $_SESSION['mem_name'];?> | Profile</a>
        </div>
      </div>



        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-header">เมนู</li>
        
         <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="all"){echo "active";} ?> ">
            <i class="nav-icon fas fa-book"></i>
              <p>งานวิจัยทั้งหมด</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="user_list_thesis.php" class="nav-link <?php if($menu=="thesis"){echo "active";} ?> ">
            <i class="nav-icon fas fa-book"></i>
              <p>งานวิจัยของฉัน </p>
            </a>
          </li>



        </ul>
        <hr>

        <?php
        if ($_SESSION['mem_lev'] != 1) {
        ?>

        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
         <li class="nav-header">จัดการงานวิจัย</li>
       
        <li class="nav-item">
           <a href="manage_thesis.php" class="nav-link <?php if($menu=="manageThesis"){echo "active";} ?> ">
           <i class="nav-icon fas fa-book"></i>
             <p>จัดการงานวิจัย</p>
           </a>
         </li>


         <li class="nav-item">
           <a href="allow_thesis.php" class="nav-link <?php if($menu=="allowThesis"){echo "active";} ?> ">
           <i class="nav-icon fas fa-book"></i>
             <p>รอการอนุมัติ/รอการแก้ไข</p>
           </a>
         </li>



       </ul>
       <hr>

        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
   
          <li class="nav-header">การตั้งค่าข้อมูลระบบ</li>

          <li class="nav-item">
            <a href="list_mem.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>สมาชิก</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_faculties.php" class="nav-link <?php if($menu=="fac"){echo "active";} ?> ">
              <i class="nav-icon fas fa-university"></i>
              <p>คณะ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_departments.php" class="nav-link <?php if($menu=="dep"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>สาขา</p>
            </a>
          </li>


        </ul>
        <?php } ?>
        <hr>


        
       

<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="../logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>