@extends('layout.app')
@section('content')
    <style>
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border: 1px solid #007bff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
            margin-bottom: 20px;
            display: flex;
            flex-grow: 1;
            flex-direction: column;
            max-width: 350px;
            max-height: 500px;
            padding: 20px;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-body {
            padding: 0;
        }

        .card-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #007bff;
        }

        .card-text {
            color: #000000;
        }

        .form-group.mantap label {
            margin-bottom: 0.5rem;
            color: #007bff;
        }

        .form-control.mantap {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 0.5rem;
            transition: border-color 0.3s ease;
        }

        .form-control.mantap:focus {
            border-color: #007bff;
            outline: none;
        }
    </style>
    <div id="content-page" class="content-page" style="margin-top: 75px">
        @if (session('error'))
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-error');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-success');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        @if (session('status'))
            <div class="alert alert-primary">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert-status');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 3000); // 3000 milidetik = 5 detik
            </script>
        @endif
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Penerimaan Barang (PB)</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Pembelian</p>
                    <form class="form-horizontal" action="/PenerimaanBarang/create" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">ID Penerimaan
                                Barang
                                (PB)</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="pb" name="pb" placeholder=""
                                    value="{{ $PenerimaanBarangId }}" readonly="true">
                            </div>
                            <div class="col-sm-3">
                                <input type="Date" class="form-control" id="tanggal_pb" name="tanggal_pb"
                                    placeholder="Masukkan tanggal_pb" value="{{ $tanggalHariIni }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#poModal">Purchase Order</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">PO (Purchase
                                Order) yang
                                terpilih: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="ID_PO" name="ID_PO" placeholder=""
                                    readonly="true">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#updateQuantity" onclick="tampilModal()">Update Quantity</button>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="result" name="result" placeholder=""
                                    readonly="true" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="poModal">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Purchase order yang tersedia : </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach ($purchaseOrders as $purchaseOrder)
                                                    <div class="col-lg-3 ">
                                                        <div class="card mantap iq-mb-3 card hover">
                                                            <div class="card-header">
                                                                {{ $purchaseOrder->id_po }}
                                                            </div>
                                                            <div class="card-body">
                                                                <button type="button" class="btn btn-outline-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#detailpb{{ $purchaseOrder->id_po }}">Detail
                                                                    PO</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    id="ambilid"
                                                                    onclick="ambilIDPO('{{ $purchaseOrder->id_po }}')">OK</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade bd-example-modal-lg"
                                                        id="detailpb{{ $purchaseOrder->id_po }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                        PO
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        aria-label="Close"
                                                                        onclick="closeModal('{{ $purchaseOrder->id_po }}')">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <table class="table">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col">No</th>
                                                                            <th scope="col">Kode Barang</th>
                                                                            <th scope="col">Nama Barang</th>
                                                                            <th scope="col">Kuantitas</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                            $no = 1;
                                                                        @endphp
                                                                        @foreach ($detail as $detaillagi)
                                                                            @foreach ($detaillagi as $details)
                                                                                @if ($details['id_po'] == $purchaseOrder->id_po)
                                                                                    @php
                                                                                        $total = $details['total_harga'] * (1 - $details['potongan'] / 100);
                                                                                    @endphp
                                                                                    <tr>
                                                                                        <td>{{ $no++ }}</td>
                                                                                        <td>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name=""
                                                                                                value="{{ $details['barang_id'] ?? 'N/A' }}"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name=""
                                                                                                value="{{ $details['nama_barang'] ?? 'N/A' }}"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name=""
                                                                                                value="{{ $details['stok'] ?? 'N/A' }}"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td hidden>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name=""
                                                                                                value="{{ $details['harga'] ?? 'N/A' }}"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td hidden>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name=""
                                                                                                value="{{ $details['potongan'] ?? 'N/A' }}"
                                                                                                readonly>
                                                                                        </td>
                                                                                        <td hidden>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name=""
                                                                                                value="{{ $total ?? 'N/A' }}"
                                                                                                readonly>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <div class="modal-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade bd-example-modal-lg-xl"
                                                        id="dataPO{{ $purchaseOrder->id_po }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Purchase Order
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        aria-label="close"
                                                                        onclick="closeModalPO('{{ $purchaseOrder->id_po }}')">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <table class="table">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col">No</th>
                                                                            <th scope="col">ID PO</th>
                                                                            <th scope="col">Nama_User</th>
                                                                            <th scope="col">Tanggal PO</th>
                                                                            <th scope="col">Nama Supplier</th>
                                                                            <th scope="col">Jumlah barang</th>
                                                                            <th scope="col">Diskon</th>
                                                                            <th scope="col">Total Harga</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                            $no = 1;
                                                                        @endphp
                                                                        @foreach ($purchaseOrders as $po)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $no++ }}
                                                                                </td>
                                                                                <td>
                                                                                    <strong>{{ $po->id_po }}</strong>
                                                                                </td>
                                                                                <td>
                                                                                    {{ $po->user }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $po->tanggal_po }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $po->nama_perusahaan }}
                                                                                </td>
                                                                                <td>
                                                                                    @php
                                                                                        $detailBarang = 0;
                                                                                        $detailTotal = 0;
                                                                                    @endphp
                                                                                    @foreach ($detail as $details)
                                                                                        @foreach ($details as $detaillagi)
                                                                                            @if ($detaillagi['id_po'] == $po->id_po)
                                                                                                @php
                                                                                                    $detailBarang += $detaillagi['stok'];
                                                                                                    $detailTotal += $detaillagi['total_harga'];
                                                                                                    if ($detaillagi['potongan'] == 0) {
                                                                                                        $detailDiskon = '-';
                                                                                                    } else {
                                                                                                        $detailDiskon = 1 - $detaillagi['potongan'] / 100;
                                                                                                    }
                                                                                                @endphp
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endforeach
                                                                                    {{ $detailBarang }}
                                                                                </td>
                                                                                <td>
                                                                                    @if ($detailDiskon == '-')
                                                                                        -
                                                                                    @else
                                                                                        {{ $detailTotal - $detailTotal * $detailDiskon }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    @if ($detailDiskon === '-')
                                                                                        {{ $detailTotal }}
                                                                                    @else
                                                                                        {{ $detailTotal * $detailDiskon }}
                                                                                    @endif
                                                                                </td>
                                                                                {{--  --}}
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($purchaseOrders as $purchaseOrder)
                                <div class="modal fade bd-example-modal-lg"
                                    id="updateQuantity{{ $purchaseOrder->id_po }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Update Quantity </h5>
                                                <button type="button" class="close" aria-label="Close"
                                                    onclick="closeModalUpdate('{{ $purchaseOrder->id_po }}')">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <table class="table" id="modalTableBody">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Kode Barang</th>
                                                        <th scope="col">Nama Barang</th>
                                                        <th scope="col">Kuantitas</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($detail as $detaillagi)
                                                        @foreach ($detaillagi as $details)
                                                            @if ($details['id_po'] == $purchaseOrder->id_po)
                                                                @php
                                                                    $total = $details['total_harga'] * (1 - $details['potongan'] / 100);
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        <input type="text"
                                                                            class="form-control id-input" name=""
                                                                            value="{{ $details['id'] ?? 'N/A' }}"
                                                                            readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control "
                                                                            name=""
                                                                            value="{{ $details['barang_id'] ?? 'N/A' }}"
                                                                            readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control"
                                                                            name=""
                                                                            value="{{ $details['nama_barang'] ?? 'N/A' }}"
                                                                            readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text"
                                                                            class="form-control quantity-input"
                                                                            name=""
                                                                            value="{{ $details['stok'] ?? 'N/A' }}">
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text"
                                                                            class="form-control harga-input"
                                                                            name=""
                                                                            value="{{ $details['harga'] ?? 'N/A' }}">
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text"
                                                                            class="form-control diskon-input"
                                                                            name=""
                                                                            value="{{ $details['diskon'] ?? 'N/A' }}">
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text"
                                                                            class="form-control potongan-input"
                                                                            name=""
                                                                            value="{{ $details['potongan'] ?? 'N/A' }}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    id="submitModal">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">Surat Jalan :
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="surat_jalan" name="surat_jalan"
                                    placeholder="Silahkan masukkan surat jalan" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">Keterangan :
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="ket" name="ket"
                                    placeholder="Silahkan masukkan ket, kenapa quantity diubah." value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="pbFormSubmit">Tambah</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $('#pbFormSubmit').click(function(event) {
                    event.preventDefault();
                    var tanggal_po = $('#tanggal_po').val();
                    var id_po = $('#ID_PO').val();
                    var pb = $('#pb').val();
                    var tanggal_pb = $('#tanggal_pb').val();
                    var surat_jalan = $('#surat_jalan').val();
                    var jatuh_tempo = $('#jatuh_tempo').val();
                    var ket = $('#ket').val();
                    var result = $('#result').val();

                    var formData = {
                        _token: csrfToken,
                        ID_PO: id_po,
                        tanggal_pb: tanggal_pb,
                        surat_jalan: surat_jalan,
                        jatuh_tempo: jatuh_tempo,
                        ket: ket,
                        result: result
                    };

                    var method = 'GET'; // Changed method to POST
                    var action = 'Penerimaan Barang';
                    var url = '/PenerimaanBarang/create';

                    Swal.fire({
                        title : 'warning',
                        title: "Apakah anda yakin?",
                        showCancelButton: true,
                        confirmButtonText: "Yakin",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: method,
                                url: url,
                                data: formData,
                                success: function(response) {
                                    Swal.fire({
                                        title: 'Success',
                                        icon: 'success',
                                        text: 'Berhasil membuat ' +
                                            action + ' dengan id : ' +
                                            pb // Added space before action
                                    }).then(() => { // Corrected syntax for then function
                                        window.location.href = '/dataPB' // Update URL without reloading
                                    });
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
            });
        </script>
        <script>
            function ambilIDPO(id_po) {
                var ada = sessionStorage.getItem('ID_PO');
                if (ada == !null) {
                    sessionStorage.removeItem('ID_PO');
                }
                sessionStorage.setItem('ID_PO', id_po);
                document.getElementById('ID_PO').value = id_po;
                $('#poModal').modal('hide');
            }
            document.addEventListener("DOMContentLoaded", function() {
                const modalTableBody = document.getElementById('modalTableBody');
                const submitModalBtn = document.getElementById('submitModal');

                function setSessionData(data) {
                    sessionStorage.setItem('selectedItems', JSON.stringify(data));
                }

                $(document).on('click', '#submitModal', function(event) {
                    event.preventDefault();
                    console.log("Button Clicked");
                    const id_po = sessionStorage.getItem('ID_PO');
                    setTimeout(function() {
                        $('#updateQuantity' + id_po).modal('hide');
                    }, 300);
                    plisberhasil();
                });

                function plisberhasil() {
                    const selectedItems = [];
                    const rows = modalTableBody.querySelectorAll('tr');
                    rows.forEach(row => {
                        const id = row.querySelector('.id-input');
                        const quantityInput = row.querySelector('.quantity-input');
                        const hargaInput = row.querySelector('.harga-input');
                        const diskonInput = row.querySelector('.diskon-input');
                        const potonganInput = row.querySelector('.potongan-input');
                        console.log("ID:", id ? id.value : "N/A");
                        console.log("Quantity:", quantityInput ? quantityInput.value : "N/A");
                        console.log("Harga:", hargaInput ? hargaInput.value : "N/A");
                        console.log("Diskon Persen:", diskonInput ? diskonInput.value : "N/A");
                        console.log("Diskon:", potonganInput ? potonganInput.value : "N/A");
                        const quantity = quantityInput ? quantityInput.value : 0;
                        const harga = hargaInput ? hargaInput.value : 0;
                        const potongan = potonganInput ? potonganInput.value : 0;
                        const diskon = diskonInput ? diskonInput.value : 0;
                        if (id !== null) {
                            selectedItems.push({
                                id: id ? id.value : null,
                                quantity,
                                harga,
                                diskon,
                                potongan
                            });
                        }
                    });
                    const existingData = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
                    const existingDataMap = new Map(existingData.map(item => [item.id, item]));
                    selectedItems.forEach(newItem => {
                        const existingItem = existingDataMap.get(newItem.id);
                        if (existingItem) {
                            existingItem.quantity = newItem.quantity;
                        } else {
                            existingDataMap.set(newItem.id, newItem);
                        }
                    });
                    const updatedData = Array.from(existingDataMap.values());
                    sessionStorage.setItem('selectedItems', JSON.stringify(updatedData));
                    if (selectedItems.length > 0) {
                        const resultInput = document.getElementById('result');
                        resultInput.value = JSON.stringify(selectedItems);
                    }
                }
            });

            $(document).ready(function() {
                function updateTotalPrice(index) {
                    var quantity = parseInt($(`input[name="stok[]"]`).eq(index).val()) || 0;
                    var harga = parseFloat($(`input[name="harga[]"]`).eq(index).val()) || 0;
                    var diskon = parseFloat($(`input[name="diskon[]"]`).eq(index).val()) || 0;
                    // Update the total price input field
                    $(`input[name="total_harga[]"]`).eq(index).val(total);
                }
                // Attach event listeners to input fields
                $(document).on('input', 'input[name^="stok[]"]', `input[name="harga[]"]`, `input[name="diskon[]"]`,
                    function() {
                        var index = $(this).closest('tr').index();
                        updateTotalPrice(index);
                    });
                // Trigger initial calculation for existing rows
                $('input[name^="stok[]"]').each(function(index) {
                    updateTotalPrice(index);
                });
            });

            function tampilModal() {
                var id_po = sessionStorage.getItem('ID_PO');
                $('#updateQuantity' + id_po).modal('show');
            }

            function closeModalUpdate(id_po) {
                $('#updateQuantity' + id_po).modal('hide');
            }

            function closeModal(id_po) {
                $('#detailpb' + id_po).modal('hide');
            }

            function closeModalPO(id_po) {
                $('#dataPO' + id_po).modal('hide');
            }

            function submitcuy() {
                sessionStorage.removeItem('ID_PO');
            }
        </script>
    @endsection
