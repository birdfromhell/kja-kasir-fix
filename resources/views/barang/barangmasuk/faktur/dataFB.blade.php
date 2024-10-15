@extends('layout.app')
@section('content')
    <div id="content-page" class="content-page" style="margin-top: 75px">
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
                            var alert = document.querySelector('.alert');
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 5000);
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
                <div class="iq-header-title">
                    <h4 class="card-title">Daftar Faktur Pembelian (FB)</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <form class="position-relative" action="/kategori" id="searchForm">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search..." oninput="filterTable()">
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
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
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
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ID FBeli</th>
                                            <th scope="col">ID PBarang</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Detail FB</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($fb as $fbs)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $fbs->id_fb }}</strong></td>
                                                <td><strong>{{ $fbs->id_pb }}</strong></td>
                                                <td>{{ $fbs->tanggal_fb }}</td>
                                                <td>
                                                    <button class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#detailfb{{ $fbs->id_fb }}">
                                                        Detail
                                                    </button>
                                                </td>
                                                <td>{{ $fbs->ket }}</td>
                                                <td>
                                                    <a class="btn btn-outline-primary mb-3" href="/print/faktur/{{ $fbs->id_fb }}/{{ $fbs->id_pb }}">Print</a>
                                                    <div class="modal fade bd-example-modal-xl" id="detailfb{{ $fbs->id_fb }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail FB</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <table class="table">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col" width="10%">No</th>
                                                                        <th scope="col" width="30%">Akun</th>
                                                                        <th scope="col" width="20%">Debit</th>
                                                                        <th scope="col" width="20%">Kredit</th>
                                                                        <th scope="col" width="20%">Ket</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @php
                                                                        $no = 1;
                                                                    @endphp
                                                                    @foreach ($detail as $details)
                                                                        @if ($details['id_fb'] == $fbs->id_fb)
                                                                            <tr>
                                                                                <td><input type="text" class="form-control" value="{{ $no++ }}" readonly></td>
                                                                                <td><input type="text" class="form-control" name="no_bukubesar" value="{{ $details['ket_subbukubesar'] ?? 'N/A' }}" readonly></td>
                                                                                <td><input type="text" class="form-control" name="debit" value="{{ $details['debit'] ?? 'N/A' }}" readonly></td>
                                                                                <td><input type="text" class="form-control" name="kredit" value="{{ $details['kredit'] ?? 'N/A' }}" readonly></td>
                                                                                <td><input type="text" class="form-control" name="ket" value="{{ $details['ket'] ?? 'N/A' }}" readonly></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
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
                <div class="d-flex justify-content-end">
                    {{ $fb->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmAction(action, id) {
            var confirmation = confirm("Apakah anda yakin ingin " + action + " barang ini?");
            if (confirmation) {
                if (action === "menyetujui") {
                    window.location.href = "/dataPB/Approve/" + id;
                } else if (action === "menolak") {
                    window.location.href = "/dataPB/Decline/" + id;
                }
            } else {
                event.preventDefault();
            }
        }

        function schadabush() {
            var confirmation = confirm("Apakah anda yakin ingin mengedit?");
            if (!confirmation) {
                event.preventDefault();
            }
        }

        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tdKodeKategori = tr[i].getElementsByTagName("td")[1];
                tdKategoriBarang = tr[i].getElementsByTagName("td")[2];
                tdKelompokBarang = tr[i].getElementsByTagName("td")[3];

                if (tdKodeKategori && tdKategoriBarang && tdKelompokBarang) {
                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                    txtValueKategoriBarang = tdKategoriBarang.textContent || tdKategoriBarang.innerText;
                    txtValueKelompokBarang = tdKelompokBarang.textContent || tdKelompokBarang.innerText;

                    if (
                        txtValueKodeKategori.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKategoriBarang.toUpperCase().indexOf(filter) > -1 ||
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
