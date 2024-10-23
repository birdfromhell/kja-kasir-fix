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

                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Cash Opname</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeModal">Update</button>
                                                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/app/cash-opnem/print'">Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>#</span></div>
                                                        <div class="nk-tb-col"><span>Pecahan</span></div>
                                                        <div class="nk-tb-col"><span>Kertas</span></div>
                                                        <div class="nk-tb-col"><span>Logam</span></div>
                                                        <div class="nk-tb-col"><span>Jumlah</span></div>
                                                        <div class="nk-tb-col"><span>Total</span></div>
                                                        <div class="nk-tb-col"><span>Aksi</span></div>
                                                    </div>

                                                    @foreach ($data as $index => $row)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">{{ $index + 1 }}</div>
                                                            <div class="nk-tb-col">{{ $row->pecahan }}</div>
                                                            <div class="nk-tb-col">{{ $row->kertas }}</div>
                                                            <div class="nk-tb-col">{{ $row->logam }}</div>
                                                            <div class="nk-tb-col">{{ $row->jumlah }}</div>
                                                            <div class="nk-tb-col">{{ $row->total }}</div>
                                                            <div class="nk-tb-col">
                                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                                    <li class="mr-n1">
                                                                        <a href="/app/cash-opnem/edit/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-edit"></em></a>
                                                                    </li>
                                                                    <li class="mr-n1">
                                                                        <a href="/app/cash-opnem/delete/{{ $row->id }}" class="btn btn-icon btn-trigger"><em class="icon ni ni-trash"></em></a>
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

{{--                                <div class="d-flex justify-content-end mt-3">--}}
{{--                                    {{ $data->links() }}--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="modal fade bd-example-modal-xxl" tabindex="-1" role="dialog" id="tipeModal">
                        <div class="modal-dialog modal-xxl" role="document">
                            <form id="formTambahBarang" action="/app/cash-opnem/update" method="post">
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
            table = document.querySelector(".nk-tb-list");
            tr = table.getElementsByClassName("nk-tb-item");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByClassName("nk-tb-col")[1]; // Assuming Pecahan is in the second column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
