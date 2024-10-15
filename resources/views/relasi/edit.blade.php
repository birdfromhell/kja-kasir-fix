@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div>
                            <div class="nk-block-des"></div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <div class="nk-block-des"></div>
                            </div>
                        </div>
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
                                <form class="form-validate" id="formUpdatePerusahaan" action="/relasi-update/{{ $data->id }}" method="post">
                                    @csrf
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="nama_perusahaan">Nama Perusahaan</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" value="{{ $data->nama_perusahaan }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="alamat_kantor">Alamat Kantor</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" id="alamat_kantor" name="alamat_kantor" rows="2" placeholder="Masukkan Alamat Kantor" required>{{ $data->alamat_kantor }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="alamat_gudang">Alamat Gudang</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="2" placeholder="Masukkan Alamat Gudang" required>{{ $data->alamat_gudang }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="nama_pimpinan">Nama Pimpinan</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="Masukkan Nama Pimpinan" value="{{ $data->nama_pimpinan }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="no_telepon">No. Telepon</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $data->no_telepon }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($data->jenis == 'Supplier')
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="plafon_debit">Plafon Debit</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="plafon_debit" name="plafon_debit" placeholder="Masukkan Plafon Debit" value="{{ $data->plafon_debit ?? 0 }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($data->jenis == 'Konsumen')
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="plafon_kredit">Plafon Kredit</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="plafon_kredit" name="plafon_kredit" placeholder="Masukkan Plafon Kredit" value="{{ $data->plafon_kredit ?? 0 }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="btnUpdatePerusahaan">Update</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <a href="{{ url('/app/relasi') }}" class="btn btn-secondary">Kembali</a>

                                            </div>
                                        </div>
                                        </div>
                                        
                                        </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <script>
      <script>
$(document).ready(function() {
    $('#btnUpdatePerusahaan').click(function() {
        Swal.fire({
            title: "Do you want to save the changes?",
            showCancelButton: true,
            confirmButtonText: "Confirm",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $("#formUpdatePerusahaan").attr('action'),
                    type: "POST",
                    data: $("#formUpdatePerusahaan").serialize(),
                    success: function(response) {
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: 'Perusahaan berhasil diperbarui!',
                        }).then(() => {
                            window.location.href = '/app/relasi'; // Redirect setelah sukses
                        });
                    },
                    error: function(xhr) {
                        let errorMessage = 'Gagal memperbarui perusahaan.';
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
