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
                    <h4 class="card-title">Cash Opname</h4>
                    <div class="iq-email-to-list">
                        <div class="iq-email-search d-flex">
                            <form class="position-relative" action="/cash-opnem/print" id="searchForm">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Search..." oninput="filterTable()">
                                    <a class="search-link" href="#" onclick="submitForm(); return false;">
                                        <i class="ri-search-line"></i>
                                    </a>
                                </div>
                            </form>
                            <ul class="ml-3 d-flex">
                                <li class="mr-2"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeModal">Update</button></li>
                                <li><button type="button" class="btn btn-outline-primary" onclick="window.location.href='/cash-opnem/print'">Print</button></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Cash Opname</h4>
                                </div>
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
                            <div class="iq-card-body" style="margin-top: 10px">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Pecahan</th>
                                            <th>Kertas</th>
                                            <th>Logam</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $index => $row)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $row->pecahan }}</td>
                                                <td>{{ $row->kertas }}</td>
                                                <td>{{ $row->logam }}</td>
                                                <td>{{ $row->jumlah }}</td>
                                                <td>{{ $row->total }}</td>
                                                <td>
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <a href="/cash-opnem/edit/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-edit"></em></a>
                                                        </li>
                                                        <li class="mr-n1">
                                                            <a href="/cash-opnem/delete/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-trash"></em></a>
                                                        </li>
                                                    </ul>
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

                <div class="form-group row">
                    <div class="modal fade bd-example-modal-xxl" tabindex="-1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-xxl" role="document">
                            <form id="formTambahBarang" action="/cash-opnem/update" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cash Opname : </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="akunBaruContainer">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0" for="pecahan">Pecahan:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="pecahan" name="pecahan" placeholder="Masukkan Pecahan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0" for="kertas">Kertas:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="kertas" name="kertas" placeholder="Masukkan Kertas">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0" for="logam">Logam:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="logam" name="logam" placeholder="Masukkan Logam">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0" for="jumlah">Jumlah:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-2 align-self-center mb-0" for="total">Total:</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan Total" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="btnTambahBarang">Update</button>
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
        var kertasInput = document.getElementById('kertas');
        var logamInput = document.getElementById('logam');
        var jumlahInput = document.getElementById('jumlah');
        var pecahanSelect = document.getElementById('pecahan');
        var totalInput = document.getElementById('total');

        kertasInput.addEventListener('input', updateJumlah);
        logamInput.addEventListener('input', updateJumlah);

        function updateJumlah() {
            var kertasValue = parseInt(kertasInput.value) || 0;
            var logamValue = parseInt(logamInput.value) || 0;
            var jumlah = kertasValue + logamValue;
            jumlahInput.value = jumlah;

            var pecahanValue = parseInt(pecahanSelect.value) || 0;
            var total = pecahanValue * jumlah;
            totalInput.value = total;
        }

        pecahanSelect.addEventListener('change', updateJumlah);
        updateJumlah();
    </script>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tdPecahan = tr[i].getElementsByTagName("td")[1];
                tdKertas = tr[i].getElementsByTagName("td")[2];
                tdLogam = tr[i].getElementsByTagName("td")[3];
                if (tdPecahan && tdKertas && tdLogam) {
                    txtValuePecahan = tdPecahan.textContent || tdPecahan.innerText;
                    txtValueKertas = tdKertas.textContent || tdKertas.innerText;
                    txtValueLogam = tdLogam.textContent || tdLogam.innerText;
                    if (
                        txtValuePecahan.toUpperCase().indexOf(filter) > -1 ||
                        txtValueKertas.toUpperCase().indexOf(filter) > -1 ||
                        txtValueLogam.toUpperCase().indexOf(filter) > -1
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
