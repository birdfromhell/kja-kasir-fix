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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="content-page" class="content-page" style="margin-top: 75px">

        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
                <a class="btn btn-outline-success mb-3 float-right" href="/dataPB">Klik disini</a>
            </div>
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
                        <h4 class="card-title">Purchase Order (PO)</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <p>Input Pembelian</p>
                    <form class="form-horizontal" action="/purchaseOrder/create" method="POST" id="poForm">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="tanggal_po">ID Purchase Order
                                (PO)</label>
                            <div class="col-sm-3">
                                <input type="Date" class="form-control" id="tanggal_po" name="tanggal_po"
                                    placeholder="Masukkan tanggal_po" value="{{ $tanggalHariIni }}">
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="po" name="po" placeholder=""
                                    value="{{ $purchaseOrderId }}" readonly="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_perusahaan">Nama
                                Supplier:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="kode_perusahaan" name="kode_perusahaan">
                                    <option value="" selected disabled> </option>
                                    @foreach ($Perusahaan as $p)
                                        @if ($p->jenis == 'Supplier')
                                            <option value="{{ $p->kode_perusahaan }}">{{ $p->kode_perusahaan }} -
                                                {{ $p->nama_perusahaan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#barangModal">Tambah Barang</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">Barang yang
                                terpilih: </label>
                            <div class="col-sm-10">
                                <div id="result"></div>
                                <input type="hidden" name="selectedItems" id="selectedItemsInput">
                            </div>

                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="barangModal">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                onchange="">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control mb-3" id="barangSearch"
                                                placeholder="Search...">
                                            <div class="cards-container" id="modalCardsContainer"></div>
                                        </div>

                                        <div class="modal-footer">
                                            <p id="notification"></p>
                                            <button type="button" class="btn btn-primary" id="submitModal">OK</button>
                                            <button type="reset" class="btn btn-primary" id="resetModal">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">Jatuh tempo:
                            </label>
                            <div class="col-sm-5">
                                <select class="form-control" id="termin" name="termin">
                                    <option value="" selected disabled>Pilih jatuh tempo yang sudah ada sebelumnya.
                                    </option>
                                    @foreach ($termin as $t)
                                        <option value="{{ $t->kode_termin }}">{{ $t->jatuh_tempo }} Hari jatuh tempo
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                Atau Buat termin baru:
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-outline-primary" onclick="showInput()">Tambah</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="nama_barang">
                            </label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="jatuh_tempo" name="jatuh_tempo"
                                    placeholder="Masukkan hari jatuh tempo." hidden>
                            </div>
                            <div class="col-sm-4">
                                <input type="Date" class="form-control" id="tanggal_termin2" name="tanggal_termin2"
                                    placeholder="Masukkan tanggal termin" value="{{ $tanggalHariIni }}" hidden disabled>
                            </div>
                            <div class="col-sm-4">
                                <input type="Date" class="form-control" id="tanggal_termin" name="tanggal_termin"
                                    placeholder="Masukkan tanggal termin" value="{{ $tanggalHariIni }}" hidden>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="poFormSubmit">Tambah</button>
                            <button type="reset" class="btn iq-bg-danger">Reset</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#poFormSubmit').click(function(event) {
                event.preventDefault();
                var tanggal_po = $('#tanggal_po').val();
                var id_po = $('#po').val();
                var kode_perusahaan = $('#kode_perusahaan').val();
                var termin = $('#termin').val();
                var jatuh_tempo = $('#jatuh_tempo').val();
                var tanggal_termin = $('#tanggal_termin').val();
                var selectedItems = $('#selectedItemsInput').val();

                var formData = {
                    _token: csrfToken,
                    tanggal_po: tanggal_po,
                    kode_perusahaan: kode_perusahaan,
                    termin: termin,
                    jatuh_tempo: jatuh_tempo,
                    tanggal_termin: tanggal_termin,
                    selectedItems: selectedItems
                };

                var method = 'get'; // Changed method to POST
                var action = 'Purchase Order';
                var url = '/purchaseOrder/create';

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
                                        id_po // Added space before action
                                }).then(() => { // Corrected syntax for then function
                                    window.location.href =
                                        '/dataPO' // Update URL without reloading
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
        function showInput() {
            // Mengakses elemen dengan id 'jatuh_tempo'
            var inputElement1 = document.getElementById('jatuh_tempo');
            var inputElement2 = document.getElementById('tanggal_termin2');

            inputElement1.removeAttribute('hidden');
            inputElement2.removeAttribute('hidden');
        }

        // Ambil elemen input
        const tanggalPoInput = document.getElementById('tanggal_po');
        const jatuhTempoInput = document.getElementById('jatuh_tempo');
        const tanggalTerminInput = document.getElementById('tanggal_termin');
        const tanggalTerminInput2 = document.getElementById('tanggal_termin2');

        // Tambahkan event listener ke input jumlah hari
        jatuhTempoInput.addEventListener('input', function() {
            hitungTanggalTermin();
        });

        // Tambahkan event listener ke input tanggal PO
        tanggalPoInput.addEventListener('input', function() {
            hitungTanggalTermin();
        });

        // Function untuk menghitung tanggal termin
        function hitungTanggalTermin() {
            const tanggalPo = new Date(tanggalPoInput.value); // Ambil nilai tanggal PO
            const jatuhTempo = parseInt(jatuhTempoInput.value); // Ambil nilai jumlah hari jatuh tempo

            if (!isNaN(jatuhTempo) && !isNaN(tanggalPo.getTime())) { // Pastikan input berupa angka dan tanggal PO valid
                const tanggalTermin = new Date(tanggalPo); // Salin tanggal PO ke variabel tanggal termin
                tanggalTermin.setDate(tanggalTermin.getDate() +
                    jatuhTempo); // Tambahkan jumlah hari jatuh tempo ke tanggal PO

                // Format tanggal termin ke format YYYY-MM-DD
                const formattedDate = tanggalTermin.toISOString().split('T')[0];

                // Set nilai tanggal termin
                tanggalTerminInput2.value = formattedDate;
                tanggalTerminInput.value = formattedDate;
            }
        }
        // Disable input tanggal termin
        tanggalTerminInput2.disabled = true;


        document.addEventListener("DOMContentLoaded", function() {
            const modalTableBody = document.getElementById('modalTableBody');
            const submitModalBtn = document.getElementById('submitModal');
            const resetModalBtn = document.getElementById('resetModal');
            const notification = document.getElementById('notification');
            const form = document.querySelector('.form-horizontal');
            const namaPerusahaanSelect = document.getElementById('nama_perusahaan');
            const dataBarangPerusahaan = {!! json_encode(['barang' => $barang, 'perusahaan' => $PerusahaanOptions]) !!};

            $('#barangSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                const cards = document.querySelectorAll('.card');

                cards.forEach(card => {
                    const cardData = Array.from(card.querySelectorAll('.card-title, .card-text'))
                        .map(element => element.textContent.toLowerCase());
                    const cardVisible = cardData.some(data => data.includes(searchTerm));

                    card.style.display = cardVisible ? '' : 'none';
                });
            });



            function validateQuantity(inputField, maxStock) {
                let value = parseInt(inputField.value, 10);

                if (isNaN(value) || value < 0) {
                    value = 0;
                } else if (value > maxStock) {
                    value = maxStock;
                    if (value = maxStock) {
                        // alert(`Stok sudah mencapai batas.`);
                    }

                }
            }


            function populateModalCards(barang) {
                const cardsContainer = document.getElementById('modalCardsContainer');
                cardsContainer.innerHTML = '';

                barang.forEach(barang => {
                    const card = document.createElement('div');
                    card.classList.add('card');

                    card.innerHTML = `
            <div class="card-body">
                <h5 class="card-title" style="display:none;">ID : ${barang.id}</h5>
                <h5 class="card-title">${barang.barang_id}</h5>
                <p class="card-text" data-kodebarang="${barang.barang_id}"><b>Nama Barang:</b> ${barang.nama_barang}</p>
                <p class="card-text" data-satuanbarang="${barang.satuan}"><b>Satuan:</b> ${barang.satuan}</p>
                <div class="form-group row">
                    <div class="col-sm-6">
                    <label for="quantityInput${barang.id}">Kuantitas:</label>
                    <input type="number" class="form-control mantap quantity-input" id="quantityInput${barang.id}" min="0" placeholder="Masukkan Kuantitas">
                </div>
                <div class="col-sm-6">
                    <label for="priceInput${barang.id}">Harga:</label>
                    <input type="number" class="form-control mantap price-input" id="priceInput${barang.id}" placeholder="Masukkan Harga">
                </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                            <label for="discountPersenInput${barang.id}">Diskon (%):</label>
                            <input type="number" class="form-control mantap discount-persen" id="discountPersenInput${barang.id}" min="0" max="100" value="0" placeholder="Masukkan Diskon">
                    </div>
                    <div class="col-sm-4">
                            <label for="discountInput${barang.id}">Potongan:</label>
                            <input type="number" class="form-control mantap discount-input" id="discountInput${barang.id}" min="0" value="0" placeholder="Masukkan Diskon">
                    </div>
                </div>
            </div>`;

                    cardsContainer.appendChild(card);
                });

                const quantityInputs = document.querySelectorAll('.quantity-input');

                quantityInputs.forEach(input => {
                    input.addEventListener('input', function() {
                        validateQuantity(this, parseInt(this.getAttribute('max'), 10));
                    });
                });
            }



            function getSessionData() {
                return JSON.parse(sessionStorage.getItem('selectedItems')) || [];
            }

            function setSessionData(data) {
                sessionStorage.setItem('selectedItems', JSON.stringify(data));
            }


            submitModalBtn.addEventListener('click', function(event) {
                event.preventDefault();

                const selectedItems = [];
                const cards = document.querySelectorAll('.card');

                cards.forEach(card => {
                    const cardTitle = card.querySelector('.card-title');
                    const cardTextKodeBarang = card.querySelector('[data-kodebarang]');
                    const cardTextSatuan = card.querySelector('[data-satuanbarang]');
                    const quantityInput = card.querySelector('.quantity-input');
                    const priceInput = card.querySelector('.price-input');
                    const discountPersenInput = card.querySelector('.discount-persen');
                    const discountInput = card.querySelector('.discount-input');

                    if (cardTitle && cardTextKodeBarang && cardTextSatuan && quantityInput &&
                        priceInput && discountPersenInput && discountInput) {
                        const id = cardTitle.textContent.split(': ')[1];
                        const barang_id = cardTextKodeBarang.getAttribute('data-kodebarang');
                        const nama_barang = cardTextKodeBarang.textContent.split(':')[1].trim();
                        const satuan = cardTextSatuan.getAttribute('data-satuanbarang');

                        const quantity = parseInt(quantityInput.value);
                        const price = parseFloat(priceInput.value);
                        const discountpersen = parseFloat(discountPersenInput.value);
                        const discount = parseFloat(discountInput.value);
                        let total = 0;

                        if (quantity > 0) {
                            const a = quantity * price;
                            const b = a * (discountpersen / 100);
                            const c = quantity * discount;
                            total = a - b - c;

                            if (total < 0) {
                                total = 0;
                                alert('Pastikan lagi pada saat masukkan barang agar tidak minus.');
                            }
                            selectedItems.push({
                                id,
                                barang_id,
                                nama_barang,
                                satuan,
                                quantity,
                                price,
                                discountpersen,
                                discount,
                                total
                            });
                        }
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
                    const resultElement = document.getElementById('result');
                    resultElement.innerHTML = '';

                    const table = document.createElement('table');
                    table.classList.add('table');
                    const headerRow = table.insertRow();
                    headerRow.innerHTML =
                        '<th>Nama Barang</th><th>Quantity</th><th>Harga</th><th>Diskon Persen</th><th>Potongan</th><th>Total</th>';

                    selectedItems.forEach(item => {
                        const row = table.insertRow();
                        row.innerHTML =
                            `<td>${item.nama_barang}</td><td>${item.quantity}</td><td>${item.price}</td><td>${item.discountpersen}%</td><td>${item.discount}</td><td>${item.total}</td>`;
                    });

                    resultElement.appendChild(table);
                }

                setSessionData(selectedItems);
                document.getElementById('selectedItemsInput').value = sessionStorage.getItem(
                    'selectedItems');
                $('#barangModal').modal('hide');
            });


            function getSessionData() {
                return JSON.parse(sessionStorage.getItem('selectedItems')) || [];
            }

            function setSessionData(data) {
                sessionStorage.setItem('selectedItems', JSON.stringify(data));
            }



            populateModalCards(dataBarangPerusahaan.barang);
            resetModalBtn.addEventListener('click', function(event) {
                // Clear the session storage
                sessionStorage.removeItem('selectedItems');

                // Optionally, you can clear any input values or other data on the page if needed
                const quantityInputs = document.querySelectorAll('.quantity-input');
                quantityInputs.forEach(input => {
                    input.value = ''; // Clear the input value
                });

                // You can add similar code to clear other inputs if needed
            });

        });
    </script>
@endsection
