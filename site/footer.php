</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b>1.0
    </div>
    <strong>Copyright &copy; 2024 DEV POOTANET.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->



<script src="../assets/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="../assets/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../assets/jquery.dataTables.js"></script>
<script src="../assets/dataTables.bootstrap4.js"></script>
<script src="../assets/tagsinput.js?v=1"></script>

<script src="../assets/sweetalert2@9.js"></script>

<script src="../assets/adminlte.min.js"></script>

<!-- AdminLTE App -->
<script src="../assets/demo.js"></script>



<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script>
$(function() {


    $('#example1').DataTable({
        "order": [
            [0, "asc"]
        ],
        "lengthMenu": [
            [10 ,25, 50, -1],
            [10 ,25, 50, "All"]
        ],

    });

    

});
</script>











<?php if(isset($_GET['faculties_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_faculties.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['faculties_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขข้อมูลคณะสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_faculties.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['faculties_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_faculties.php';
    }
  });
</script>
<?php } ?>





<?php if(isset($_GET['departments_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_departments.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['departments_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_departments.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['departments_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_departments.php';
    }
  });
</script>
<?php } ?>




<?php if(isset($_GET['mem_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_mem.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['mem_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_mem.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['mem_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_mem.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['mem_status'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'อัพเดทสถานะสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_mem.php';
    }
  });
</script>
<?php } ?>


<?php if(isset($_GET['mem_rePass'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'รีเซ็ตรหัสผ่านสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'profile.php';
    }
  });
</script>
<?php } ?>


<?php if(isset($_GET['admin_rePass'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'รีเซ็ตรหัสผ่านสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'list_mem.php';
    }
  });
</script>
<?php } ?>


<?php if(isset($_GET['user_thesis_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'เพิ่มงานวิจัยสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'user_list_thesis.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['user_thesis__del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบงานวิจัยสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'user_list_thesis.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['user_thesis_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขงานวิจัยสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'user_list_thesis.php';
    }
  });
</script>
<?php } ?>

<?php if(isset($_GET['admin_thesis_status0'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'จัดการสถานะวิจัยสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
}).then((result) => {
    if (result.isConfirmed) {
      window.location = 'manage_thesis.php';
    }
  }); 
</script>
<?php } ?>













