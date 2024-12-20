<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Cetak Absensi</title>

    <style>
        thead th {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
        }

        tfoot th {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
        }
    </style>
</head>

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
                <div class="text-muted">No. PB:</div>
                <div class="text-muted">Tanggal:</div>
                <div class="text-muted">No. SJ Supplier:</div>
                <div class="text-muted">Gudang:</div>
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div>
        <div align="center">
            <h1 class="card-title" align="center" style="font-weight: bold; font-size: 35px;">PENERIMAAN BARANG</h1>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" style="font-weight: bold;">Supplier :</div>
                <div class="text-muted">MING CHIA CHERAMICS</div>
            </div>
            <div>
                <div class="text-muted" style="font-weight: bold;">Asal :</div>
                <div class="text-muted">Pengemudi:</div>
                <div class="text-muted">No. Polisi:</div>
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div>
        <p></p>
        <table id="absensi-table" class="table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" align="left">No.</th>
                    <th scope="col" align="left">Nama Barang</th>
                    <th scope="col" align="right">Kuantitas</th>
                    <th scope="col" align="left">Satuan</th>
                    <th scope="col" align="left">No. PO</th>
                    <th scope="col" align="left">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>LYLIA CORAL ABU 40X40 KW 1</td>
                    <td align="right">252</td>
                    <td>DUS</td>
                    <td>A002.2309.00071</td>
                </tr>
            </tbody>
            
        </table>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted" align="center">Kepala Gudang</div>
            </div>
            <div>
                <div class="text-muted">Checker 1</div>
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

            // Tambahkan baris yang sudah diurutkan
            rows.forEach(function(row) {
                tbody.appendChild(row);
            });
        }
    </script>
</body>

</html>
