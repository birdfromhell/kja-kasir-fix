@extends('layout.app')
@section('content')
    <div id="content-page" class="content-page" style="margin-top: 75px">
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Stok Opnem Barang</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Edit Kategori</p>
                    <form id="formUpdateBarang" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Nama Barang
                                Barang:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="barang_id" name="barang_id" required
                                    onchange="updateFields()">
                                    <option value="" selected disabled>Silahkan Pilih Barang</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->barang_id }}" data-stok="{{ $item->stok }}">
                                            {{ $item->barang_id }} - {{ $item->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Sistem:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sistem" name="sistem"
                                    placeholder="Masukkan Sistem" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Phisik:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phisik" name="phisik"
                                    placeholder="Masukkan Phisik">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Ket:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ket" name="ket"
                                    placeholder="Masukkan Keterangan">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btnUpdate" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btnUpdate').click(function () {
                Swal.fire({
                    title: "Do you want to save the changes?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/so-barang-update/",
                            type: "POST",
                            data: $("#formUpdateBarang").serialize(),
                            success: function (response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Berhasil memperbarui data!'
                                }).then((value) => {
                                    location.reload();
                                });
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal memperbarui data: ' + error,
                                    icon: 'error'
                                });
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        function updateFields() {
            var selectedOption = document.getElementById('barang_id').options[document.getElementById('barang_id')
                .selectedIndex];
            var stok = selectedOption.getAttribute('data-stok');
            document.getElementById('sistem').value = stok;
        }
    </script>
@endsection
