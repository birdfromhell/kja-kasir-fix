@extends('layout.app')
@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="card-title">Edit Kategori</h5>
                            </div>
                        </div>
                        <div class="row g-gs">
                            <div class="col-lg-6">
                                <div class="card h-100">
                                    <div class="card-inner">
                                        <form id="formUpdateKategori" class="form-horizontal">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="kategori_barang">Kategori Barang:</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" placeholder="Masukkan Kategori Barang" value="{{ $data->kategori_barang }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="btnUpdateKategori">Update</button>
                                                <button type="reset" class="btn btn-danger" style="margin-left: 10px;">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Komponen lain tetap tidak berubah -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#btnUpdateKategori").click(function() {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan mengupdate kategori barang!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/app/kategori/update/{{ $data->id }}",
                            type: "POST",
                            data: $("#formUpdateKategori").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: 'Kategori barang berhasil diupdate!',
                                }).then((value) => {
                                    window.location.href = "/app/kategori"
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal mengupdate kategori barang: ' + error,
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
@endsection
