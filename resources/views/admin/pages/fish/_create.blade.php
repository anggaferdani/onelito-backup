<div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Fish</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalCreateBody">
            <form action="{{ url('admin/fishes') }}" method="post" id="formData" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="no_ikan">No. Ikan</label>
                <input  type="text" id="no_ikan" class="form-control" name="no_ikan" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="variety">Variety</label>
                <input  type="text" id="variety" class="form-control" name="variety" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="breeder">Breeder</label>
                <input  type="text" id="breeder" class="form-control" name="breeder" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="bloodline">Bloodline</label>
                <input  type="text" id="bloodline" class="form-control" name="bloodline" placeholder="">
            </div>
            <div class="form-group">
                <label for="sex">Jenis Kelamin</label>
                <select id="sex" name="sex" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Unknown">Unknown</option>
                </select >
            </div>
            <div class="form-group">
                <label for="dob">DOB</label>
                <input  type="text" id="dob" class="form-control datepicker" name="dob" placeholder="">
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input  type="text" id="size" class="form-control" name="size" placeholder="">
            </div>
            <div class="form-group">
                <label for="harga_ikan">Harga</label>
                <input  type="text" id="harga_ikan" class="form-control" name="harga_ikan" placeholder="">
            </div>
            <div class="form-group">
                <label for="note">Deskripsi</label>
                <textarea id="note" name="note" class="form-control summernote" placeholder=""></textarea>
            </div>
            <div class="form-group">
                <label for="link_video">Link Video</label>
                <input  type="text" id="link_video" name="link_video" class="form-control" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btn-create" class="btn btn-primary">Tambah</button>
        </div>

        </form>
      </div>
    </div>
</div>
