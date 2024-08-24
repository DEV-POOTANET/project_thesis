<?php 
$menu = "member";
include("header.php");
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
Where member.mem_status != 2 ;" ;

// Where member.mem_status != 2 and member.mem_level != 0;" ;
$rs_mem = mysqli_query($condb, $query_mem);

?>



<br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">รายการสมาชิก</h3>
        <div align="right">
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูลสมาชิก</button>
          
        </div>
      </div>
      
      <div class="card-body"> <!-- card-body -->

        <div class="container-fluid"><!-- container-fluid -->

          <div class="row"><!-- row -->

            <div class="col-md-12"><!-- col-md-12 -->
            <div class="card-body table-responsive p-0">
              <table id="example1" class="table table-head-fixed text-nowrap">
                <thead>
                  <tr class="danger">
                    <th>No.</th>
                    <th width="10%">รูป</th>
                    <th>รหัสนักศึกษา</th>
                    <th>รหัสประจำตัว ปชช.</th>
                    <th>ชื่อ-สกุล</th>  
                    <th>คณะ</th>  
                    <th>สาขา</th>
                    <th>สถานะ</th>  
                    <th>แก้ไข</th>  
                    <th>ลบ</th>  

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_mem as $row_mem) { ?>
                  
                  
                  <tr>
                    <td><?php echo @$l+=1; ?></td>
                  <td><img src="../assets/img/member/<?php echo $row_mem['mem_img']; ?>" width="30%"></td>
                    <td><?php echo $row_mem['mem_sid']; ?></td>                    
                    <td><?php echo $row_mem['mem_cid']; ?></td> 
                    <td><?php echo $row_mem['mem_name']; ?></td>                   
                    <td><?php echo $row_mem['fac_name']; ?></td>  
                    <td><?php echo $row_mem['dep_name']; ?></td> 
                    
                    <td>
                    <?php if($row_mem['mem_status']=='1'){ ?>
                          <a href="mem_db.php?mem_id=<?php echo $row_mem['mem_id']; ?>&&member=status&&mem_status=0" class="btn btn-success"><i class=""></i>ปกติ</a>
                    <?php } else {?>
                          <a href="mem_db.php?mem_id=<?php echo $row_mem['mem_id']; ?>&&member=status&&mem_status=1" class="btn btn-secondary" ><i class=""></i>ถูกระงับ</a>
                    <?php }?>
                    </td>     

                    <td>
                      <p style="margin-bottom: 10px;">
                        <a href="edit_mem.php?mem_id=<?php echo $row_mem['mem_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
                      </p>                   
                    
                    </td>
                    <td><a href="mem_db.php?mem_id=<?php echo $row_mem['mem_id']; ?>&&member=del" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i>  ลบ</a></td>

                  </tr>
                  <?php }?>
                </tbody>
              </table>
              </div>
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

        <input type="hidden" name="member" value="add">

        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสมาชิก</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รหัสนักศึกษา </label>
                  <div class="col-sm-10">
                    <input  name="mem_sid" type="text" required class="form-control"  placeholder="รหัสนักศึกษา"  minlength="3"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">รหัสบัตรประชาชน </label>
                  <div class="col-sm-10">
                    <input  name="mem_cid" type="text" required class="form-control"  placeholder="รหัสบัตรประชาชน"  minlength="3"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ชื่อ-สกุล </label>
                  <div class="col-sm-10">
                    <input  name="mem_name" type="text" required class="form-control"  placeholder="ชื่อ-สกุล"  minlength="3"/>
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
                    <option value="">-- เลือกสาขา --</option>
                    <?php foreach ($rs_facot as $row_fac) { ?>
                    <option value="<?php echo $row_fac['dep_id']; ?>"><?php echo $row_fac['dep_name']; ?></option>
                    <?php }?>
                  </select>
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
