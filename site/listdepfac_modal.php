<?php
$fac_id=$row_fac['fac_id'];
$query_dep = "SELECT * FROM departments WHERE dep_status='1' and dep_fac_id = $fac_id" ;
$rs_dep = mysqli_query($condb, $query_dep);
$num=mysqli_num_rows($rs_dep);
?>



<div class="modal fade" id="Modal<?php echo $row_fac['fac_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      

        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">สาขาที่สังกัด <?php echo $row_fac['fac_name'];?> </h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <?php 
                if($num==0)
                {  
                ?>
                <div class="alert alert-warning"><h3>ไม่มีสาขาที่สังกัด</h3></div>
                <?php
                }
                ?>
               
            <table id="example1" class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>สาขา</th>
                    </tr>
                  </thead>
                  <?php
                while($row=mysqli_fetch_assoc($rs_dep)){
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['dep_name']; ?></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
               
            </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
              </div>
        </div>
     
    </div>
  </div>