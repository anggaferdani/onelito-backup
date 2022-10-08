<div class="modal fade" id="modalEdit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Fish</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalEditBody">
            <form action="{{ url('admin/fishes') }}" method="post" id="formEdit" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="edit_no_ikan">No. Ikan</label>
                <input  type="text" id="edit_no_ikan" class="form-control" name="edit_no_ikan" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="edit_variety">Variety</label>
                <input  type="text" id="edit_variety" class="form-control" name="edit_variety" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="edit_breeder">Breeder</label>
                <input  type="text" id="edit_breeder" class="form-control" name="edit_breeder" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="edit_bloodline">Bloodline</label>
                <input  type="text" id="edit_bloodline" class="form-control" name="edit_bloodline" placeholder="">
            </div>
            <div class="form-group">
                <label for="edit_sex">Jenis Kelamin</label>
                <select id="edit_sex" name="edit_sex" class="form-control">
                    <option value="Jantan">Jantan</option>
                    <option value="Betina">Betina</option>
                </select >
            </div>
            <div class="form-group">
                <label for="edit_dob">DOB</label>
                <input  type="edit_text" id="edit_dob" class="form-control" name="edit_dob" placeholder="">
            </div>
            <div class="form-group">
                <label for="edit_size">Size</label>
                <input  type="edit_text" id="edit_size" class="form-control" name="edit_size" placeholder="">
            </div>
            <div class="form-group">
                <label for="edit_harga_ikan">Harga</label>
                <input  type="number" id="edit_harga_ikan" class="form-control" name="edit_harga_ikan" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Tutup</button>
          <button type="submit" id="btn-create" class="btn btn-primary">Simpan</button>
        </div>

        </form>
      </div>
    </div>
</div>
