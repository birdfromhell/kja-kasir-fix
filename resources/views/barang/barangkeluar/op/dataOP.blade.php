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
                                    <button type="button" class="btn btn-outline-primary"
                                            onclick="window.location.href='/app/orderpenjualan/tambah'">Tambah
                                    </button>
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

                                        @foreach ($OrderPenjualan as $op)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">{{ $loop->iteration }}</div>
                                                <div class="nk-tb-col"><strong>{{ $op->id_po }}</strong></div>
                                                <div class="nk-tb-col">{{ $op->user }}</div>
                                                <div class="nk-tb-col">{{ $op->tanggal_po }}</div>
                                                <div class="nk-tb-col">{{ $op->nama_perusahaan }}</div>
                                                <div class="nk-tb-col">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#detailModal{{ $op->id_so }}">
                                                        Detail
                                                    </button>
                                                </div>
                                                <div class="nk-tb-col">
                                                    @php
                                                        $totalBarang = 0;
                                                        foreach ($detail as $details) {
                                                            foreach ($details as $detaillagi) {
                                                                if ($detaillagi['id_so'] == $op->id_so) {
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
                                                                if ($detaillagi['id_so'] == $op->id_so) {
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
                                                <div class="nk-tb-col">{{ $op->status }}</div>
                                                <div class="nk-tb-col">{{ $op->jatuh_tempo }}</div>
                                                <div class="nk-tb-col">
                                                    @if ($op->status == 'Permohonan')
                                                        <button class="btn btn-outline-primary btn-sm btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Approve"
                                                                data-url="{{ route('orderpenjualan.data') }}/update-status/{{ $op->id_so }}"
                                                        >Approve</button>

                                                        <button class="btn btn-outline-warning btn-sm btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Decline"
                                                                data-url="{{ route('orderpenjualan.data') }}/update-status/{{ $op->id_so }}"
                                                        >Decline</button>
                                                    @endif
                                                    @if ($op->status == 'Approve')
                                                        <button class="btn btn-outline-warning btn-sm btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Decline"
                                                                data-url="{{ route('orderpenjualan.data') }}/update-status/{{ $op->id_so }}"
                                                        >Decline</button>
                                                    @endif
                                                    @if ($op->status == 'Decline')
                                                        <button class="btn btn-outline-primary btn-sm btn-status"
                                                                data-id="{{ $op->id_so }}"
                                                                data-action="Approve"
                                                                data-url="{{ route('orderpenjualan.data') }}/update-status/{{ $op->id_so }}"
                                                        >Approve</button>
                                                    @endif
                                                    <button class="btn btn-outline-info btn-sm btn-print"
                                                            data-id="{{ $op->id_so }}" data-action="Print">Print</button>
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

    @foreach ($OrderPenjualan as $op)
        <!-- Detail Modal for each PO -->
        <div class="modal fade" id="detailModal{{ $op->id_so }}" tabindex="-1"
             aria-labelledby="detailModalLabel{{ $op->id_so }}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $op->id_so }}">Detail PO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Barang ID</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Diskon (%)</th>
                                <th scope="col">Potongan</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($detail as $detaillagi)
                                @foreach ($detaillagi as $details)
                                    @if ($details['id_so'] == $op->id_so)
                                        <tr>
                                            <td>
                                                <input type="text"
                                                       class="form-control"
                                                       name="id[]"
                                                       value="{{ $loop->iteration }}"
                                                       readonly>
                                            </td>
                                            {{-- <td>{{ $no++ }}</td> --}}
                                            {{-- <td>
                                                <input type="text" class="form-control"
                                                    name="id[]"
                                                    value="{{ $details['id'] ?? 'N/A' }}"
                                                    readonly>
                                            </td> --}}
                                            <td>
                                                <input type="text"
                                                       class="form-control"
                                                       name="barang_id[]"
                                                       value="{{ $details['barang_id'] ?? 'N/A' }}"
                                                       readonly>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       class="form-control"
                                                       readonly
                                                       name="nama_barang[]"
                                                       value="{{ $details['nama_barang'] ?? 'N/A' }}">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control"
                                                       name="stok[]"
                                                       value="{{ $details['stok'] ?? 'N/A' }}">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control"
                                                       name="harga[]"
                                                       value="{{ $details['harga'] ?? 'N/A' }}">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control"
                                                       name="diskon[]"
                                                       value="{{ $details['diskon'] ?? 'N/A' }}">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control"
                                                       name="potongan[]"
                                                       value="{{ $details['potongan'] ?? 'N/A' }}">
                                            </td>
                                            <td>
                                                <input type="number"
                                                       class="form-control"
                                                       name="total_harga[]"
                                                       value="{{ $details['total_harga'] ?? 'N/A' }}"
                                                       readonly>
                                            </td>
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
        $(document).ready(function () {
            $('.btn-status').click(function () {
                var id = $(this).data('id');
                var action = $(this).data('action');
                var url = $(this).data('url');

                Swal.fire({
                    title: "Do you want to save the changes?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {
                                status: action
                            },
                            success: function (response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Berhasil mengubah status menjadi ' + action
                                });
                                setTimeout(function () {
                                    location.reload();
                                }, 2000);
                            },
                            error: function (xhr, status, error) {
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

            $('.btn-print').click(function () {
                var id = $(this).data('id');

                Swal.fire({
                    title: "Do you want to print the purchase order?",
                    showCancelButton: true,
                    confirmButtonText: "Print",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/app/orderpenjualan/data/print/laporan/' + id;
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
