<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Print Faktur Penjualan</title>
</head>
<style>
    /* Main Border */
    #absensi-table {
        border-collapse: collapse;
        width: 100%;
    }

    #absensi-table th,
    #absensi-table td {
        border-top: none;
        border-bottom: none;
        border-right: none;
        border-left: none;
        text-align: left;
        padding: 8px;
    }

    #absensi-table th {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        border-right: none;
        border-left: none;
    }

    #absensi-table td {
        border-top: none;
        border-bottom: none;
    }

    /* Total Border */
    #total-table {
        border-collapse: collapse;
        width: 100%;
    }

    #total-table th,
    #total-table td {
        border-top: none;
        border-bottom: none;
        border-right: none;
        border-left: none;
        text-align: left;
        padding: 8px;

    }

    #total-table th {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        border-right: none;
        border-left: none;
    }

    #total-table td {
        border-top: none;
        border-bottom: none;
    }

    /* Footer Border */
    #footer-table {
        border-collapse: collapse;
        width: 100%;
    }

    #footer-table th,
    #footer-table td {
        border-top: none;
        border-bottom: none;
        border-right: none;
        border-left: none;
        text-align: left;
        padding: 8px;

        padding-bottom: 100px;
    }

    #footer-table th {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        border-right: none;
        border-left: none;
    }

    #footer-table td {
        border-top: none;
        border-bottom: none;
    }
</style>

<body style="background: white">
    <button href="#" onclick="printAbsensi('printableArea');" class="btn btn-success btn-sm"><span
            class="glyphicon glyphicon-print" bgcolor="blue">Print</span></button>

    <div id="printableArea">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 80%;">
                <span>
                    {{-- <div class="text-muted">{{ Auth::user()->username }}</div> --}}
                    <div class="text-muted"><strong>PT {{ Auth::user()->perusahaan->nama_perusahaan }}</strong></div>
                    <div class="text-muted"> {{ Auth::user()->perusahaan->alamat_gudang }}</div>
                </span>
            </div>
            <div style="flex: 10%; text-align: left;">
                <span>
                    <div class="text-muted">No. Faktur</div>
                    <div class="text-muted">Tanggal</div>
                    <div class="text-muted">Jatuh Tempo</div>
                </span>
            </div>
            <div style="flex: 10%; text-align: left;">
                <span>
                    <div class="text-muted">: {{ $fj->id_fj }}</div>
                    <div class="text-muted">: {{ $fj->tanggal_fj }} </div>
                    <div class="text-muted">: {{ $sj->jatuh_tempo }}</div>
                </span>
            </div>
        </div>
        {{-- <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted">BCF</div>
                <div class="text-muted">PT. BASKARA CAKRA FAJARINDO</div>
            </div>
            <div>
                <div class="text-muted">No. Faktur: {{ $fj->id_fj }}</div>
                <div class="text-muted">Tanggal: {{ $fj->tanggal_fj }} </div>
                <div class="text-muted">Jatuh Tempo: {{ $sj->jatuh_tempo }}</div>
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div> --}}
        <div align="center">
            <h1 class="card-title" align="center" style="font-weight: bold; font-size: 35px;">FAKTUR PENJUALAN
            </h1>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" style="font-weight: bold;">Konsumen : {{ $sj->nama_perusahaan }}</div>
                <div class="text-muted">{{ $alamatGudang }}</div>
            </div>
            <p></p>
            <div>
                ‎
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div>
        <p></p>
        <table id="absensi-table" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Disk (%)</th>
                    <th scope="col">Potongan</th>
                    <th scope="col" style="text-align: right;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $jumlah = 0;
                    $no = 1;
                @endphp
                @foreach ($detail as $detaillagi)
                    @foreach ($detaillagi as $details)
                        @php
                            $stok = $details['stok'] ?? 0;
                            $harga = $details['harga'] ?? 0;
                            $diskon = $details['diskon'] ?? 0;
                            $potongan = $details['potongan'] ?? 0;

                            // Hitung total diskon
                            $a = $stok * $harga;
                            $b = $a * ($diskon / 100);
                            $c = $stok * $potongan;
                            // Hitung total potongan

                            $hargaAkhir = $a - $b - $c;

                            // Tambahkan harga akhir ke jumlah total
                            $jumlah += $hargaAkhir;
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $details['nama_barang'] ?? 'N/A' }}
                            </td>
                            <td>
                                {{ number_format($details['stok'] ?? 0, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ $details['satuan'] }}
                            </td>
                            <td>
                                {{ number_format($details['harga'] ?? 0, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ $details['diskon'] ?? 'N/A' }}%
                            </td>
                            <td>
                                {{ number_format($details['potongan'] ?? 0, 0, ',', '.') }}
                            </td>
                            <td style="text-align: right;">
                                {{ number_format($hargaAkhir ?? 0, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                {{-- @php
                    $detailBarang = 0;
                    $detailTotal = 0;
                    $jumlah = 0;
                @endphp
                @php
                    $no = 1;
                @endphp
                @foreach ($detail as $detaillagi)
                    @foreach ($detaillagi as $details)
                        @php
                            $stok = $details['stok'] ?? 0;
                            $harga = $details['harga'] ?? 0;
                            $diskon = $details['potongan'] ?? 0;

                            $potongan = ($stok * $harga * $diskon) / 100;
                            //$potonganTotal += $potongan;

                            $jumlah += $stok * $harga - $potongan;
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $details['nama_barang'] ?? 'N/A' }}
                            </td>
                            <td>
                                {{ $details['stok'] ?? 'N/A' }}
                            </td>
                            <td>
                                {{ $details['satuan'] }}
                            </td>
                            <td>
                                {{ $details['harga'] ?? 'N/A' }}
                            </td>
                            <td>
                                {{ $details['potongan'] ?? 'N/A' }}%
                            </td>
                            <td>
                                {{ $potongan }}
                            </td>
                            <td style="text-align: right;">
                                {{ $stok * $harga - $potongan ?? 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach --}}
            </tbody>
        </table>
        <hr style="border-top: 2px solid black; width: 10%; margin-top: 0px; margin-bottom: 15px; margin-left: 90%;">

        <div>
            <div class="text-muted" align="right">Total: {{ number_format($hargaAkhir ?? 0, 0, ',', '.') }}</div>
        </div>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: 0px; margin-bottom: 15px;">
        <footer>
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="flex: 30%; text-align: center;">
                    <span><strong>Kepala Gudang </strong></span>
                </div>
                <div style="flex: 30%; text-align: center; position: relative;">
                    <span><strong>Checker 1</strong></span>
                </div>
                <div style="flex: 30%; text-align: center; position: relative;">
                    {{-- <span><strong>{{ $aktivaData->sum(function ($tipeAkun) {return $tipeAkun->bukuBesar->sum('debit') + $tipeAkun->bukuBesar->sum('kredit');}) }}</strong></span> --}}
                    <span><strong>Checker 2</strong></span>
                </div>
            </div>
            {{-- <table id="footer-table" class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th scope="col" style="text-align: center;">Kepala Gudang</th>
                        <th scope="col" style="text-align: center;">Checker 1</th>
                        <th scope="col" style="text-align: center;">Checker 2</th>
                    </tr>
                </thead>
            </table> --}}
        </footer>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: 100px; margin-bottom: 15px;">
        <div>
            ‎
        </div>
        <div>
            <div>
                <div class="text-muted" style="font-weight: bold;">Catatan:</div>
                <div class="text-muted">{{ $fj->ket }}</div>
            </div>

            <div style="position: absolute; bottom: 10px; left: 10px;" id="currentTime">
                <span class="text-muted">Tanggal: {{ now()->addHours(7)->format('Y-m-d H:i:s') }}</span>
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div>
    </div>

    <script>
        function updateCurrentTime() {
            var currentTimeElement = document.getElementById('currentTime');
            if (currentTimeElement) {
                var now = new Date();
                now.setHours(now.getHours() + 7); // Add 7 hours
                var formattedTime = now.toISOString().slice(0, 19).replace('T', ' ');
                currentTimeElement.innerHTML = '<span class="text-muted">Tanggal: ' + formattedTime + '</span>';
            }
        }

        // Update time every second
        setInterval(updateCurrentTime, 1000);
    </script>

    <script type="text/javascript">
        function printAbsensi(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        // Fungsi untuk mengisi kolom "Hari" berdasarkan tanggal
        function updateHari() {
            var tanggalElements = document.querySelectorAll('[id^="hari-"]');
            tanggalElements.forEach(function(element) {
                var tanggalString = element.nextElementSibling
                    .textContent; // Ambil tanggal dari kolom sebelumnya
                var tanggal = new Date(tanggalString);
                var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"][tanggal.getDay()];
                element.textContent = hari;
            });
        }

        // Panggil fungsi updateHari saat dokumen dimuat
        window.onload = function() {
            updateHari();
            sortDataByDate(); // Panggil fungsi pengurutan
        };

        // Fungsi untuk mengurutkan data berdasarkan tanggal
        function sortDataByDate() {
            var table = document.getElementById('absensi-table');
            var tbody = table.querySelector('tbody');
            var rows = Array.from(tbody.querySelectorAll('tr'));

            rows.sort(function(a, b) {
                var dateA = new Date(a.cells[3].textContent); // Kolom Tanggal
                var dateB = new Date(b.cells[3].textContent);
                return dateA - dateB;
            });

            // Hapus isi tbody sebelum mengurutkan ulang
            tbody.innerHTML = '';

            // Tambahkan baris yang berhasil diurutkan
            rows.forEach(function(row) {
                tbody.appendChild(row);
            });
        }
    </script>
</body>

</html>
