@extends('layout.app')
@section('content')
    <style>
        table {
            width: 100%;
        }

        th:nth-child(1) {
            width: 10%;
        }

        th:nth-child(2) {
            width: 30%;
        }

        th:nth-child(3) {
            width: 30%;
        }

        th:nth-child(4) {
            width: 30%;
        }
    </style>

    <div id="content-page" class="content-page" style="margin-top: 75px">
        <div class="container-fluid">
            <div class="iq-card-body">
                <div class="iq-header-title">
                    @if (session('success'))
                        <div class="alert text-white bg-primary" role="alert">
                            <div class="iq-alert-text">{!! session('success') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.querySelector('.alert'); // Change to .alert
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000); // 3000 milliseconds = 3 seconds
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
                                var alert = document.querySelector('.alert'); // Change to .alert
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000); // 3000 milliseconds = 3 seconds
                        </script>
                    @endif
                    @if (session('error'))
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="iq-alert-text">{!! session('error') !!}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.querySelector('.alert'); // Change to .alert
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000); // 3000 milliseconds = 3 seconds
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
                                var alert = document.querySelector('.alert'); // Change to .alert
                                if (alert) {
                                    alert.style.display = 'none';
                                }
                            }, 5000); // 3000 milliseconds = 3 seconds
                        </script>
                    @endif
                        <div class="iq-header-title">
                            <h4 class="card-title">Daftar Buku Besar</h4>
                            <div class="iq-email-to-list">
                                <div class="iq-email-search d-flex justify-content-between align-items-center">
                                    <form class="position-relative mr-3" action="/kategori" id="searchForm">
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" id="search" name="search" placeholder="Search..." oninput="filterTable()">
                                            <a class="search-link" href="#" onclick="submitForm(); return false;">
                                                <i class="ri-search-line"></i>
                                            </a>
                                        </div>
                                    </form>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeModal">Buku Besar</button>
                                        </li>
                                        <li class="list-inline-item">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeSub">Sub Buku Besar</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                              data-toggle="dropdown">
                                            <i class="ri-more-2-fill"></i>
                                        </span>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-pencil-fill mr-2"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-printer-fill mr-2"></i>Print</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="ri-file-download-fill mr-2"></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No. Buku Besar</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($BukuBesar as $row)
                                            <tr>
                                                <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                    {{ $row->no_bukubesar }}
                                                </td>
                                                <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                    {{ $row->ket }}
                                                </td>
                                                <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                                                    <div class="flex align-items-center list-user-action">
                                                        {{-- <a data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Print"
                                                            href="/laporan/bukubesar/{{ $row->no_bukubesar }}"><i
                                                                class="fa fa-file"></i></a> --}}
                                                        <a data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="Edit" class="edit-link"
                                                           data-id="{{ $row->id }}" href="#"><i
                                                                class="ri-pencil-line"></i></a>
                                                        <a class="sub-buku-besar-button" data-toggle="tooltip"
                                                           data-placement="top" title="Sub Buku Besar"
                                                           data-target-row="{{ $row->no_bukubesar }}">
                                                            <i class="fa fa-book" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <thead class="thead-light">
                                            <tr class="sub-buku-besar-row" data-row-id="{{ $row->no_bukubesar }}"
                                                style="display: none;">
                                                <th scope="col">#</th>
                                                <th scope="col">No. Sub Buku Besar</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                            </thead>
                                            @foreach ($row->subBukuBesar as $item)
                                                <tr class="sub-buku-besar-row" data-row-id="{{ $row->no_bukubesar }}"
                                                    style="display: none;">
                                                    <td></td>
                                                    <td>{{ $item->no_subbukubesar }}</td>
                                                    <td>{{ $item->ket }}</td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a data-toggle="tooltip" data-placement="top"
                                                               title="Edit" class="edit-item"
                                                               href="/subbukuBesar/edit/{{ $item->id }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                            <a data-toggle="tooltip" data-placement="top"
                                                               title="Print" class="print-item"
                                                               href="/laporan/bukubesar/{{ $item->no_subbukubesar }}">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Tambah Kelompok --}}
                <div class="form-group row">
                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-xl" role="document">
                            <form id="formTambahBukuBesar">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Buku Besar : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="akunBaruContainer">
                                        <!-- Bidang formulir Akun awal -->
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                   for="tipe">Tipe :</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="tipe" name="tipe" required>
                                                    @foreach ($tipe as $item)
                                                        <option value="{{ $item->tipe }}">
                                                            {{ $item->tipe }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                   for="no_bukubesar">No. Buku Besar :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="no_bukubesar"
                                                       name="no_bukubesar" placeholder="Masukkan Nomor Buku Besar"
                                                       value="{{ $previousNoBukuBesar + 1 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                   for="keterangan">Keterangan :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="keterangan"
                                                       name="keterangan" placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <!-- Bidang formulir Akun yang dapat diulang akan ditambahkan di sini secara dinamis -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                                id="btnTambahBukuBesar">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="tipeSub">
                        <div class="modal-dialog modal-lg" role="document">
                            <form action="/subbukuBesar/insert" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Sub Buku Besar : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="akunBaruContainer">
                                        <!-- Bidang formulir Akun awal -->
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                   for="email">Akun
                                                Buku Besar:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="no_bukubesar" name="no_bukubesar"
                                                        required>
                                                    @foreach ($bukubesar as $item)
                                                        <option value="{{ $item->no_bukubesar }}">
                                                            {{ $item->no_bukubesar }} - {{ $item->ket }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                   for="email">No. SubBuku Besar:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="no_subbukubesar"
                                                       name="no_subbukubesar" placeholder="Masukkan Nomor Buku Besar">
                                                {{-- value="{{ $previousNoSubBukuBesar + 1 }}"> --}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0"
                                                   for="email">Keterangan :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="ket" name="ket"
                                                       placeholder="Masukkan Keterangan">
                                            </div>
                                        </div>
                                        <!-- Bidang formulir Akun yang dapat diulang akan ditambahkan di sini secara dinamis -->
                                    </div>
                                    <!-- disini -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="btnTambahAkun">Tambah
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                        window.location.href = "/bukuBesar/edit/" + id;
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
