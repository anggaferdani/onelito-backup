<div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Auction</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalCreateBody">
            <form action="{{ url('admin/auctions') }}" method="post" id="formData" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kategori_event">Kategori Event</label>
                <select id="kategori_event" name="kategori_event" class="form-control">
                    <option value="Regular">Regular</option>
                    <option value="Special">Special</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi_event">Deskripsi</label>
                <input  type="text" id="deskripsi_event" class="form-control" name="deskripsi_event" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="rules_events">Rules</label>
                <textarea id="rules_events" name="rules_event" class="form-control" placeholder="" required></textarea>
                <!-- <input  type="text" id="rules_events" class="form-control" name="rules_events" placeholder="" required> -->
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tgl. Mulai</label>
                <input  type="text" id="tgl_mulai" class="form-control datepicker" name="tgl_mulai" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="tgl_akhir">Tgl. Akhir</label>
                <input  type="text" id="tgl_akhir" class="form-control datepicker" name="tgl_akhir" placeholder="" min="document.getElementById('tgl_mulai').value">
            </div>
            <div class="form-group">
                <label for="banner">Banner</label>
                <input type="file" name="banner" id="banner" class="form-control">
            </div>
            <div class="form-group">
                <label for="total_hadiah">Total Hadiah</label>
                <input  type="number" id="total_hadiah" class="form-control" name="total_hadiah" placeholder="">
            </div>
            <div class="form-group">
            <label for="auction_products">Barang Lelang</label>
                <select required id="auction_products" name="auction_products[]" class="form-control select2"
                    multiple="">
                    @forelse($auctionProductsNoEvent as $product)
                        <option value="{{ $product->id_ikan }}">No Ikan: {{ $product->no_ikan }} | variety: {{ $product->variety }}</option>
                    @empty

                    @endforelse
                </select>
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
