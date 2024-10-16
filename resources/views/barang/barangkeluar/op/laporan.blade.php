<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Cetak Absensi</title>
</head>

<body style="background: white">
    <button href="#" onclick="printAbsensi('printableArea');" class="btn btn-success btn-sm"><span
            class="glyphicon glyphicon-print" bgcolor="blue">Print</span></button>


    <div id="printableArea">
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" style="font-weight: bold;">BCF</div>
                <div class="text-muted" style="font-weight: bold;">PT. BASKARA CAKRA FAJARINDO</div>
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
                <div class="text-muted" style="font-weight: bold;">Kepada:</div>
                <div class="text-muted">KARUNIA GROUP TB.</div>
            </div>
            <div>
                <h1 class="card-title" align="center" style="font-weight: bold; font-size: 35px;">SURAT ORDER PENJUALAN
                </h1>
            </div>
            <div>
                <div class="text-muted" style="font-weight: bold;">Nomor: A010-2309-000055</div>
                <div class="text-muted" style="font-weight: bold;">Tanggal:</div>
                <div class="text-muted" style="font-weight: bold;">No. Ref:</div>
                <div class="text-muted" style="font-weight: bold;">Tgl. Ref:</div>
            </div>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" style="font-weight: bold;">Kepada :</div>
                <div class="text-muted">MING CHIA CHERAMICS</div>
                <div class="text-muted">-</div>
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
                    <th scope="col" align="left">Kode</th>
                    <th scope="col" align="left">Nama Barang</th>
                    <th scope="col" align="right">Kuantitas</th>
                    <th scope="col" align="left">Satuan</th>
                    <th scope="col" align="left">Harga Jual</th>
                    <th scope="col" align="right">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>D00042</td>
                    <td>ADELINE ABU</td>
                    <td align="right">160</td>
                    <td>DUS</td>
                    <td>48,500</td>
                    <td align="right">7,713,440</td>
                </tr>
            </tbody>
        </table>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" style="font-weight: bold;">Terbilang :</div>
                <div class="text-muted">Dua puluih sembilan juta </div>
                <div class="text-muted">‎ </div>
                <div class="text-muted">‎ </div>
            </div>
            <div>
                <div class="text-muted" align="right">Total: 7,713,440</div>
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
                <div class="text-muted" align="center">Disetujui</div>
            </div>
            <div>
                <div class="text-muted">Penjualan</div>
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
