@extends('layout.app')

@section('active-barang-masuk', 'active')

@section('active-fb', 'active')

@section('judul', 'Barang Masuk')

@section('link', '/dataFB')

@section('sub-judul', 'Barang Masuk')

@section('aksi-judul', 'Faktur')

@section('barangmasuk')
    <div id="content-page" class="content-page">
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
                        <h4 class="card-title">Faktur Beli (FB)</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Penjualan </p>
                    <form class="form-horizontal" action="/fakturbeli/{{ $id_pb }}/create" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">ID Faktur Beli
                                (FB)</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="id_fb" name="id_fb" placeholder=""
                                    value="{{ $FakturBeliID }}" readonly="true">
                            </div>
                            <div class="col-sm-3">
                                <input type="Date" class="form-control" id="tanggal_fb" name="tanggal_fb"
                                    placeholder="Masukkan tanggal fb" value="{{ $tanggalHariIni }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#detailfb">Detail FB</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">PB (Penerimaan
                                Barang )</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_pb" name="id_pb" placeholder=""
                                    readonly="true" value="{{ $id_pb }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang"> Ket :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ketpb" name="ketpb" placeholder=""
                                    readonly="true" value="Nomor pb adalah {{ $id_pb }}">
                            </div>
                            {{-- <div class="col-sm-10">
                                <input type="text" class="form-control" id="result" name="result" placeholder=""
                                    readonly="true" value="">
                            </div> --}}

                        </div>
                        @php
                            $jumlah = 0;
                            $hargaAkhir = 0;
                            $total = 0;
                        @endphp
                        @foreach ($detail as $detaillagi)
                            @foreach ($detaillagi as $details)
                                @php
                                    $stok = $details['stok'] ?? 0;
                                    $harga = $details['harga'] ?? 0;
                                    $diskon = $details['diskon'] ?? 0;
                                    $potongan = $details['potongan'] ?? 0;

                                    // Hitung total diskon
                                    $a = $stok * $harga;
                                    $b = $a * ($diskon / 100);
                                    $c = $stok * $potongan;
                                    // Hitung total potongan

                                    $hargaAkhir = $a - $b - $c;

                                    // Tambahkan harga akhir ke jumlah total
                                    $jumlah += $hargaAkhir;
                                @endphp
                            @endforeach
                        @endforeach
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">Total
                                Pembelian : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="total_pembelian" name="total_pembelian"
                                    placeholder="" readonly="true" value="{{ $jumlah }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">Pembayaran :
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pembayaran" name="pembayaran" placeholder=""
                                    readonly="true" value=0>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="detailfb">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Faktur : </h5>
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
                                                    <td>
                                                        <input type="text" class="form-control" id="no"
                                                            name="no" placeholder="" value="1">
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
                                                    <td><input type="text" class="form-control" id="debit"
                                                            name="debit[]" placeholder="" value="{{ $jumlah }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="kredit"
                                                            name="kredit[]" placeholder="" value="0">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" id="ket[]"
                                                            name="ket[]" placeholder=""
                                                            value="Nomor PB adalah {{ $id_pb }}">
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
                            <button type="submit" class="btn btn-primary" id="fbFormSubmit">Tambah</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tambahkan library jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                var lastDebit = newAkunForm.querySelector('#debit');
                var lastKredit = newAkunForm.querySelector('#kredit');
                var jumlahInput = newAkunForm.querySelector('#jumlah').value;

                var lastStatus = container.getAttribute('data-status');

                if (lastStatus === 'debit') {
                    lastDebit.value = '0';
                    lastKredit.value = jumlahInput;
                } else {
                    lastDebit.value = jumlahInput;
                    lastKredit.value = '0';
                }

                container.setAttribute('data-status', (lastStatus === 'debit') ? 'kredit' : 'debit');

                var deleteButton = newAkunForm.querySelector('#btnHapusAkun');
                deleteButton.addEventListener('click', function() {
                    container.removeChild(newAkunForm);
                    updateNomorUrut();
                });
            }

            // Kredit
            // function tambahAkunForm() {
            //     var container = document.getElementById('akunBaruContainer');
            //     var newAkunForm = container.firstElementChild.cloneNode(true);

            //     // Mengatur nomor untuk elemen baru
            //     var nomorTerakhir = container.children.length + 1;
            //     newAkunForm.querySelector('#no').value = nomorTerakhir;

            //     var newId = 'akunBaru_' + nomorTerakhir;
            //     newAkunForm.id = newId;

            //     newAkunForm.querySelectorAll('[id]').forEach(function(element) {
            //         element.id = element.id.replace('akunBaruContainer', newId);
            //     });

            //     container.appendChild(newAkunForm);

            //     var lastDebit = newAkunForm.querySelector('#debit');
            //     var lastKredit = newAkunForm.querySelector('#kredit');
            //     var jumlahInput = newAkunForm.querySelector('#jumlah').value;

            //     var lastStatus = container.getAttribute('data-status');

            //     // if (lastStatus === 'debit') {
            //     //     lastDebit.value = '0';
            //     //     lastKredit.value = jumlahInput;
            //     // } else {
            //     //     lastDebit.value = jumlahInput;
            //     //     lastKredit.value = '0';
            //     // }

            //     if (lastStatus === 'kredit') {
            //         lastDebit.value = jumlahInput;
            //         lastKredit.value = '0';
            //     } else {
            //         lastDebit.value = '0';
            //         lastKredit.value = jumlahInput;
            //     }

            //     container.setAttribute('data-status', (lastStatus === 'kredit') ? 'debit' : 'kredit');

            //     var deleteButton = newAkunForm.querySelector('#btnHapusAkun');
            //     deleteButton.addEventListener('click', function() {
            //         container.removeChild(newAkunForm);
            //         updateNomorUrut();
            //     });
            // }

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
            $(document).ready(function() {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $('#fbFormSubmit').click(function(event) {
                    event.preventDefault();

                    // Menonaktifkan tombol setelah diklik
                    $(this).prop('disabled', true);

                    Swal.fire({
                        title: 'warning',
                        title: "Apakah anda yakin?",
                        showCancelButton: true,
                        confirmButtonText: "Yakin",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var id_fb = $('#id_fb').val();
                            var tanggal_fb = $('#tanggal_fb').val();
                            var id_pb = $('#id_pb').val();
                            var ketpb = $('#ketpb').val();
                            var jatuh_tempo = $('#jatuh_tempo').val();
                            var total_pembelian = $('#total_pembelian').val();
                            var pembayaran = $('#pembayaran').val();
                            var no_subbukubesar = $('select[name="no_subbukubesar[]"]').map(function() {
                                return this.value;
                            }).get();
                            var kredit = $('input[name="kredit[]"]').map(function() {
                                return this.value;
                            }).get();
                            var debit = $('input[name="debit[]"]').map(function() {
                                return this.value;
                            }).get();
                            var ket = $('input[name="ket[]"]').map(function() {
                                return this.value;
                            }).get();

                            var formData = {
                                _token: csrfToken,
                                id_fb: id_fb,
                                tanggal_fb: tanggal_fb,
                                id_pb: id_pb,
                                ketpb: ketpb,
                                total_pembelian: total_pembelian,
                                pembayaran: pembayaran,
                                no_subbukubesar: no_subbukubesar,
                                kredit: kredit,
                                debit: debit,
                                ket: ket
                            };

                            var method = 'get';
                            var action = 'Faktur Beli';
                            var id = id_fb;
                            var url = '/fakturbeli/' + id_pb + '/create';
                            console.log(formData);
                            $.ajax({
                                method: method,
                                url: url,
                                data: formData,
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Success',
                                        icon: 'success',
                                        text: 'Berhasil membuat ' +
                                            action + ' dengan id : ' +
                                            id
                                    }).then(() => {
                                        window.location.href = '/dataFB';
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Failed to update status: ' + error,
                                        icon: 'error'
                                    });
                                },
                                complete: function() {
                                       // Mengaktifkan tombol setelah AJAX selesai
                                    $('#fbFormSubmit').prop('disabled', false);
                                }
                            });
                        } else {
                            // Jika pengguna membatalkan sweetalert, aktifkan kembali tombol
                            $('#fbFormSubmit').prop('disabled', false);
                        }
                    });
                });
            });
        </script>
    @endsection
