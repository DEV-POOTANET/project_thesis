<?php 
$menu = "thesis";
include("header.php");

$thesis_id = $_GET['thesis_id'];

$query_thesis = "SELECT * FROM thesis WHERE thesis_id = $thesis_id"  ;
$rs_thesis = mysqli_query($condb, $query_thesis);
$row=mysqli_fetch_array($rs_thesis);

?>


  <br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">แก้ไขข้อมูลงานวิจัย</h3>
      </div>
      
      <div class="card-body"> <!-- card-body -->

        <div class="container-fluid"><!-- container-fluid -->

          <div class="row"><!-- row -->

            <div class="col-md-6"><!-- col-md-12 -->
            <form action="user_list_thesis_db.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="thesis" value="edit">
                <input type="hidden" name="thesis_id" value="<?php echo $row['thesis_id'];?>">
                

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ชื่องานวิจัย </label>
                  <div class="col-sm-10">
                    <input  name="thesis_topic" type="text" required class="form-control"  placeholder="กรอกชื่องานวิจัย"  minlength="3" value="<?php echo $row['thesis_topic']; ?>"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">คำอธิบาย </label>
                  <div class="col-sm-10">
                    <textarea name="thesis_description" required class="form-control" placeholder="กรอกคำอธิบาย" minlength="3"><?php echo $row['thesis_description']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">คำสำคัญ </label>
                  <div class="col-sm-10">
                    <input  name="thesis_keyword" type="text" required class="form-control"  placeholder="กรอกคำสำคัญ"  minlength="3" value="<?php echo $row['thesis_keyword']; ?>"/>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="fileToUpload" class="col-sm-2 col-form-label">ไฟล์ [PDF FILE]</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input" accept=".pdf" >
                            <label class="custom-file-label" for="fileToUpload">Choose file</label>
                        </div>  
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

<script>
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = document.getElementById("fileToUpload").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
})
</script>
  
</body>
</html>
