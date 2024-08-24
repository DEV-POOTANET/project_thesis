<?php 
$menu = "";
include("header.php");
$mem_id = $_SESSION['mem_id'];
$query_mem = "SELECT 
    member.mem_id,
    member.mem_sid,
    member.mem_cid,
    member.mem_name,
    departments.dep_name,
    faculties.fac_name,
    member.mem_username,
    member.mem_status,
    member.mem_level,
    member.mem_img
FROM 
    member
JOIN 
    departments ON member.mem_dep_id = departments.dep_id
JOIN 
    faculties ON departments.dep_fac_id = faculties.fac_id
Where  member.mem_id = $mem_id " ;
$rs_mem = mysqli_query($condb, $query_mem);
$row=mysqli_fetch_array($rs_mem);
?>





<section class="content-header">
  <div class="container-fluid"><h1>ข้อมูลส่านตัว</h1></div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">แก้ไขข้อมูลส่านตัว</h3>
        <div align="right">
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"> เปลี่ยนรหัสผ่าน</button>
          
        </div>
      </div>
      
      <div class="card-body"> <!-- card-body -->

        <div class="container-fluid"><!-- container-fluid -->

          <div class="row"><!-- row -->

            <div class="col-md-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header"> <label>รูปภาพ</label></div>
                    <div class="card-body text-center">
                        <img src="../assets/img/member/<?php echo $row['mem_img'];?>" class="img-circle profile-avatar" alt="User avatar" width="150px">
                        <div class="small font-italic text-muted mb-4">รูปโปรไฟล์ของคุณ</div>
                        <!-- <button class="btn btn-primary" type="button">อัพโหลดรูป</button> -->
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header"> <label>ข้อมูลส่านตัว</label></div>
                    
                        <div class="card-body">
                            <div class="form-group">
                                <label>ชื่อ-สกุล</label>
                                <input type="text" class="form-control" id="" placeholder="ชื่อ-สกุล" value="<?php echo $row['mem_name']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>รหัสประจำตัว</label>
                                <input type="text" class="form-control" id="" placeholder="รหัสประจำตัว" value="<?php echo $row['mem_sid']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>รหัสบัตรประชาชน</label>
                                <input type="text" class="form-control" id="" placeholder="รหัสบัตรประชาชน" value="<?php echo $row['mem_cid']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" id="" placeholder="Username" value="<?php echo $row['mem_username']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>คณะที่สังกัด</label>
                                <input type="text" class="form-control" id="" placeholder="" value="<?php echo $row['fac_name']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label>สาขาที่สังกัด</label>
                                <input type="text" class="form-control" id="" placeholder="" value="<?php echo $row['dep_name']; ?>" disabled>
                            </div>
                    
                        </div>

               
                  
                </div>
            </div>

          </div><!-- end row -->

        </div><!-- end container-fluid -->

      </div> <!-- end card-body -->

  </div><!-- end card card-gray -->
    
    
    
    
    
  </section>
  <!-- /.content -->

   <!-- modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="mem_db.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="member" value="editPass">
        <input type="hidden" name="mem_id" value="<?php echo $row['mem_id'];?>">
        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนรหัสผ่าน </h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
               
            <div class="alert alert-warning"><h4>เปลี่ยนรหัสผ่าน</h4></div>
            <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รหัสผ่านเก่า </label>
                  <div class="col-sm-10">
                    <input  name="mem_pass" type="password" required class="form-control"  placeholder="รหัสผ่านเก่า"  minlength="3"/>
                  </div>
            </div>
            <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รหัสผ่านใหม่ </label>
                  <div class="col-sm-10">
                    <input  name="mem_newpass" type="password" required class="form-control"  placeholder="รหัสผ่านใหม่"  minlength="3"/>
                  </div>
            </div>
            <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ยืนยันรหัสผ่านใหม่ </label>
                  <div class="col-sm-10">
                    <input  name="mem_newpass2" type="password" required class="form-control"  placeholder="ยืนยันรหัสผ่านใหม่"  minlength="3"/>
                  </div>
            </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ยืนยัน</button>
              </div>
        </div>
      </form>
    </div>
  </div>
  
  
  <?php include('footer.php'); ?>
  <script>
  $(function () {
  $(".datatable").DataTable();
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
  });
  });
  </script>
  
</body>
</html>
