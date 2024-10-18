@extends('layout.app')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="iq-card-body">
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
                    <h4 class="card-title">Daftar Stok Opnem Barang {{ $barang->nama_barang }}</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <ul>
                                <li>
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="window.location.href='/stok-opnem/barang/{{ $barang_id }}/print'">
                                        Print
                                    </button>
                                    <div></div>
                                </li>
                            </ul>
                            <form class="position-relative" action="/kategori" id="searchForm">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Search..." oninput="filterTable()">
                                    {{-- <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Search"> --}}
                                    <a class="search-link" href="#" onclick="submitForm(); return false;">
                                        <i class="ri-search-line"></i>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Stok Opnem Barang</h4>
                                </div>
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
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">No. Bukti</th>
                                                <th scope="col">Dokumen</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Penambahan</th>
                                                <th scope="col">Pengurangan</th>
                                                <th scope="col">Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($so as $row)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $row->tanggal }}
                                                    </td>
                                                    <td>
                                                        {{ $row->no_bukti }}
                                                    </td>
                                                    <td>
                                                        {{ $row->dok }}
                                                    </td>
                                                    <td>
                                                        {{ $row->ket }}
                                                    </td>
                                                    <td>
                                                        {{ $row->debet }}
                                                    </td>
                                                    <td>
                                                        {{ $row->kredit }}
                                                    </td>
                                                    <td>
                                                        {{ $row->stok }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
                tdKodeKategori = tr[i].getElementsByTagName("td")[1];
                tdKategoriBarang = tr[i].getElementsByTagName("td")[2];

                if (tdKodeKategori && tdKategoriBarang) {
                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                    txtValueKategoriBarang = tdKategoriBarang.textContent || tdKategoriBarang.innerText;

                    // Check if any of the text content in the relevant columns matches the search query
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
@endsection
