<?php 
$menu = "allowThesis";
include("header.php");
session_start();
$mem_id = $_SESSION['mem_id'];
$query_thesis = "SELECT t.*, m.mem_name
FROM 
    thesis t
JOIN 
    member m ON t.mem_id = m.mem_id
WHERE 
    t.thesis_status != 3 and t.thesis_status != 1;" ;
$rs_thesis = mysqli_query($condb, $query_thesis);

?>

<br>
  <!-- Main content -->
  <section class="content">

  <div class="card card-primary"><!-- card card-gray -->
      <div class="card-header ">
        <h3 class="card-title">งานวิจัยที่รอการอนุมัติ</h3>

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
                    <th width ="5%">ดูเพิ่มเติม</th>    
                    <th width ="5%">ดาวน์โหลด[PDF]</th>
                    <th width ="5%">อนุมัติงานวิจัย</th>  
                    

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
                    <a href="" class="btn btn-info" target="" data-toggle="modal" data-target="#Modal<?php echo $row_thesis['thesis_id'];?>"><i class="fas fas fa-eye"></i></a>
                    <?php include 'detail_thesis_modal.php';?>  
                    </td>
                    

                    
                    <td>
                      <a href="../assets/file/thesis/<?php echo htmlspecialchars($row_thesis['thesis_file']); ?>" class="btn btn-info" download>
                      <i class="fas fa-file-download"></i> ดาวน์โหลด
                      </a>
                    </td>
    
                    <td>
                        <a href="user_list_thesis_db.php?thesis_id=<?php echo $row_thesis['thesis_id']; ?>&&thesis=status&&thesis_status=1" class="btn btn-success"><i class=""></i>อนุมัติงานวิจัย</a>
                    </td> 

                    
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
