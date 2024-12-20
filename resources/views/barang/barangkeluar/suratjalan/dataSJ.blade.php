@extends('layout.app')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Surat Jalan (SJ)</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/app/suratjalan/tambah'">Tambah</button>
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
                                            <div class="nk-tb-col"><span>ID SJ</span></div>
                                            <div class="nk-tb-col"><span>Tanggal</span></div>
                                            <div class="nk-tb-col"><span>Detail SO</span></div>
                                            <div class="nk-tb-col"><span>Detail SJ</span></div>
                                            <div class="nk-tb-col"><span>Status</span></div>
                                            <div class="nk-tb-col"><span>Aksi</span></div>
                                        </div>

                                        @foreach ($SuratJalan as $sj)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">{{ $loop->iteration }}</div>
                                                <div class="nk-tb-col"><strong>{{ $sj->id_sj }}</strong></div>
                                                <div class="nk-tb-col">{{ $sj->user }}</div>
                                                <div class="nk-tb-col">{{ $sj->tanggal_sj }}</div>
                                                <div class="nk-tb-col">{{ $sj->nama_perusahaan }}</div>
                                                <div class="nk-tb-col">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailsj{{ $sj->id_sj }}">
                                                        Detail
                                                    </button>
                                                </div>
                                                <div class="nk-tb-col">
                                                    @php
                                                        $totalBarang = 0;
                                                        foreach ($detail as $details) {
                                                            foreach ($details as $detaillagi) {
                                                                if ($detaillagi['id_sj'] == $sj->id_sj) {
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
                                                                if ($detaillagi['id_sj'] == $sj->id_sj) {
                                                                    $stok = $detaillagi['stok'] ?? 0;
                                                                    $harga = $detaillagi['harga'] ?? 0;
                                                                    $diskon = $detaillagi['diskon'] ?? 0;
                                                                    $sjtongan = $detaillagi['sjtongan'] ?? 0;
                                                                    $a = $stok * $harga;
                                                                    $b = $a * ($diskon / 100);
                                                                    $c = $stok * $sjtongan;
                                                                    $totalharga = $a - $b - $c;
                                                                    $semua += $totalharga;
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                    {{ number_format($semua, 0, ',', '.') }}
                                                </div>
                                                <div class="nk-tb-col">{{ $sj->status }}</div>
                                                <div class="nk-tb-col">{{ $sj->jatuh_temsj }}</div>
                                                <div class="nk-tb-col">
                                                    @if ($sj->status == 'Permohonan')
                                                        <button class="btn btn-outline-primary btn-sm btn-status" data-id="{{ $sj->id_sj }}" data-action="Approve">Approve</button>
                                                        <button class="btn btn-outline-warning btn-sm btn-status" data-id="{{ $sj->id_sj }}" data-action="Decline">Decline</button>
                                                    @endif
                                                    @if ($sj->status == 'Approve')
                                                        <button class="btn btn-outline-warning btn-sm btn-status" data-id="{{ $sj->id_sj }}" data-action="Decline">Decline</button>
                                                    @endif
                                                    @if ($sj->status == 'Decline')
                                                        <button class="btn btn-outline-primary btn-sm btn-status" data-id="{{ $sj->id_sj }}" data-action="Approve">Approve</button>
                                                    @endif
                                                    <button class="btn btn-outline-info btn-sm btn-print" data-id="{{ $sj->id_sj }}" data-action="Print">Print</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        {{ $SuratJalan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($SuratJalan as $sj)
        <!-- Detail Modal for each sj -->
        <div class="modal fade" id="detailModal{{ $sj->id_sj }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $sj->id_sj }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $sj->id_sj }}">Detail sj</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>ID SO</th>
                                <th>ID SJ</th>
                                <th>Tanggal</th>
                                <th>Detail SO</th>
                                <th>Detail SJ</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($detail as $detaillagi)
                                @foreach ($detaillagi as $details)
                                    @if ($details['id_sj'] == $sj->id_sj)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $details['barang_id'] ?? 'N/A' }}</td>
                                            <td>{{ $details['nama_barang'] ?? 'N/A' }}</td>
                                            <td>{{ $details['stok'] ?? 'N/A' }}</td>
                                            <td>{{ $details['harga'] ?? 'N/A' }}</td>
                                            <td>{{ $details['diskon'] ?? 'N/A' }}</td>
                                            <td>{{ $details['sjtongan'] ?? 'N/A' }}</td>
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
                            url: '/datasj/update-status/' + id,
                            data: {
                                status: action
                            },
                            success: function(ressjnse) {
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
                        window.location.href = '/datasj/print/lasjran/' + id;
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
                td = tr[i].getElementsByClassName("nk-tb-col")[1]; // Assuming ID sj is in the second column
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
