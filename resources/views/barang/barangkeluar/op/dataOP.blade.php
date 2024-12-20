@extends('layout.app')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Surat Order (SO)</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/app/orderpenjualan/tambah'">Tambah</button>
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
                                            <div class="nk-tb-col"><span>ID SO</span></div>
                                            <div class="nk-tb-col"><span>Nama User</span></div>
                                            <div class="nk-tb-col"><span>Tanggal SO</span></div>
                                            <div class="nk-tb-col"><span>Nama Konsumen</span></div>
                                            <div class="nk-tb-col"><span>Detail SO</span></div>
                                            <div class="nk-tb-col"><span>Jumlah Barang</span></div>
                                            <div class="nk-tb-col"><span>Total Harga</span></div>
                                            <div class="nk-tb-col"><span>Status</span></div>
                                            <div class="nk-tb-col"><span>Jatuh Tempo</span></div>
                                            <div class="nk-tb-col"><span>Aksi</span></div>
                                        </div>

                                        @foreach ($OrderPenjualan as $po)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">{{ $loop->iteration }}</div>
                                                <div class="nk-tb-col"><strong>{{ $po->id_po }}</strong></div>
                                                <div class="nk-tb-col">{{ $po->user }}</div>
                                                <div class="nk-tb-col">{{ $po->tanggal_po }}</div>
                                                <div class="nk-tb-col">{{ $po->nama_perusahaan }}</div>
                                                <div class="nk-tb-col">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailpo{{ $po->id_po }}">
                                                        Detail
                                                    </button>
                                                </div>
                                                <div class="nk-tb-col">
                                                    @php
                                                        $totalBarang = 0;
                                                        foreach ($detail as $details) {
                                                            foreach ($details as $detaillagi) {
                                                                if ($detaillagi['id_po'] == $po->id_po) {
                                                                    $totalBarang += $detaillagi['stok'];
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                    {{ number_format($totalBarang, 0, ',', '.') }}
                                                </div>
                                                <div class="nk-tb-col">
                                                    @php
                                                        $semua = 0;
                                                        foreach ($detail as $details) {
                                                            foreach ($details as $detaillagi) {
                                                                if ($detaillagi['id_po'] == $po->id_po) {
                                                                    $stok = $detaillagi['stok'] ?? 0;
                                                                    $harga = $detaillagi['harga'] ?? 0;
                                                                    $diskon = $detaillagi['diskon'] ?? 0;
                                                                    $potongan = $detaillagi['potongan'] ?? 0;
                                                                    $a = $stok * $harga;
                                                                    $b = $a * ($diskon / 100);
                                                                    $c = $stok * $potongan;
                                                                    $totalharga = $a - $b - $c;
                                                                    $semua += $totalharga;
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                    {{ number_format($semua, 0, ',', '.') }}
                                                </div>
                                                <div class="nk-tb-col">{{ $po->status }}</div>
                                                <div class="nk-tb-col">{{ $po->jatuh_tempo }}</div>
                                                <div class="nk-tb-col">
                                                    @if ($po->status == 'Permohonan')
                                                        <button class="btn btn-outline-primary btn-sm btn-status" data-id="{{ $po->id_po }}" data-action="Approve">Approve</button>
                                                        <button class="btn btn-outline-warning btn-sm btn-status" data-id="{{ $po->id_po }}" data-action="Decline">Decline</button>
                                                    @endif
                                                    @if ($po->status == 'Approve')
                                                        <button class="btn btn-outline-warning btn-sm btn-status" data-id="{{ $po->id_po }}" data-action="Decline">Decline</button>
                                                    @endif
                                                    @if ($po->status == 'Decline')
                                                        <button class="btn btn-outline-primary btn-sm btn-status" data-id="{{ $po->id_po }}" data-action="Approve">Approve</button>
                                                    @endif
                                                    <button class="btn btn-outline-info btn-sm btn-print" data-id="{{ $po->id_po }}" data-action="Print">Print</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $OrderPenjualan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($OrderPenjualan as $po)
        <!-- Detail Modal for each PO -->
        <div class="modal fade" id="detailModal{{ $po->id_po }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $po->id_po }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $po->id_po }}">Detail PO</h5>
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
                                <th>Harga</th>
                                <th>Diskon (%)</th>
                                <th>Potongan</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($detail as $detaillagi)
                                @foreach ($detaillagi as $details)
                                    @if ($details['id_po'] == $po->id_po)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $details['barang_id'] ?? 'N/A' }}</td>
                                            <td>{{ $details['nama_barang'] ?? 'N/A' }}</td>
                                            <td>{{ $details['stok'] ?? 'N/A' }}</td>
                                            <td>{{ $details['harga'] ?? 'N/A' }}</td>
                                            <td>{{ $details['diskon'] ?? 'N/A' }}</td>
                                            <td>{{ $details['potongan'] ?? 'N/A' }}</td>
                                            <td>{{ $details['total_harga'] ?? 'N/A' }}</td>
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
                            url: '/dataPO/update-status/' + id,
                            data: {
                                status: action
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

                Swal.fire({
                    title: "Do you want to print the purchase order?",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/dataPO/print/laporan/' + id;
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
