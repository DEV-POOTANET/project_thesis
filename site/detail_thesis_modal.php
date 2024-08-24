

<div class="modal fade" id="Modal<?php echo $row_thesis['thesis_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
              <h5 class="modal-title" id="exampleModalLabel">ข้อมูลงานวิจัย</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">ชื่องานวิจัย </label>
                  <div class="col-sm-10">
                    <input  name="thesis_topic" type="text" required class="form-control"  placeholder=""  minlength="3" value="<?php echo $row_thesis['thesis_topic']; ?>" disabled/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">จัดทำโดย </label>
                  <div class="col-sm-10">
                    <input  name="thesis_topic" type="text" required class="form-control"  placeholder=""  minlength="3" value="<?php echo $row_thesis['mem_name']; ?>" disabled/>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">คำอธิบาย </label>
                  <div class="col-sm-10">
                    <textarea name="thesis_description" required class="form-control" placeholder="" minlength="3" disabled ><?php echo $row_thesis['thesis_description']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">คำสำคัญ </label>
                  <div class="col-sm-10">
                    <input  name="thesis_keyword" type="text" required class="form-control"  placeholder=""  minlength="3" value="<?php echo $row_thesis['thesis_keyword']; ?>" disabled />
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">วันที่เผยแพร่ </label>
                  <div class="col-sm-10">
                    <input  name="thesis_keyword" type="text" required class="form-control"  placeholder=""  minlength="3" value="<?php echo $row_thesis['thesis_date']; ?>" disabled />
                  </div>
                </div>



              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
              </div>
        </div>
     
    </div>
  </div>