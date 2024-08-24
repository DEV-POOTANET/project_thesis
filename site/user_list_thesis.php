<?php 
$menu = "thesis";
include("header.php");
session_start();
$mem_id = $_SESSION['mem_id'];
$query_thesis = "SELECT t.*, m.mem_name
FROM 
    thesis t
JOIN 
    member m ON t.mem_id = m.mem_id
WHERE 
    t.thesis_status != 3 and t.mem_id =$mem_id;" ;
$rs_thesis = mysqli_query($condb, $query_thesis);

?>

<br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">งานวิจัยของฉัน</h3>
        <div align="right">
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูลงานวิจัย</button>
          
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
                    <th width ="5%">No.</th>
                    <th>ชื่องานวิจัย</th>
                    <th>คำสำคัญ</th>  
                    <th width ="10%">วันที่เผยแพร่</th>
                    <th width ="5%">สถานะ</th>  
                    <th width ="5%">ดูเพิ่มเติม</th>    
                    <th width ="5%">ดาวน์โหลด[PDF]</th>
                    <th width ="5%">แก้ไข</th>  
                    <th width ="5%">ลบ</th>  

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rs_thesis as $row_thesis) { ?>
                  <tr>
                    <td><?php echo @$l+=1; ?></td>
                    <td><?php echo $row_thesis['thesis_topic']; ?></td>
                    <td><?php echo $row_thesis['thesis_keyword']; ?></td>                   
                    <td><?php echo $row_thesis['thesis_date']; ?></td>  
                    
                    <td>
                    <?php if($row_thesis['thesis_status']=='1'){ ?>
                          <button class="btn btn-success">สาธารณะ</button>
                    <?php } else {?>
                          <button class="btn btn-danger">รอการอนุมัติ</button>
                    <?php }?>
                    </td> 
                    
                    <td>
                    <a href="" class="btn btn-info" target="" data-toggle="modal" data-target="#Modal<?php echo $row_thesis['thesis_id'];?>"><i class="fas fas fa-eye"></i></a>
                    <?php include 'detail_thesis_modal.php';?>  
                    </td>
                    

                    
                    <td>
                      <a href="../assets/file/thesis/<?php echo htmlspecialchars($row_thesis['thesis_file']); ?>" class="btn btn-info" download>
                      <i class="fas fa-file-download"></i> ดาวน์โหลด
                      </a>
                    </td>
    

                    <td>
                      <p style="margin-bottom: 10px;">
                        <a href="edit_user_thesis.php?thesis_id=<?php echo $row_thesis['thesis_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> แก้ไข</a>
                      </p>                   
                    </td>

                    <td><a href="user_list_thesis_db.php?thesis_id=<?php echo $row_thesis['thesis_id']; ?>&&thesis=del" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i>  ลบ</a></td>

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
      <form action="user_list_thesis_db.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="thesis" value="add">

        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลงานวิจัย</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ชื่องานวิจัย </label>
                  <div class="col-sm-10">
                    <input  name="thesis_topic" type="text" required class="form-control"  placeholder="กรอกชื่องานวิจัย"  minlength="3"/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">คำอธิบาย </label>
                  <div class="col-sm-10">
                    <textarea name="thesis_description" required class="form-control" placeholder="กรอกคำอธิบาย" minlength="3"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">คำสำคัญ </label>
                  <div class="col-sm-10">
                    <input  name="thesis_keyword" type="text" required class="form-control"  placeholder="กรอกคำสำคัญ"  minlength="3"/>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="fileToUpload" class="col-sm-2 col-form-label">ไฟล์ [PDF FILE]</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" name="fileToUpload" id="fileToUpload" required class="custom-file-input" accept=".pdf">
                            <label class="custom-file-label" for="fileToUpload">Choose file</label>
                        </div>  
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

<script>
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = document.getElementById("fileToUpload").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
})
</script>

  
</body>
</html>
