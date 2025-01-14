@extends('layout.app')
@section('content')
    <style>
        .card.mantap {
            flex: 0 0 calc(33.333% - 20px);
            background-color: #fff;
            border: 1px solid #007bff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .card.hover:hover {
            transform: translateY(-10px);
        }
    </style>
    <div id="content-page" class="content-page">
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
        <div class="container-fluid">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Surat Jalan (SJ)</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Surat Jalan</p>
                    <form class="form-horizontal" action="/SuratJalan/create" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">ID Surat Jalan
                                (SJ)</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="sj" name="sj" placeholder=""
                                    value="{{ $SuratJalanId }}" readonly="true">
                            </div>
                            <div class="col-sm-3">
                                <input type="Date" class="form-control" id="tanggal_sj" name="tanggal_sj"
                                    placeholder="Masukkan tanggal_sj" value="{{ $tanggalHariIni }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#poModal">Surat Order</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">SO (Surat Order)
                                yang
                                terpilih: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="ID_SO" name="ID_SO" placeholder=""
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
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Surat Order yang tersedia : </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach ($SuratOrders as $so)
                                                    <div class="col-lg-3 ">
                                                        <div class="card mantap iq-mb-3 card hover">
                                                            <div class="card-header">
                                                                {{ $so->id_so }}
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">Data SO</h4>
                                                                <button type="button" class="btn btn-outline-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#detailpb{{ $so->id_so }}">Detail
                                                                    SO</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    id="ambilid"
                                                                    onclick="ambilIDSO('{{ $so->id_so }}')">OK</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade bd-example-modal-lg"
                                                        id="detailpb{{ $so->id_so }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                        SO
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        aria-label="Close"
                                                                        onclick="closeModal('{{ $so->id_so }}')">
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
                                                                                @if ($details['id_so'] == $so->id_so)
                                                                                    @php
                                                                                        $total =
                                                                                            $details['total_harga'] *
                                                                                            (1 -
                                                                                                $details['potongan'] /
                                                                                                    100);
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
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($SuratOrders as $so)
                                <div class="modal fade bd-example-modal-lg" id="updateQuantity{{ $so->id_so }}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Update Quantity </h5>
                                                <button type="button" class="close" aria-label="Close"
                                                    onclick="closeModalUpdate('{{ $so->id_so }}')">
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
                                                            @if ($details['id_so'] == $so->id_so)
                                                                @php
                                                                    $total =
                                                                        $details['total_harga'] *
                                                                        (1 - $details['potongan'] / 100);
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
                                                                            value="{{ $details['harga'] ?? 'N/A' }}"
                                                                            readonly>
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text"
                                                                            class="form-control diskon-input"
                                                                            name=""
                                                                            value="{{ $details['potongan'] ?? 'N/A' }}"
                                                                            readonly>
                                                                    </td>
                                                                    <td hidden>
                                                                        <input type="text"
                                                                            class="form-control diskon-persen"
                                                                            name=""
                                                                            value="{{ $details['diskon'] ?? 'N/A' }}"
                                                                            readonly>
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
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">Nopol :
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nopol" name="nopol"
                                    placeholder="Silahkan masukkan nopol" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_pb">Nama Supir :
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nama_supir" name="nama_supir"
                                    placeholder="Silahkan masukkan nama supir" value="">
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
                            <button type="submit" onclick="submitcuy()" class="btn btn-primary"
                                id ="sjFormSubmit">Tambah</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            function ambilIDSO(id_so) {
                var ada = sessionStorage.getItem('ID_SO');
                if (ada == !null) {
                    sessionStorage.removeItem('ID_SO');
                }
                sessionStorage.setItem('ID_SO', id_so);
                document.getElementById('ID_SO').value = id_so;
                $('#poModal').modal('hide');
            }
            document.addEventListener("DOMContentLoaded", function() {

                const modalTableBody = document.getElementById('modalTableBody');
                const submitModalBtn = document.getElementById('submitModal');
                const id_so = sessionStorage.getItem('ID_SO');

                function setSessionData(data) {
                    sessionStorage.setItem('selectedItems', JSON.stringify(data));
                }
                $(document).on('click', '#submitModal', function(event) {
                    event.preventDefault();
                    console.log("Button Clicked");

                    const id_so = sessionStorage.getItem('ID_SO');
                    setTimeout(function() {
                        $('#updateQuantity' + id_so).modal('hide');
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
                        const diskonInput = row.querySelector('.diskon-persen');
                        const potonganInput = row.querySelector('.diskon-input');

                        console.log("ID:", id ? id.value : "N/A");
                        console.log("Quantity:", quantityInput ? quantityInput.value : "N/A");
                        console.log("Harga:", hargaInput ? hargaInput.value : "N/A");
                        console.log("Diskon:", diskonInput ? diskonInput.value : "N/A");
                        console.log("Potongan:", potonganInput ? potonganInput.value : "N/A");

                        const quantity = quantityInput ? quantityInput.value : 0;
                        const harga = hargaInput ? hargaInput.value : 0;
                        const diskon = diskonInput ? diskonInput.value : 0;
                        const potongan = potonganInput ? potonganInput.value : 0;


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
                    var harga = parseInt($(`input[name="harga[]"]`).eq(index).val()) || 0;
                    var diskon = parseInt($(`input[name="diskon[]"]`).eq(index).val()) || 0;
                    var potongan = parseInt($(`input[name="potongan[]"]`).eq(index).val()) || 0;
                    // Update the total price input field
                    $(`input[name="total_harga[]"]`).eq(index).val(total);
                }
                // Attach event listeners to input fields
                $(document).on('input', 'input[name^="stok[]"], input[name^="harga[]"], input[name^="diskon[]"]',
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
                var id_so = sessionStorage.getItem('ID_SO');
                $('#updateQuantity' + id_so).modal('show');
            }

            function closeModalUpdate(id_so) {
                $('#updateQuantity' + id_so).modal('hide');
            }

            function closeModal(id_so) {
                $('#detailpb' + id_so).modal('hide');
            }

            function closeModalPO(id_so) {
                $('#dataPO' + id_so).modal('hide');
            }

            function submitcuy() {
                sessionStorage.removeItem('ID_SO');
            }
        </script>
        <script>
            $(document).ready(function() {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $('#sjFormSubmit').click(function(event) {
                    event.preventDefault();
                    var tanggal_so = $('#tanggal_so').val();
                    var id_so = $('#ID_SO').val();
                    var sj = $('#sj').val();
                    var tanggal_sj = $('#tanggal_sj').val();
                    var nopol = $('#nopol').val();
                    var nama_supir = $('#nama_supir').val();
                    var ket = $('#ket').val();
                    var result = $('#result').val();

                    var formData = {
                        _token: csrfToken,
                        ID_SO: id_so,
                        tanggal_sj: tanggal_sj,
                        nopol: nopol,
                        nama_supir: nama_supir,
                        ket: ket,
                        result: result
                    };

                    var method = 'GET'; // Changed method to POST
                    var action = 'Surat Jalan';
                    var url = '/SuratJalan/create';

                    Swal.fire({
                        title: 'warning',
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
                                            sj // Added space before action
                                    }).then(() => { // Corrected syntax for then function
                                        window.location.href =
                                            '/dataSJ' // Update URL without reloading
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
    @endsection
