<div class="modal fade" id="modalShow" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Fish</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalShowBody">
        <div class="form-group">
                <label for="show_no_ikan">No. Ikan</label>
                <input readonly type="text" id="show_no_ikan" class="form-control" name="show_no_ikan" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="show_variety">Variety</label>
                <input readonly type="text" id="show_variety" class="form-control" name="show_variety" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="show_breeder">Breeder</label>
                <input readonly type="text" id="show_breeder" class="form-control" name="show_breeder" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="show_bloodline">Bloodline</label>
                <input readonly type="text" id="show_bloodline" class="form-control" name="show_bloodline" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_sex">Jenis Kelamin</label>
                <input readonly type="text" id="show_sex" class="form-control" name="show_sex" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_dob">DOB</label>
                <input readonly type="text" id="show_dob" class="form-control" name="show_dob" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_size">Size</label>
                <input readonly type="text" id="show_size" class="form-control" name="show_size" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_ob">Open Bid</label>
                <input readonly type="text" id="show_ob" class="form-control" name="show_ob" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_kb">Kelipatan Bid</label>
                <input readonly type="text" id="show_kb" class="form-control" name="show_kb" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_link_video">Link Video</label>
                <input readonly type="text" id="show_link_video" class="form-control" name="show_link_video" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_extra_time">Extra Time</label>
                <input readonly type="text" id="show_extra_time" class="form-control" name="show_extra_time" placeholder="">
            </div>
            <div class="form-group">
                <label for="foto">Foto Ikan</label>
                <br>
                <img id="show_foto" src="" style="
                    width: 400px;
                    height: 400px;
                    object-fit: cover;">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
</div>
