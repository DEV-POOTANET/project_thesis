<?php 
$menu = "dep";
include("header.php");

$dep_id = $_GET['dep_id'];

$query_dep = "SELECT d.dep_id, d.dep_name, d.dep_status,d.dep_fac_id, f.fac_name FROM departments d JOIN faculties f ON d.dep_fac_id = f.fac_id WHERE d.dep_status = 1 and dep_id = $dep_id"  ;
$rs_dep = mysqli_query($condb, $query_dep);
$row=mysqli_fetch_array($rs_dep);

?>


  <br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">แก้ไขข้อมูลสาขา</h3>
      </div>
      
      <div class="card-body"> <!-- card-body -->

        <div class="container-fluid"><!-- container-fluid -->

          <div class="row"><!-- row -->

            <div class="col-md-6"><!-- col-md-12 -->
            <form action="departments_db.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="departments" value="edit">
                <input type="hidden" name="dep_id" value="<?php echo $row['dep_id'];?>">
                <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">ชื่อสาขา </label>
                    <div class="col-sm-11">
                        <input  name="dep_name" type="text" required class="form-control"  placeholder="" value="<?php echo $row['dep_name'];?>"   minlength="3"/>
                    </div>
                </div>
                <div class="form-group row">
                    <?php 
                    $query_fac_option = "SELECT * FROM faculties WHERE fac_status='1'" ;
                    $rs_facot = mysqli_query($condb, $query_fac_option);
                    ?>
                    <label for="" class="col-sm-1 col-form-label">คณะที่สังกัด </label>
                    <div class="col-sm-11">
                        <select class="form-control select2" name="dep_fac_id" id="dep_fac_id" required>
                        <option value="<?php echo $row['dep_fac_id']; ?>"><?php echo $row['fac_name']; ?></option>
                        <?php foreach ($rs_facot as $row_fac) { ?>
                        <option value="<?php echo $row_fac['fac_id']; ?>"><?php echo $row_fac['fac_name']; ?></option>
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
