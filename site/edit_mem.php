<?php 
$menu = "member";
include("header.php");
$mem_id = $_GET['mem_id'];

$query_mem = "SELECT m.*, d.dep_name
FROM member m
INNER JOIN departments d ON m.mem_dep_id = d.dep_id
WHERE m.mem_id = $mem_id;";
$rs_mem = mysqli_query($condb, $query_mem);
$row=mysqli_fetch_array($rs_mem);
?>


  <br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">แก้ไขข้อมูลสมาชิก</h3>
        <div align="right">
          
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"> รีเซ็ตรหัสผ่าน </button>
          
        </div>
      </div>
      
      <div class="card-body"> <!-- card-body -->

        <div class="container-fluid"><!-- container-fluid -->

          <div class="row"><!-- row -->

            <div class="col-md-12"><!-- col-md-12 -->
                <form action="mem_db.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="member" value="edit">
                <input type="hidden" name="mem_id" value="<?php echo $row['mem_id'];?>">

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รหัสนักศึกษา </label>
                  <div class="col-sm-10">
                    <input  name="mem_sid" type="text" required class="form-control" value="<?php echo $row['mem_sid'];?>" placeholder="รหัสนักศึกษา"  minlength="3"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รหัสบัตรประชาชน </label>
                  <div class="col-sm-10">
                    <input  name="mem_cid" type="text" required class="form-control" value="<?php echo $row['mem_cid'];?>" placeholder="รหัสบัตรประชาชน"  minlength="3"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ชื่อ-สกุล </label>
                  <div class="col-sm-10">
                    <input  name="mem_name" type="text" required class="form-control" value="<?php echo $row['mem_name'];?>"  placeholder="ชื่อ-สกุล"  minlength="3"/>
                  </div>
                </div>

                <?php 
                $query_fac_option = "SELECT * FROM departments WHERE dep_status='1'" ;
                $rs_facot = mysqli_query($condb, $query_fac_option);
                ?>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">สาขาที่สังกัด </label>


                  <div class="col-sm-10">
                        <select class="form-control select2" name="dep_id" id="dep_id" required>
                        <option value="<?php echo $row['mem_dep_id']; ?>" ><?php echo $row['dep_name']; ?></option>
                        <?php foreach ($rs_facot as $row_fac) { ?>
                        <option value="<?php echo $row_fac['dep_id']; ?>"><?php echo $row_fac['dep_name']; ?></option>
                        <?php }?>
                        </select>
                    </div>



                </div>

                <br>
                <button type="submit" class="btn btn-danger btn-block">Update</button>

                </form>
            </div><!-- end col-md-12 -->

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

        <input type="hidden" name="member" value="rePass">
        <input type="hidden" name="mem_id" value="<?php echo $row['mem_id'];?>">
        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">รีเซ็ตรหัสผ่าน </h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
               
            <div class="alert alert-warning"><h4>ท่านต้องการรีเซ็ตรหัสผ่านของ <?php echo $row['mem_name'];?> เป็นค่าเริ่มต้นหรือไม่</h4></div>
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
