@extends('layout.app')
@section('content')
    <style>
        @media (max-width: 767px) {
            .nk-block-between {
                flex-direction: column;
                align-items: stretch;
            }
            .nk-block-head-content {
                text-align: center;
                margin-bottom: 1rem;
            }
            .toggle-wrap {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
            .btn {
                width: 100%;
            }
            .nk-tb-list {
                overflow-x: auto;
            }
            .nk-tb-item {
                min-width: 600px;
            }
            .nk-tb-col {
                white-space: nowrap;
            }
        }
    </style>
    <div class="nk-content" style="margin-top: 75px">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Buku Besar</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeModal">Buku Besar</button>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeSub">Sub Buku Besar</button>
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
                                            <div class="nk-tb-col tb-col-sm"><span>No. Buku Besar</span></div>
                                            <div class="nk-tb-col"><span>Keterangan</span></div>
                                            <div class="nk-tb-col"><span>Aksi</span></div>
                                        </div>
                                        @foreach ($BukuBesar as $row)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span>{{ $loop->iteration }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-product">
                                                        <span class="title">{{ $row->no_bukubesar }}</span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->ket }}</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <a href="#" class="btn btn-icon btn-trigger edit-link" data-id="{{ $row->id }}"><em class="icon ni ni-edit"></em></a>
                                                        </li>
                                                        <li class="mr-n1">
                                                            <a href="#" class="btn btn-icon btn-trigger sub-buku-besar-button" data-target-row="{{ $row->no_bukubesar }}"><em class="icon ni ni-book"></em></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="nk-tb-item sub-buku-besar-row" data-row-id="{{ $row->no_bukubesar }}" style="display: none;">
                                                <div class="nk-tb-col"><span></span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>No. Sub Buku Besar</span></div>
                                                <div class="nk-tb-col"><span>Keterangan</span></div>
                                                <div class="nk-tb-col"><span>Aksi</span></div>
                                            </div>
                                            @foreach ($row->subBukuBesar as $item)
                                                <div class="nk-tb-item sub-buku-besar-row" data-row-id="{{ $row->no_bukubesar }}" style="display: none;">
                                                    <div class="nk-tb-col"><span></span></div>
                                                    <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-product">
                                                            <span class="title">{{ $item->no_subbukubesar }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span class="tb-sub">{{ $item->ket }}</span>
                                                    </div>
                                                    <div class="nk-tb-col nk-tb-col-tools">
                                                        <ul class="nk-tb-actions gx-1 my-n1">
                                                            <li class="mr-n1">
                                                                <a href="/app/subbukubesar/edit/{{ $item->id }}" class="btn btn-icon btn-trigger edit-item"><em class="icon ni ni-edit"></em></a>
                                                            </li>
                                                            <li class="mr-n1">
                                                                <a href="/app/laporan/bukubesar/{{ $item->no_subbukubesar }}" class="btn btn-icon btn-trigger print-item"><em class="icon ni ni-printer"></em></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $BukuBesar->links() }}
                    </div>

                    <!-- Modal for adding Buku Besar -->
                    <div class="modal fade" id="tipeModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Buku Besar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="formTambahBukuBesar">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="form-label" for="tipe">Tipe</label>
                                            <select class="form-control" id="tipe" name="tipe" required>
                                                @foreach ($tipe as $item)
                                                    <option value="{{ $item->tipe }}">{{ $item->tipe }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="no_bukubesar">No. Buku Besar</label>
                                            <input type="text" class="form-control" id="no_bukubesar" name="no_bukubesar" value="{{ $previousNoBukuBesar ? $previousNoBukuBesar + 1 : 1 }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="btnTambahBukuBesar">Tambah</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for adding Sub Buku Besar -->
                    <div class="modal fade" id="tipeSub" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Sub Buku Besar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/app/subbukubesar/insert" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="form-label" for="no_bukubesar">Akun Buku Besar</label>
                                            <select class="form-control" id="no_bukubesar" name="no_bukubesar" required>
                                                @foreach ($bukubesar as $item)
                                                    <option value="{{ $item->no_bukubesar }}">{{ $item->no_bukubesar }} - {{ $item->ket }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="no_subbukubesar">No. Sub Buku Besar</label>
                                            <input type="text" class="form-control" id="no_subbukubesar" name="no_subbukubesar" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ket">Keterangan</label>
                                            <input type="text" class="form-control" id="ket" name="ket" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- Function Search --}}
    <script>
        $(document).ready(function() {
            $('.edit-link').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: "Apakah anda ingin edit?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    showCancelButton: true,
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/app/bukubesar/edit/" + id;
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Edit Item
            $(".edit-item").click(function(e) {
                e.preventDefault();
                var editUrl = $(this).attr('href');
                Swal.fire({
                    title: "Edit?",
                    text: "Apakah Anda ingin mengedit?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Edit",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: editUrl,
                            type: 'GET',
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Anda akan dialihkan ke form edit',
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal mengedit item: ' + error,
                                    icon: 'error'
                                });
                                console.error('Failed to edit item:', error);
                            }
                        });
                    } else {
                        Swal.fire("Edit dibatalkan!");
                    }
                });
            });

            // Print Item
            $(".print-item").click(function(e) {
                e.preventDefault();
                var printUrl = $(this).attr('href');
                Swal.fire({
                    title: "Print?",
                    text: "Apakah Anda ingin mencetak?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = printUrl;
                    } else {
                        Swal.fire("Print dibatalkan!");
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#btnTambahBukuBesar").click(function() {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan menambah buku besar!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/bukuBesar/insert",
                            type: "POST",
                            data: $("#formTambahBukuBesar").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: 'Buku besar berhasil ditambahkan!',
                                }).then((value) => {
                                    // Di sini Anda bisa tambahkan kode lain yang perlu dijalankan setelah menambah buku besar
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal menambah buku besar: ' + error,
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
        function filterTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table"); // Assuming you have only one table on the page

            // Get all rows in the table body
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                // Use the second column (index 1) for filtering based on the company name
                tdKodeKelompok = tr[i].getElementsByTagName("td")[1];
                tdKodeKategori = tr[i].getElementsByTagName("td")[2];
                tdKelompokBarang = tr[i].getElementsByTagName("td")[3];

                if (tdKodeKelompok && tdKodeKategori && tdKelompokBarang) {
                    txtValueKodeKelompok = tdKodeKelompok.textContent || tdKodeKelompok.innerText;
                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                    txtValueKelompokBarang = tdKelompokBarang.textContent || tdKelompokBarang.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
                    if (
                        txtValueKodeKelompok.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKodeKategori.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKelompokBarang.toUpperCase().indexOf(filter) > -1
                    ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".sub-buku-besar-button").click(function() {
                // Ambil ID baris yang terkait dari atribut data
                var targetRowId = $(this).data("target-row");

                // Menampilkan/menyembunyikan baris yang sesuai dengan ID
                $(".sub-buku-besar-row[data-row-id='" + targetRowId + "']").toggle();
            });
        });
    </script>
@endsection
