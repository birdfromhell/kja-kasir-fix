<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Print Laporan Penjualan</title>
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


    <select id="perusahaan-select" onchange="onJSChange()">
        <option value="semua">Semua Perusahaan</option>
        @foreach ($perusahaan as $item)
            <option value="{{ $item->nama_perusahaan }}">{{ $item->nama_perusahaan }}</option>
        @endforeach
    </select>

    <select id="status-select" onchange="onJSChange()">
        <option value="semua">Semua Status</option>
        <option value="Belum Lunas">Belum Lunas</option>
        <option value="Lunas Sebagian">Lunas Sebagian</option>
        <option value="Lunas">Lunas</option>
    </select>



    <div id="printableArea">
        {{-- <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 80%;">
                <span>
                    <div class="text-muted">{{ Auth::user()->username }}</div>
                    <div class="text-muted"><strong>{{ Auth::user()->perusahaan->nama_perusahaan }}</strong></div>
                    <div class="text-muted">{{ $perusahaankita->alamat_gudang }}</strong></div>
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
                    <div class="text-muted">: {{ $fb->id_fb }}</div>
                    <div class="text-muted">: {{ $fb->tanggal_fb }} </div>
                    <div class="text-muted">: {{ $PB->jatuh_tempo }}</div>
                </span>
            </div>
        </div> --}}
        {{-- <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="text-muted">{{ Auth::user()->username }}</div>
                <div class="text-muted"><strong>PT {{ Auth::user()->perusahaan->nama_perusahaan }}</strong></div>
            </div>
            <div>
                <div class="text-muted">No. Faktur: {{ $fb->id_fb }}</div>
                <div class="text-muted">Tanggal: {{ $fb->tanggal_fb }} </div>
                <div class="text-muted">Jatuh Tempo: {{ $PB->jatuh_tempo }}</div>
            </div>
            <!--
            <div>
                <div class="text-muted">Tengah</div>
            </div>
        -->
        </div> --}}
        <div align="center">
            <h1 class="card-title" align="center" style="font-weight: bold; font-size: 35px;">LAPORAN PENJUALAN
            </h1>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                {{-- <div class="text-muted" style="font-weight: bold;">Supplier : {{ $PB->nama_perusahaan }}</div>
                <div class="text-muted">Alamat : {{ $perusahaan->alamat_gudang }}</div> --}}
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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nomor Faktur</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Jatuh Tempo</th>
                    <th scope="col">Sisa Hari</th>
                    <th scope="col">Total Pembelian</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $saldo = 0;
                    $totaljual = 0;
                    $totalbayar = 0;
                    $totalsaldo = 0;
                @endphp
                @foreach ($faktur as $item)
                    @php
                        // Mendapatkan tanggal dari variabel
                        $jatuhTempo = new DateTime($item->jatuh_tempo);
                        $tanggalFJ = new DateTime($item->tanggal_fj);

                        // Menghitung selisih antara dua tanggal
                        $selisihTanggal = $jatuhTempo->diff($tanggalFJ);

                        // Mengakses hasil selisih dalam format tertentu (contoh: jumlah hari)
                        $selisihHari = $selisihTanggal->days;

                        $totaljual += $item->total_penjualan;
                        $totalbayar += $item->pembayaran;
                        $saldo = $item->total_penjualan - $item->pembayaran;
                        $totalsaldo += $saldo;

                        if ($item->pembayaran === $item->total_penjualan) {
                            $status = 'Lunas';
                        } elseif ($item->pembayaran !== 0 && $item->pembayaran < $item->total_penjualan) {
                            $status = 'Lunas Sebagian';
                        } else {
                            $status = 'Belum Lunas';
                        }
                    @endphp
                    <tr class="table">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $item->tanggal_fj }}
                        </td>
                        <td>
                            {{ $item->id_fj }}
                        </td>
                        <td>
                            {{ $item->nama_perusahaan }}
                        </td>
                        <td>
                            {{ $item->jatuh_tempo }}
                        </td>
                        <td>
                            {{ $selisihHari }}
                        </td>
                        <td>
                            {{ number_format($item->total_penjualan ?? 0, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ number_format($item->pembayaran ?? 0, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ number_format($item->total_penjualan - $item->pembayaran ?? 0, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ $status }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tbody>
                <tr class="total-row">
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

                    </td>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

                    </td>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

                    </td>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

                    </td>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

                    </td>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                        Total :
                    </td>
                    <td id="total-beli" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                        {{ number_format($totaljual ?? 0, 0, ',', '.') }}
                    </td>
                    <td id="total-bayar" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                        {{ number_format($totalbayar ?? 0, 0, ',', '.') }}
                    </td>
                    <td id="total-saldo" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                        {{ number_format($totalsaldo ?? 0, 0, ',', '.') }}
                    </td>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                    </td>
                </tr>
            </tbody>
        </table>

        <div>

            <div style="position: absolute; bottom: 10px; left: 10px;" id="currentTime">
                <span class="text-muted"><span id="formattedTime"></span></span>
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
        function onPerusahaanChange() {
            var selectElement = document.getElementById('perusahaan-select');
            var selectedValue = selectElement.value;
            var rows = document.querySelectorAll('#absensi-table tbody tr.table');

            rows.forEach(function(row) {
                var perusahaanValue = row.cells[3].textContent.trim(); // Sesuaikan index dengan kolom perusahaan

                if (selectedValue === "semua" || selectedValue === perusahaanValue) {
                    row.style.display = ''; // Tampilkan baris
                } else {
                    row.style.display = 'none'; // Sembunyikan baris
                }
            });

            // Tampilkan atau sembunyikan total row
            var totalRow = document.querySelector('#absensi-table tbody tr.total-row');
            if (selectedValue === "semua" || selectedValue === perusahaanValue) {
                totalRow.style.display = ''; // Tampilkan total row
            } else {
                totalRow.style.display = 'none'; // Sembunyikan total row
            }
        }
    </script>

    <script>
        function onStatusChange() {
            var selectElement = document.getElementById('status-select');
            var selectedValue = selectElement.value;
            var rows = document.querySelectorAll('#absensi-table tbody tr.table');

            rows.forEach(function(row) {
                var statusValue = row.cells[9].textContent.trim();

                if (selectedValue === "semua" || selectedValue === statusValue) {
                    row.style.display = ''; // Show the row
                } else {
                    row.style.display = 'none'; // Hide the row
                }
            });

            // Tampilkan atau sembunyikan total row
            var totalRow = document.querySelector('#absensi-table tbody tr.total-row');
            if (selectedValue === "semua" || selectedValue === perusahaanValue) {
                totalRow.style.display = ''; // Tampilkan total row
            } else {
                totalRow.style.display = 'none'; // Sembunyikan total row
            }
        }
    </script>

    <script>
        function onJSChange() {
            var statusElement = document.getElementById('status-select');
            var selectedStatus = statusElement.value;
            var perusahaanElement = document.getElementById('perusahaan-select');
            var selectedPerusahaan = perusahaanElement.value;
            var rows = document.querySelectorAll('#absensi-table tbody tr.table');

            var currentValue = 1;
            var totaljual = 0;
            var totalBayar = 0;
            var totalSaldo = 0;

            rows.forEach(function(row) {
                var statusValue = row.cells[9].textContent.trim();
                var perusahaanValue = row.cells[3].textContent.trim();

                // Check both status and perusahaan conditions
                var statusCondition = selectedStatus === "semua" || selectedStatus === statusValue;
                var perusahaanCondition = selectedPerusahaan === "semua" || selectedPerusahaan === perusahaanValue;

                // Show the row if both conditions are true, otherwise hide the row
                if (statusCondition && perusahaanCondition) {
                    row.cells[0].textContent = currentValue++;
                    row.style.display = '';

                    // Calculate totals
                    var totalPembelian = parseFloat(row.cells[6].textContent
                        .trim()); // Adjust the index based on your column for total pembelian
                    var pembayaran = parseFloat(row.cells[7].textContent
                        .trim()); // Adjust the index based on your column for pembayaran

                    totaljual += totalPembelian;
                    totalBayar += pembayaran;

                    var saldo = totalPembelian - pembayaran;
                    totalSaldo += saldo;
                } else {
                    row.style.display = 'none'; // Hide the row
                }
            });

            // Update the contents of the total cells
            document.getElementById('total-beli').textContent = totaljual;
            document.getElementById('total-bayar').textContent = totalBayar;
            document.getElementById('total-saldo').textContent = totalSaldo;
        }
    </script>

</body>

</html>
