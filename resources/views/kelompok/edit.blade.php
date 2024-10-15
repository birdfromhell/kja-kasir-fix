@extends('layout.app')
@section('content')
    <div id="content-page" class="content-page" style="margin-top: 75px">
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Edit Kelompok</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <form id="formUpdateKelompok" class="form-horizontal" action="{{ url('/kelompok-update/' . $kelompokData->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Kode
                                Kategori:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="kode_kategori" name="kode_kategori" required>
                                    @foreach ($kategoriData as $item)
                                        <option value="{{ $item->kode_kategori }}" {{ $item->kode_kategori == $kelompokData->kode_kategori ? 'selected' : '' }}>
                                            {{ $item->kode_kategori }} - {{ $item->kategori_barang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Kelompok
                                Barang:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kelompok_barang" name="kelompok_barang"
                                       placeholder="Masukkan Kategori Barang" value="{{ $kelompokData->kelompok_barang }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btnUpdateKelompok" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#btnUpdateKelompok").click(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Do you want to update the data?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Update",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#formUpdateKelompok").submit();
                    }
                });
            });
        });
    </script>
@endsection
