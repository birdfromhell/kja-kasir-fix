<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Print Laporan Hasil Stok Opname</title>
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
                Laporan Hasil Stok Opname
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -20px;">
                Gudang {{ Auth::user()->perusahaan->alamat_gudang ?? 'Kururing' }}
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -10px;">
                Per <span id="tanggalHariIni"></span>
            </h4>
        </div>
        <p></p>
        <table id="absensi-table" class="table table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="border-top: 2px solid #000; width: 3%">No.</th>
                    <th scope="col" style="border-top: 2px solid #000; width: 14%">No. Barang</th>
                    <th scope="col" style="border-top: 2px solid #000; width: 35%">Nama Barang</th>
                    <th scope="col" style="border-top: 2px solid #000; text-align: right;">Sistem</th>
                    <th scope="col" style="border-top: 2px solid #000; text-align: right;">Phisik</th>
                    <th scope="col" style="border-top: 2px solid #000; text-align: right;">Selisih</th>
                    <th scope="col" style="border-top: 2px solid #000; text-align: center;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                    $total = 0;
                @endphp
                @foreach ($kategori as $data)
                    @php
                        $total += $data->stok;
                    @endphp
                    <tr>
                        <td colspan="3">
                            <b>Kategori : {{ $data->kategori_barang }}</b>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($data->barang as $row)
                        <tr>
                            <td style="text-align: left">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                </strong>
                                {{ $row->barang_id }}
                                </strong>
                            </td>
                            <td>
                                {{ $row->nama_barang }}
                            </td>
                            <td style="text-align: right;">
                                {{ $row->stok }}
                            </td>
                            <td style="text-align: right;">
                                {{ $row->phisik }}
                            </td>
                            <td style="text-align: right;">
                                @if ($row->selisih < 0)
                                    ({{ number_format(abs($row->selisih), 0, ',', '.') }})
                                @else
                                    {{ number_format($row->selisih, 0, ',', '.') }}
                                @endif
                            </td>
                            <td style="text-align: center">
                                {{ $row->ket }}
                            </td>
                        </tr>
                    @endforeach
            <tbody>
                <tr>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"></td>
                    {{-- <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td> --}}
                    {{-- <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"></td> --}}
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b>Jumlah</b></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000; text-align: right;">
                        <b>{{ $data->stok }}</b>
                    </td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td>
                </tr>
            </tbody>
            @endforeach
            </tbody>
            <tbody>
                <tr>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"></td>
                    {{-- <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td> --}}
                    {{-- <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"></td> --}}
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b>Total</b></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000; text-align: right;">
                        <b>{{ $total }}</b>
                    </td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td>
                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000"><b></b></td>
                </tr>
            </tbody>
        </table>
        <p>‎ </p>
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
        {{-- <hr style="border-top: 2px solid black; width: 100%; margin-top: -10px; margin-bottom: 15px;"> --}}
        <div style="position: absolute; bottom: 10px; left: 10px;" id="currentTime">
            <span class="text-muted">Tanggal: {{ now()->addHours(7)->format('Y-m-d H:i:s') }}</span>
        </div>
    </div>
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
