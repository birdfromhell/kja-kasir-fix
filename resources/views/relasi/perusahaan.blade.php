@extends('layout.app')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Perusahaan</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#relasiModal">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <script>
                            Swal.fire({
                                title: 'Sukses!',
                                text: "{!! session('success') !!}",
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false
                            });
                        </script>
                    @endif

                    @if (session('error'))
                        <script>
                            Swal.fire({
                                title: 'Error!',
                                text: "{!! session('error') !!}",
                                icon: 'error',
                                timer: 3000,
                                showConfirmButton: false
                            });
                        </script>
                    @endif

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid">
                                                    <label class="custom-control-label" for="pid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm"><span>Nama Perusahaan</span></div>
                                            <div class="nk-tb-col"><span>Jenis</span></div>
                                            <div class="nk-tb-col"><span>Alamat Kantor</span></div>
                                            <div class="nk-tb-col"><span>Alamat Gudang</span></div>
                                            <div class="nk-tb-col"><span>Nama Pimpinan</span></div>
                                            <div class="nk-tb-col"><span>No. Telepon</span></div>
                                            <div class="nk-tb-col"><span>Plafon Kredit/Debit</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @foreach ($data as $row)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input" id="pid{{ $row->id }}">
                                                        <label class="custom-control-label" for="pid{{ $row->id }}"></label>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-product">
                                                        <span class="title">{{ $row->nama_perusahaan }}</span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->jenis }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->alamat_kantor }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->alamat_gudang }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->nama_pimpinan }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->no_telepon }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">
                                                        @if ($row->jenis == 'Supplier')
                                                            Rp {{ $row->plafon_debit }} (Debit)
                                                        @elseif ($row->jenis == 'Konsumen')
                                                            Rp {{ $row->plafon_kredit }} (Kredit)
                                                        @else
                                                            -
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <a href="{{ url('app/relasi/edit/' . $row->id) }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-edit"></em></a>
                                                        </li>
                                                        <li class="mr-n1">
                                                            <form action="{{ url('/app/relasi/delete/' . $row->id) }}" method="POST" style="display: inline;" class="delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-icon btn-trigger delete-button"><em class="icon ni ni-trash"></em></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                    @include('relasi.create-new')
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                var form = $(this).closest('form'); // Mendapatkan form terdekat

                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menghapus perusahaan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: form.attr('action'),
                            type: 'POST', // Menggunakan POST untuk mengirim data
                            data: form.serialize(), // Menyertakan data dari form
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Perusahaan berhasil dihapus.',
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload(); // Reload halaman setelah sukses
                                });
                            },
                            error: function(xhr) {
                                let errorMessage = 'Terjadi kesalahan.';
                                if (xhr.status === 404) {
                                    errorMessage = 'Perusahaan tidak ditemukan.';
                                }
                                Swal.fire({
                                    title: 'Error!',
                                    text: errorMessage,
                                    icon: 'error',
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
