<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">

                <!-- Modal -->
                <div class="modal fade" id="#tipeModal" tabindex="-1" role="dialog" aria-labelledby="relasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <form class="form-horizontal" action="{{ url('app/barang/insert') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="relasiModalLabel">Tambah Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="nama_barang">Nama Barang</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="satuan">Satuan</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-2 align-self-center mb-0" for="kategori">Kategori:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="kategori" name="kategori" required>
                                                        <option value="" selected disabled>Silahkan Pilih kategori</option>
                                                        @foreach ($kategori as $item)
                                                            <option value="{{ $item->kode_kategori }}">
                                                                {{ $item->kode_kategori }} - {{ $item->kategori_barang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-2 align-self-center mb-0" for="kelompok">Kelompok Barang:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="kelompok" name="kelompok" required>
                                                        <option value="" selected disabled>Pilih Kategori terlebih dahulu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-2 align-self-center mb-0" for="harga_beli">Harga Beli:</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="display:none;" id="plafonDebit">
                                            <div class="form-group">
                                                <label class="form-label" for="plafon_debit">Plafon Debit</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="plafon_debit" name="plafon_debit" placeholder="Masukkan Plafon Debit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="display:none;" id="plafonKredit">
                                            <div class="form-group">
                                                <label class="form-label" for="plafon_kredit">Plafon Kredit</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="plafon_kredit" name="plafon_kredit" placeholder="Masukkan Plafon Kredit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <button type="reset" class="btn iq-bg-danger">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showHidePlafon() {
        var jenisSelect = document.getElementById("jenis");
        var plafonDebit = document.getElementById("plafonDebit");
        var plafonKredit = document.getElementById("plafonKredit");

        if (jenisSelect.value === "Supplier") {
            plafonDebit.style.display = "block";
            plafonKredit.style.display = "none";
        } else if (jenisSelect.value === "Konsumen") {
            plafonDebit.style.display = "none";
            plafonKredit.style.display = "block";
        } else {
            plafonDebit.style.display = "none";
            plafonKredit.style.display = "none";
        }
    }
</script>

