 <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <!-- Modal -->
                    <div class="modal fade" id="relasiModal" tabindex="-1" role="dialog" aria-labelledby="relasiModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <form class="form-horizontal" action="/app/relasi/insert" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="relasiModalLabel">Tambah Relasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="nama_perusahaan">Nama Perusahaan</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="jenis">Jenis</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-control" id="jenis" name="jenis" onchange="showHidePlafon()">
                                                            <option selected="" disabled="">Pilih Jenis</option>
                                                            <option value="Supplier">Supplier</option>
                                                            <option value="Konsumen">Konsumen</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="alamat_kantor">Alamat Kantor</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="2" placeholder="Masukkan Alamat Kantor"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="alamat_gudang">Alamat Gudang</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="2" placeholder="Masukkan Alamat Gudang"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="nama_pimpinan">Nama Pimpinan</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="Masukkan Nama Pimpinan">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="no_telepon">No. Telepon</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan Nomor Telepon">
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
                                        <button type="reset" class="btn btn-danger">Reset</button>
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
