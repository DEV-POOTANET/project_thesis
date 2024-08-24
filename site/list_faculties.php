<?php 
$menu = "fac";
include("header.php");

$query_fac = "SELECT * FROM faculties WHERE fac_status='1'" ;
$rs_fac = mysqli_query($condb, $query_fac);
?>


  <br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">ข้อมูลคณะ</h3>
        <div align="right">
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูลคณะ</button>
          
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
                    <th>ชื่อคณะ</th>
                    <th>สาขาย่อน</th>
                    <th>แก้ไขคณะ</th>
                    <th>ลบคณะ</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_fac as $row_fac) { ?>
                  
                  
                  <tr>
                    <td><?php echo @$l+=1; ?></td>
                    <td><?php echo $row_fac['fac_name']; ?></td>
                    <td>
                      <a href="" class="btn btn-info" target="" data-toggle="modal" data-target="#Modal<?php echo $row_fac['fac_id'];?>"><i class="fas fas fa-eye"></i> สาขาที่สังกัดคณะ</a>
                      <?php include 'listdepfac_modal.php';?>
                    </td>
                    <td>
                      <p style="margin-bottom: 10px;">
                        <a href="edit_faculties.php?fac_id=<?php echo $row_fac['fac_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
                      </p>                   
                    
                    </td>
                    <td><a href="faculties_db.php?fac_id=<?php echo $row_fac['fac_id']; ?>&&faculties=del" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i>  ลบ</a></td>
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
      <form action="faculties_db.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="faculties" value="add">

        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคณะ</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ชื่อคณะ </label>
                  <div class="col-sm-10">
                    <input  name="fac_name" type="text" required class="form-control"  placeholder="ชื่อคณะ"  minlength="3"/>
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
