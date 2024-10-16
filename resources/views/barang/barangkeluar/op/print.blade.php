<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Cetak Absensi</title>
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

    footer {
        margin-top: auto;
    }
</style>

<body style="background: white">
    <button href="#" onclick="printAbsensi('printableArea');" class="btn btn-success btn-sm"><span
            class="glyphicon glyphicon-print" bgcolor="blue">Print</span></button>

    <div id="printableArea">
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted">BCF</div>
                <div class="text-muted">PT. BASKARA CAKRA FAJARINDO</div>
            </div>
            <div>
                <div class="text-muted">No. SO: {{ $OrderPenjualan->id_so ?? 'Tidak ada data' }} </div>

                <div class="text-muted">Tanggal: {{ $OrderPenjualan->tanggal_op }}</div>
                <div class="text-muted">Termin: {{ $OrderPenjualan->jatuh_tempo }}</div>
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div>
        <div align="center">
            <h1 class="card-title" align="center" style="font-weight: bold; font-size: 35px;">SURAT ORDER PENJUALAN
            </h1>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" style="font-weight: bold;">Kepada : {{ $OrderPenjualan->nama_perusahaan }}</div>
                <div class="text-muted">{{ $alamat->alamat_kantor }}</div>
            </div>
            <div>
                <div class="text-muted" style="font-weight: bold;">Dikirim ke :</div>
            </div>
            <div>
                ‎
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div>
        <table id="absensi-table" class="table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" align="left">No</th>
                    <th scope="col" align="left">Kode Barang</th>
                    <th scope="col" align="left">Nama Barang</th>
                    <th scope="col" align="left">Kuantitas</th>
                    <th scope="col" align="left">Satuan</th>
                    <th scope="col" align="left">Harga</th>
                    <th scope="col" align="left">Diskon</th>
                    <th scope="col" align="right">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $detailBarang = 0;
                    $detailTotal = 0;
                @endphp
                @php
                    $no = 1;
                @endphp
                @foreach ($detail as $detaillagi)
                    @foreach ($detaillagi as $details)
                        @if (isset($detaillagi['id_po']) && $detaillagi['id_po'] == $po->id_po)
                            @php
                                $detailTotal += $detaillagi['total_harga'];
                            @endphp
                        @endif
                        @php
                            $hargaAfterDiskon = $details['total_harga'] - $details['total_harga'] * ($details['potongan'] / 100);
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $details['barang_id'] }}
                            </td>
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
                            <td align="right">
                                {{ $hargaAfterDiskon ?? 'N/A' }}
                            </td>
                        </tr>
                        @php
                            // Menambahkan nilai total_harga ke variabel $totalHargaSemua
                            $totalHargaSemua += $hargaAfterDiskon ?? 0;
                        @endphp
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" style="font-weight: bold;">Keterangan :</div>
                <div class="text-muted">MCIBSDJSHDS </div>
                <div class="text-muted">‎ </div>
                <div class="text-muted">‎ </div>
                <div class="text-muted" style="font-weight: bold;">Catatan:</div>
                <div class="text-muted">Mohon PO ini setelah diterima, ditandatangani dan dicap.</div>
            </div>
            <div>
                <div class="text-muted" align="right">Total: {{ $totalHargaSemua }}</div>
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div>
        <p></p>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" align="center">Pembuat</div>
            </div>
            <div>
                <div class="text-muted">Menyetujui</div>
            </div>
            <div>
                <div class="text-muted">Perusahaan</div>
            </div>
        </div>

    </div>

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
