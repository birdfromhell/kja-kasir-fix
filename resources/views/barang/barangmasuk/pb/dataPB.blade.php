@extends('layout.app')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Penerimaan Barang (PB)</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/PenerimaanBarang'">Tambah</button>
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
                                            <div class="nk-tb-col"><span>No</span></div>
                                            <div class="nk-tb-col"><span>ID PBarang</span></div>
                                            <div class="nk-tb-col"><span>ID POrder</span></div>
                                            <div class="nk-tb-col"><span>Tanggal</span></div>
                                            <div class="nk-tb-col"><span>Detail PO</span></div>
                                            <div class="nk-tb-col"><span>Detail PB</span></div>
                                            <div class="nk-tb-col"><span>Status</span></div>
                                            <div class="nk-tb-col"><span>Aksi</span></div>
                                        </div>

                                        @foreach ($PenerimaanBarang as $pb)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">{{ $loop->iteration }}</div>
                                                <div class="nk-tb-col"><strong>{{ $pb->id_pb }}</strong></div>
                                                <div class="nk-tb-col"><strong>{{ $pb->id_po }}</strong></div>
                                                <div class="nk-tb-col">{{ $pb->tanggal_pb }}</div>
                                                <div class="nk-tb-col">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailpo{{ $pb->id_po }}">
                                                        Detail
                                                    </button>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahPB{{ $pb->id_pb }}">
                                                        Detail
                                                    </button>
                                                </div>
                                                <div class="nk-tb-col">{{ $pb->status }}</div>
                                                <div class="nk-tb-col">
                                                    @if ($pb->status == 'Permohonan')
                                                        <button class="btn btn-outline-primary btn-sm btn-status" data-id="{{ $pb->id_pb }}" data-action="Approve">Approve</button>
                                                    @endif
                                                    @if ($pb->status == 'Approve')
                                                        <button class="btn btn-outline-warning btn-sm btn-faktur" data-id="{{ $pb->id_pb }}" data-id2="{{ $pb->id_po }}">Faktur</button>
                                                        <button class="btn btn-outline-warning btn-sm btn-status" data-id="{{ $pb->id_pb }}" data-action="Decline">Batal</button>
                                                        <a class="btn btn-outline-primary btn-sm btn-print" data-id="{{ $pb->id_pb }}" data-id2="{{ $pb->id_po }}">Print</a>
                                                    @endif
                                                    @if ($pb->status == 'Faktur')
                                                        <a class="btn btn-outline-primary btn-sm btn-print" data-id="{{ $pb->id_pb }}" data-id2="{{ $pb->id_po }}">Print</a>
                                                    @endif
                                                    @if ($pb->status == 'Decline')
                                                        <button class="btn btn-outline-primary btn-sm btn-status" data-id="{{ $pb->id_pb }}" data-action="Approve">Approve</button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $PenerimaanBarang->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($PenerimaanBarang as $pb)
        <!-- Detail Modal for each PO -->
        <div class="modal fade" id="detailpo{{ $pb->id_po }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $pb->id_po }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $pb->id_po }}">Detail PO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang ID</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($detailpo as $detaillagi)
                                @foreach ($detaillagi as $details)
                                    @if ($details['id_po'] == $pb->id_po)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $details['barang_id'] ?? 'N/A' }}</td>
                                            <td>{{ $details['nama_barang'] ?? 'N/A' }}</td>
                                            <td>{{ $details['stok'] ?? 'N/A' }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Modal for each PB -->
        <div class="modal fade" id="ubahPB{{ $pb->id_pb }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $pb->id_pb }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $pb->id_pb }}">Detail PB</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang ID</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($detailpb as $detaillagi)
                                @foreach ($detaillagi as $details)
                                    @if ($details['id_pb'] == $pb->id_pb)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $details['barang_id'] ?? 'N/A' }}</td>
                                            <td>{{ $details['nama_barang'] ?? 'N/A' }}</td>
                                            <td>{{ $details['stok'] ?? 'N/A' }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-status').click(function() {
                var id = $(this).data('id');
                var action = $(this).data('action');

                Swal.fire({
                    title: "Do you want to save the changes?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: '/dataPB/' + action + '/' + id,
                            data: {
                                status: action,
                                id: id
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Berhasil mengubah status menjadi ' + action
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Failed to update status: ' + error,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });

            $('.btn-print').click(function() {
                var id = $(this).data('id');
                var id2 = $(this).data('id2');

                Swal.fire({
                    title: "Do you want to print the purchase order?",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/laporan/print/' + id2 + '/' + id;
                    }
                });
            });

            $('.btn-faktur').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: "Do you want to create an invoice?",
                    showCancelButton: true,
                    confirmButtonText: "Invoice",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/faktur/' + id;
                    }
                });
            });
        });

        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector(".nk-tb-list");
            tr = table.getElementsByClassName("nk-tb-item");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByClassName("nk-tb-col")[1]; // Assuming ID PO is in the second column
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
