<?php 
$menu = "fac";
include("header.php");

$fac_id = $_GET['fac_id'];

$query_fac = "SELECT * FROM faculties WHERE fac_id = $fac_id"  ;
$rs_fac = mysqli_query($condb, $query_fac);
$row=mysqli_fetch_array($rs_fac);

?>


  <br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">แก้ไขข้อมูลคณะ</h3>
      </div>
      
      <div class="card-body"> <!-- card-body -->

        <div class="container-fluid"><!-- container-fluid -->

          <div class="row"><!-- row -->

            <div class="col-md-6"><!-- col-md-12 -->
            <form action="faculties_db.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="faculties" value="edit">
                <input type="hidden" name="fac_id" value="<?php echo $row['fac_id'];?>">
                <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">ชื่อคณะ </label>
                    <div class="col-sm-11">
                        <input  name="fac_name" type="text" required class="form-control"  placeholder="" value="<?php echo $row['fac_name'];?>"   minlength="3"/>
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
