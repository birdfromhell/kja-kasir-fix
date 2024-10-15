@extends('layout.app')
@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Kategori</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeModal">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">{!! session('success') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.querySelector('.alert');
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000);
                        </script>
                    @endif
                    @if (session('delete'))
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="iq-alert-text">{!! session('delete') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.querySelector('.alert');
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000);
                        </script>
                    @endif
                    @if (session('update'))
                        <div class="alert text-white bg-info" role="alert">
                            <div class="iq-alert-text">{!! session('update') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.querySelector('.alert');
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000);
                        </script>
                    @endif

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span>#</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span>Kode Kategori</span></div>
                                            <div class="nk-tb-col"><span>Kategori Barang</span></div>
                                            <div class="nk-tb-col"><span>Aksi</span></div>
                                        </div>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data as $row)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span>{{ $no++ }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-product">
                                                        <span class="title">{{ $row->kode_kategori }}</span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->kategori_barang }}</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <a href="/kategori-edit/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-edit"></em></a>
                                                        </li>
                                                        <li class="mr-n1">
                                                            <a href="/kategori-delete/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-trash"></em></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>

                    <div class="form-group row">
                        <div class="modal fade bd-example-modal-l" tabindex="-1" role="dialog" id="tipeModal">
                            <div class="modal-dialog modal-l" role="document">
                                <form action="/kategori-insert" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Kategori : </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="akunBaruContainer">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-2 align-self-center mb-0" for="kategori_barang">Kategori:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" placeholder="Masukkan Kategori">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="btnTambahAkun">Tambah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('.btn-edit').click(function(e) {
                                e.preventDefault();
                                var url = $(this).attr('href');

                                Swal.fire({
                                    title: 'Edit Data?',
                                    text: "Apakah Anda ingin mengedit data ini?",
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Edit'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = url;
                                    }
                                });
                            });

                            $('.btn-delete').click(function(e) {
                                e.preventDefault();
                                var url = $(this).attr('href');

                                Swal.fire({
                                    title: 'Hapus Data?',
                                    text: "Apakah Anda yakin ingin menghapus data ini?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Hapus'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: url,
                                            type: 'DELETE',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            success: function(response) {
                                                Swal.fire(
                                                    'Terhapus!',
                                                    'Data telah dihapus.',
                                                    'success'
                                                ).then((value) => {
                                                    location.reload();
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                Swal.fire(
                                                    'Error!',
                                                    'Gagal menghapus data: ' + error,
                                                    'error'
                                                );
                                            }
                                        });
                                    }
                                });
                            });

                            $("#btnTambahAkun").click(function() {
                                Swal.fire({
                                    title: "Apakah Anda yakin?",
                                    text: "Anda akan menambah kategori!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then((willAdd) => {
                                    if (willAdd) {
                                        $.ajax({
                                            url: "/kategori-insert",
                                            type: "POST",
                                            data: $("#formTambahKategori").serialize(),
                                            success: function(response) {
                                                Swal.fire({
                                                    title: 'Sukses',
                                                    icon: 'success',
                                                    text: 'Kategori berhasil ditambahkan!'
                                                }).then((value) => {
                                                    window.location.href = "/kategori";
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                Swal.fire({
                                                    title: 'Error',
                                                    text: 'Gagal menambah kategori: ' + error,
                                                    icon: 'error'
                                                });
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    }
                                });
                            });
                        });

                        function filterTable() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("search");
                            filter = input.value.toUpperCase();
                            table = document.querySelector(".table");
                            tr = table.getElementsByTagName("tr");

                            for (i = 0; i < tr.length; i++) {
                                tdKodeKategori = tr[i].getElementsByTagName("td")[1];
                                tdKategoriBarang = tr[i].getElementsByTagName("td")[2];

                                if (tdKodeKategori && tdKategoriBarang) {
                                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                                    txtValueKategoriBarang = tdKategoriBarang.textContent || tdKategoriBarang.innerText;

                                    if (
                                        txtValueKodeKategori.toUpperCase().indexOf(filter) > -1 ||
                                        txtValueKategoriBarang.toUpperCase().indexOf(filter) > -1
                                    ) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
