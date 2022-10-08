<div class="modal fade" id="modalShow" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Barang Store</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalShowBody">
            <div class="form-group">
                <label for="show_category">Kategori</label>
                <input readonly type="text" id="show_category" class="form-control" name="show_category" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="show_merek_produk">Merek</label>
                <input readonly type="text" id="show_merek_produk" class="form-control" name="show_merek_produk" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="show_nama_produk">Nama</label>
                <input readonly type="text" id="show_nama_produk" class="form-control" name="show_nama_produk" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="show_berat">Berat</label>
                <input readonly type="text" id="show_berat" class="form-control" name="show_berat" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_harga">Harga</label>
                <input readonly type="text" id="show_harga" class="form-control" name="show_harga" placeholder="">
            </div>
            <div class="form-group">
                <label for="show_deskripsi">Deskripsi</label>
                <input readonly type="text" id="show_deskripsi" class="form-control" name="show_deskripsi" placeholder="">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
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
