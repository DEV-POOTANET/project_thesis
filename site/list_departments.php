<?php 
$menu = "dep";
include("header.php");

$query_dep = "SELECT d.dep_id, d.dep_name, d.dep_status,d.dep_fac_id, f.fac_name FROM departments d JOIN faculties f ON d.dep_fac_id = f.fac_id WHERE d.dep_status = 1" ;
$rs_dep = mysqli_query($condb, $query_dep);
?>


  <br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">สาขาวิชา</h3>
        <div align="right">
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูลสาขา</button>
          
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
                    <th>ชื่อสาขา</th>
                    <th>คณะที่สังกัด</th>
                    <th>แก้ไขสาขา</th>
                    <th>ลบสาขา</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_dep as $row_dep) { ?>
                  
                  
                  <tr>
                    <td><?php echo @$l+=1; ?></td>
                    <td><?php echo $row_dep['dep_name']; ?></td>                    
                    <td><?php echo $row_dep['fac_name']; ?></td>                   
                    <td>
                      <p style="margin-bottom: 10px;">
                        <a href="edit_departments.php?dep_id=<?php echo $row_dep['dep_id']; ?>&&dep_fac_id=<?php echo $row_dep['dep_fac_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
                      </p>                   
                    
                    </td>
                    <td><a href="departments_db.php?dep_id=<?php echo $row_dep['dep_id']; ?>&&departments=del" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i>  ลบ</a></td>
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
      <form action="departments_db.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="departments" value="add">

        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสาขา</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ชื่อสาขา </label>
                  <div class="col-sm-10">
                    <input  name="dep_name" type="text" required class="form-control"  placeholder="ชื่อสาขา"  minlength="3"/>
                  </div>
                </div>

                <?php 
                $query_fac_option = "SELECT * FROM faculties WHERE fac_status='1'" ;
                $rs_facot = mysqli_query($condb, $query_fac_option);
                ?>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">คณะที่สังกัด </label>
                  <div class="col-sm-10">
                  <select class="form-control select2" name="dep_fac_id" id="dep_fac_id" required>
                    <option value="">-- เลือกคณะ --</option>
                    <?php foreach ($rs_facot as $row_fac) { ?>
                    <option value="<?php echo $row_fac['fac_id']; ?>"><?php echo $row_fac['fac_name']; ?></option>
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
