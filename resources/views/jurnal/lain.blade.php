@extends('layout.app')
@section('content')
    <div id="content-page" class="content-page" style="margin-top: 75px">
        @if (session('error'))
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-error');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-success');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        @if (session('status'))
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-status');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Jurnal Lain</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Jurnal </p>
                    <form class="form-horizontal" action="/input-lain" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">ID Jurnal</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="id_jurnal" name="id_jurnal" placeholder=""
                                    value="{{ $purchaseOrderId }}" readonly="true">
                            </div>
                            <div class="col-sm-3">
                                <input type="Date" class="form-control" id="tanggal" name="tanggal"
                                    placeholder="Masukkan tanggal" value="{{ $tanggalHariIni }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#detailfb">Jurnal</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang"> Ket :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ketsj" name="ketsj" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang"> Nominal
                                :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nominal" name="nominal" placeholder="">
                            </div>
                        </div>
                        {{-- Jurnal --}}
                        <div class="form-group row">
                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="detailfb">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Jurnal : </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <td>No</td>
                                                    <td>Nama Buku Besar</td>
                                                    <td>Debit</td>
                                                    <td>Kredit</td>
                                                    <td>Ket</td>
                                                    <td>Aksi</td>
                                                </thead>
                                                <tbody id="akunBaruContainer">
                                                    @php
                                                        $jumlah = 0;
                                                        $hargaAkhir = 0;
                                                        $total = 0;
                                                    @endphp
                                                    <td>
                                                        <input type="text" class="form-control" id="no"
                                                            name="no" placeholder="" value="1" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" id="jumlah" value="{{ $jumlah }}">
                                                        <select class="form-control" id="no_subbukubesar[]"
                                                            name="no_subbukubesar[]" required>
                                                            <option value="" selected disabled>Silahkan pilih
                                                                akun
                                                            </option>
                                                            @foreach ($akun as $item)
                                                                <option value="-" disabled>
                                                                    <strong>{{ $item->no_bukubesar }} -
                                                                        {{ $item->ket }}</strong>
                                                                </option>
                                                                @foreach ($item->subBukuBesar as $akun)
                                                                    @php
                                                                        $selectedAccount = $akun->no_subbukubesar;
                                                                    @endphp
                                                                    <option value="{{ $selectedAccount }}">
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $akun->no_subbukubesar }}
                                                                        - {{ $akun->ket }}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="debit"
                                                            name="debit[]" placeholder="" value="0" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="kredit"
                                                            name="kredit[]" placeholder="" value="0" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="ket[]"
                                                            name="ket[]" placeholder="" readonly>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger"
                                                            id="btnHapusAkun">Hapus
                                                            Akun</button>
                                                    </td>

                                                </tbody>
                                            </table>
                                            <!-- Bidang formulir Akun yang dapat diulang akan ditambahkan di sini secara dinamis -->
                                        </div>
                                        <!-- disini -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" id="btnTambahAkun">Tambah
                                                Akun</button>
                                            <button type="button" class="btn btn-primary" id="submitModal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var container = document.getElementById('akunBaruContainer');
                container.setAttribute('data-status', 'debit');

                document.getElementById('btnTambahAkun').addEventListener('click', function() {
                    tambahAkunForm();
                });

                document.getElementById('submitModal').addEventListener('click', function() {
                    $('#detailfb').modal('hide');
                });
            });

            function tambahAkunForm() {
                var container = document.getElementById('akunBaruContainer');
                var newAkunForm = container.firstElementChild.cloneNode(true);

                // Mengatur nomor untuk elemen baru
                var nomorTerakhir = container.children.length + 1;
                newAkunForm.querySelector('#no').value = nomorTerakhir;

                var newId = 'akunBaru_' + nomorTerakhir;
                newAkunForm.id = newId;

                newAkunForm.querySelectorAll('[id]').forEach(function(element) {
                    element.id = element.id.replace('akunBaruContainer', newId);
                });

                container.appendChild(newAkunForm);

                // Menangkap elemen input debit dan kredit
                var inputDebit = newAkunForm.querySelector('#debit');
                var inputKredit = newAkunForm.querySelector('#kredit');

                // Menambahkan event listener untuk mentransfer nilai dari debit ke kredit dan sebaliknya
                if (inputKredit.value === '0') {
                    inputKredit.value = inputDebit.value;
                    inputDebit.value = '0';
                } else if (inputDebit.value === '0') {
                    inputDebit.value = inputKredit.value;
                    inputKredit.value = '0';
                }

                // Menambahkan event listener untuk mentransfer nilai dari debit ke kredit dan sebaliknya
                var deleteButton = newAkunForm.querySelector('#btnHapusAkun');
                deleteButton.addEventListener('click', function() {
                    container.removeChild(newAkunForm);
                    updateNomorUrut();
                });


            }

            // Fungsi untuk mengupdate nomor urut setelah menghapus akun
            function updateNomorUrut() {
                var container = document.getElementById('akunBaruContainer');
                var forms = container.children;

                for (var i = 0; i < forms.length; i++) {
                    forms[i].querySelector('#no').value = i + 1;
                }
            }
        </script>

        <script>
            // Menangkap inputan pada input dengan id "ketsj"
            var inputKetSJ = document.getElementById("ketsj");

            // Menambahkan event listener untuk mengupdate nilai input "ket[]" ketika nilai input "ketsj" berubah
            inputKetSJ.addEventListener("input", function() {
                // Menangkap nilai dari input "ketsj"
                var nilaiKetSJ = inputKetSJ.value;

                // Menangkap elemen input "ket[]"
                var inputKet = document.getElementById("ket[]");

                // Mengupdate nilai input "ket[]" dengan nilai dari input "ketsj"
                inputKet.value = nilaiKetSJ;
            });
        </script>

        <script>
            // Menangkap inputan pada input dengan id "nominal"
            var inputNominal = document.getElementById("nominal");

            // Menambahkan event listener untuk mengupdate nilai input "debit[]" ketika nilai input "nominal" berubah
            inputNominal.addEventListener("input", function() {
                // Menangkap nilai dari input "nominal"
                var nilaiNominal = inputNominal.value;

                // Menangkap elemen input "debit[]"
                var inputDebit = document.getElementById("debit");

                // Mengupdate nilai input "debit[]" dengan nilai dari input "nominal"
                inputDebit.value = nilaiNominal;
            });
        </script>


    @endsection
