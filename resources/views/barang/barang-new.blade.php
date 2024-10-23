@extends('layout.app')
@section('content')
    <div id="content-page" class="content-page" style="margin-top: 75px">
        <div class="container-fluid">
            <div class="iq-card-body">
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
                @if (session('delete'))
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: "{!! session('delete') !!}",
                            icon: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    </script>
                @endif
                @if (session('update'))
                    <script>
                        Swal.fire({
                            title: 'Info!',
                            text: "{!! session('update') !!}",
                            icon: 'info',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    </script>
                @endif

                <div class="iq-header-title d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Daftar Barang</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <form class="position-relative" action="/kategori" id="searchForm">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="search" name="search"
                                           placeholder="Search" oninput="filterTable()">
                                    <a class="search-link" href="#" onclick="submitForm(); return false;">
                                        <i class="ri-search-line"></i>
                                    </a>
                                </div>
                            </form>
                            <ul class="ml-3 d-flex">
                                <li class="mr-2"><button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                                         data-target="#tipeModal">Tambah</button>
                                </li>
                                <li><button type="button" class="btn btn-outline-primary btn-print-stok-opnem"
                                            href="app/barang/print">Print</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

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
                                            <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                            <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                            <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body" style="margin-top: 10px">
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#</span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Nomor Barang</span></div>
                                                        <div class="nk-tb-col"><span>Nama Barang</span></div>
                                                        <div class="nk-tb-col"><span>Satuan</span></div>
                                                        <div class="nk-tb-col"><span>Kategori</span></div>
                                                        <div class="nk-tb-col"><span>Kelompok Barang</span></div>
                                                        <div class="nk-tb-col"><span>Sistem</span></div>
                                                        <div class="nk-tb-col"><span>Phisik</span></div>
                                                        <div class="nk-tb-col"><span>Selisih</span></div>
                                                        <div class="nk-tb-col"><span>Aksi</span></div>
                                                    </div>
                                                    @foreach ($data as $row)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                <span>{{ $loop->iteration }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-product">
                                                                    <span class="title">{{ $row->barang_id }}</span>
                                                                </span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $row->nama_barang }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $row->satuan }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $row->kategori }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $row->kelompok }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $row->stok }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $row->phisik }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $row->selisih }}</span>
                                                            </div>
                                                            <div class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                                    <li class="mr-n1">
                                                                        <a href="app/barang/edit/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-edit"></em></a>
                                                                    </li>
                                                                    <li class="mr-n1">
                                                                        <a href="app/barang/delete/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-trash"></em></a>
                                                                    </li>
                                                                    <li class="mr-n1">
                                                                        <a href="app/stok-opnem/barang/{{ $row->barang_id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-book"></em></a>
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
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="tipeModal">
                            <div class="modal-dialog modal-xl" role="document">
                                <form id="formTambahBarang" action="/app/barang/insert" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_barang">Nama Barang</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="satuan">Satuan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kategori">Kategori</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" id="kategori" name="kategori" required>
                                                                <option value="" selected disabled>Silahkan Pilih kategori</option>
                                                                @foreach ($kategori as $item)
                                                                    <option value="{{ $item->kode_kategori }}">{{ $item->kode_kategori }} - {{ $item->kategori_barang }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kelompok">Kelompok Barang</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" id="kelompok" name="kelompok" required>
                                                                <option value="" selected disabled>Pilih Kategori terlebih dahulu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="harga_beli">Harga Beli</label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="perusahaan">Perusahaan</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" id="perusahaan" name="perusahaan" required>
                                                                @foreach ($perusahaan as $item)
                                                                    <option value="{{ $item->kode_perusahaan }}">{{ $item->kode_perusahaan }} - {{ $item->nama_perusahaan }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btn-print-stok-opnem').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                Swal.fire({
                    title: "Edit",
                    text: "Anda anda ingin membuat laporan stok opnem?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
            $('.print-link').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                Swal.fire({
                    title: "Edit",
                    text: "Anda akan melakukan proses print",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
            $('.edit-link').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                Swal.fire({
                    title: "Edit",
                    text: "Anda akan melakukan proses edit",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Edit",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            // Untuk tautan hapus
            $('.delete-link').click(function(e) {
                e.preventDefault();

                var url = $(this).attr('href');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan menghapus data ini.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal",
                    dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    text: 'Data berhasil dihapus.',
                                    icon: 'success'
                                }).then((value) => {
                                    location
                                        .reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal menghapus data: ' + error,
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
        $(document).ready(function() {
            $('#btnTambahBarang').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda akan menambah barang!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/app/barang/insert",
                            type: "POST",
                            data: $("#formTambahBarang").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: 'Barang berhasil ditambahkan!',
                                }).then((value) => {
                                    window.location
                                        .reload(); // Refresh halaman setelah berhasil menambahkan barang
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Gagal menambah barang: ' + error,
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
        document.addEventListener("DOMContentLoaded", function() {
            const namaKategori = document.getElementById('kategori');
            const namaKelompok = document.getElementById('kelompok');
            const kelompokOptions = {!! json_encode($kelompokOptions) !!};
            // console.log(kelompokOptions);
            // console.log(namaKategori);
            // console.log(namaKelompok);

            namaKategori.addEventListener('change', function() {
                const selectedBarangId = this.value;
                namaKelompok.innerHTML = '';

                if (selectedBarangId === '') {
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Pilih Kelompok Barang';
                    defaultOption.disabled = true;
                    namaKelompok.appendChild(defaultOption);
                } else {
                    kelompokOptions.forEach(kelompok => {
                        if (kelompok.kode_kategori == selectedBarangId) {
                            const option = document.createElement('option');
                            option.value = kelompok.kode_kelompok;
                            option.textContent = kelompok.kode_kelompok + " - " + kelompok
                                .kelompok_barang;
                            namaKelompok.appendChild(option);
                        }
                    });
                }
            });
        });
    </script>
    {{-- Function Search --}}
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
                tdNomorBarang = tr[i].getElementsByTagName("td")[1];
                tdNamaBarang = tr[i].getElementsByTagName("td")[2];
                tdKategori = tr[i].getElementsByTagName("td")[4];
                tdKelompokBarang = tr[i].getElementsByTagName("td")[5];

                if (tdNomorBarang && tdNamaBarang && tdKategori && tdKelompokBarang) {
                    txtValueNomorBarang = tdNomorBarang.textContent || tdNomorBarang.innerText;
                    txtValueNamaBarang = tdNamaBarang.textContent || tdNNamaBarang.innerText;
                    txtValueKategori = tdKategori.textContent || tdKategori.innerText;
                    txtValueKelompokBarang = tdKelompokBarang.textContent || tdKelompokBarang.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
                    if (
                        txtValueNomorBarang.toUpperCase().indexOf(filter) > -1 ||
                        txtValueNamaBarang.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKategori.toUpperCase().indexOf(filter) > -1 ||
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
@endsection
