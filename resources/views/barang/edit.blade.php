    @extends('layout.app')

    @section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="{{ url('/barang') }}">
                                    <em class="icon ni ni-arrow-left"></em>
                                    <span>Back to Barang</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                @if (session('error'))
                                    <div class="alert text-white bg-primary" role="alert">
                                        <div class="iq-alert-text">{!! session('error') !!}</div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ri-close-line"></i>
                                        </button>
                                    </div>
                                @endif
                                
                                <form class="form-validate" id="formUpdateBarang" action="{{ url('/barang-update/' . $barang->id) }}" method="POST">
                                    @csrf
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="nama_barang">Nama Barang</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="{{ $barang->nama_barang }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="satuan">Satuan</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" value="{{ $barang->satuan }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="kategori">Kategori</label>
                                                <select class="form-control" id="kategori" name="kategori_id" required>
                                                    @foreach ($kategori as $kat)
                                                        <option value="{{ $kat->id }}" {{ $kat->id == $barang->kategori_id ? 'selected' : '' }}>
                                                            {{ $kat->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="kelompok">Kelompok</label>
                                                <select class="form-control" id="kelompok" name="kelompok_id" required>
                                                    @foreach ($kelompok as $kel)
                                                        <option value="{{ $kel->id }}" {{ $kel->id == $barang->kelompok_id ? 'selected' : '' }}>
                                                            {{ $kel->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="harga_beli">Harga Beli</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli" value="{{ $barang->harga_beli }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="btnUpdateBarang">Update</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <a href="{{ url('/app/barang') }}" class="btn btn-secondary">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#btnUpdateBarang').click(function() {
            Swal.fire({
                title: "Apakah Anda ingin menyimpan perubahan?",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $("#formUpdateBarang").attr('action'),
                        type: "POST",
                        data: $("#formUpdateBarang").serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: 'Sukses',
                                icon: 'success',
                                text: 'Data berhasil diubah!',
                            }).then(() => {
                                window.location.href = '{{ url('app/barang') }}'; // Redirect setelah sukses
                            });
                        },
                        error: function(xhr) {
                            let errorMessage = 'Gagal memperbarui barang.';
                            if (xhr.status === 422) {
                                errorMessage = xhr.responseJSON.message || 'Ada kesalahan dalam input data.';
                            }
                            Swal.fire({
                                title: 'Error',
                                text: errorMessage,
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    });
    </script>
    @endsection
