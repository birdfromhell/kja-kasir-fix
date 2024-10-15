 <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <!-- Modal -->
                    <div class="modal fade" id="relasiModal" tabindex="-1" role="dialog" aria-labelledby="relasiModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <form class="form-horizontal" action="/relasi-insert" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="relasiModalLabel">Tambah Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="nama_perusahaan">Kode Kategori</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Kode Kategori">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="jenis">Kode Barang</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Kode Barang">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="alamat_kantor">Stok</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" placeholder="Masukkan Stok"></textarea>
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
