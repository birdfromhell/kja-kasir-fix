<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Print Cash Operasional</title>
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
        <div style="display: flex; flex-direction: column; align-items: center;">
            <h6 class="card-title" align="center"
                style="font-weight: bold; font-size: 25px; margin-bottom: 5px; margin-top: -5px;">
                PT. {{ Auth::user()->perusahaan->nama_perusahaan ?? 'Kururing' }}
            </h6>
            <h4 class="card-title" align="center"
                style="font-weight: bold; font-size: 30px; margin-top: 5px; color: red;">
                Laporan Hasil Cash Opname
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -20px;">
                Gudang {{ Auth::user()->perusahaan->alamat_gudang ?? 'Kururing' }}
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -10px;">
                Per <span id="tanggalHariIni"></span>
            </h4>
        </div>
        <p></p>
        <table id="absensi-table" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pecahan</th>
                    <th scope="col">Kertas</th>
                    <th scope="col">Logam</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col" style="text-align: center">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $jumlahcash = 0; // Inisialisasi jumlahcash di luar loop
                @endphp
                @foreach ($data as $index => $row)
                    <tr>
                        <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                            {{ $loop->iteration }}
                        </td>
                        <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                            {{ number_format($row->pecahan, 0, ',', '.') }}
                        </td>
                        <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                            {{ number_format($row->kertas, 0, ',', '.') }}
                        </td>
                        <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                            {{ number_format($row->logam, 0, ',', '.') }}
                        </td>
                        <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd;">
                            {{ number_format($row->jumlah, 0, ',', '.') }}
                        </td>
                        <td style="border-top: 2px solid #ddd; border-bottom: 1px solid #ddd; text-align: center">
                            {{ number_format($row->total, 0, ',', '.') }}
                        </td>
                    </tr>
                    @php
                        $jumlahcash += $row->total; // Menambahkan nilai total ke jumlahcash
                    @endphp
                @endforeach
            </tbody>
            <tbody>
                <tr class="total-row">
                    <td style="border-top: 2px solid #000;">
                    </td>
                    <td style="border-top: 2px solid #000;">
                    </td>
                    <td style="border-top: 2px solid #000;">
                    </td>
                    <td style="border-top: 2px solid #000;">
                    </td>
                    <td style="border-top: 2px solid #000; text-align: right;">
                        Total:
                    </td>
                    <td style="border-top: 2px solid #000; border-bottom: none; text-align: center">
                        {{ number_format($jumlahcash ?? 0, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr class="total-row">
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td style="text-align: right;">
                        Saldo Kas Operasional Sistem:
                    </td>
                    <td style="border-top: none; border-bottom: 1px solid #000; text-align: center">
                        @if ($kas < 0)
                            ({{ number_format(abs($kas), 0, ',', '.') }})
                        @else
                            {{ number_format($kas, 0, ',', '.') }}
                        @endif
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr class="total-row">
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td style="text-align: center">
                        @if ($jumlahcash - $kas < 0)
                            ({{ number_format(abs($jumlahcash - $kas), 0, ',', '.') }})
                        @else
                            {{ number_format($jumlahcash - $kas, 0, ',', '.') }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <p>‎ </p>
        <p>Ket: <input type="text" style="border: none;"></p>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: 0px; margin-bottom: 15px;">
        <footer>
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="flex: 30%; text-align: center;">
                    <span><strong>Pembuat </strong></span>
                </div>
                <div style="flex: 30%; text-align: center; position: relative;">
                    <span><strong>Dihitung</strong></span>
                </div>
                <div style="flex: 30%; text-align: center; position: relative;">
                    {{-- <span><strong>{{ $aktivaData->sum(function ($tipeAkun) {return $tipeAkun->bukuBesar->sum('debit') + $tipeAkun->bukuBesar->sum('kredit');}) }}</strong></span> --}}
                    <span><strong>Disetujui</strong></span>
                </div>
            </div>
        </footer>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: 100px; margin-bottom: 15px;">
    </div>

    <script>
        function updateCurrentTime() {
            var currentTimeElement = document.getElementById('formattedTime');
            if (currentTimeElement) {
                var now = new Date();
                now.setHours(now.getHours()); // Add 7 hours

                var formattedTime = formatDate(now);
                currentTimeElement.textContent = formattedTime;
            }
        }

        function formatDate(date) {
            var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
                "November", "Desember"
            ];

            var day = days[date.getDay()];
            var dayOfMonth = date.getDate();
            var month = months[date.getMonth()];
            var year = date.getFullYear();
            var hours = date.getHours();
            var minutes = ('0' + date.getMinutes()).slice(-2);
            var seconds = ('0' + date.getSeconds()).slice(-2);

            return day + ', ' + dayOfMonth + ' ' + month + ' ' + year + ' ' + hours + ':' + minutes + ':' + seconds;
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

    <script>
        var today = new Date();

        // Array nama bulan
        var monthNames = [
            "Januari", "Pebruari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // Mendapatkan nilai bulan dari tanggal saat ini
        var month = monthNames[today.getMonth()];

        // Format tanggal
        var formattedDate = today.getDate() + ' ' + month + ' ' + today.getFullYear();


        // Menyematkan tanggal ke dalam elemen HTML
        document.getElementById('tanggalHariIni').innerHTML = ' Tgl. ' + formattedDate;
    </script>
</body>

</html>
