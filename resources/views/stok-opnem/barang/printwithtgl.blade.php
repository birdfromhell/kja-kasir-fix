<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Print Kartu Stok {{ $barang->nama_barang }}</title>
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

    <p></p>
    <form action="/stok-opnem/barang/{{ $barang_id }}/print" method="POST">
        @csrf
        <label for="">Awal
            <input type="date" name="awal" id="awal" value="{{ old('awal') }}" required>
        </label>
        <label for="">Akhir
            <input type="date" name="akhir" id="akhir" value="{{ old('akhir') }}" required>
        </label>
        <button type="submit">Refresh</button>
    </form>
    <p></p>
    <form action="/stok-opnem/barang/{{ $barang_id }}/print" method="POST">
        @csrf
        <button type="submit">Semua Data</button>
    </form>
    <div id="printableArea">
        <div style="display: flex; flex-direction: column; align-items: center;">
            <h6 class="card-title" align="center"
                style="font-weight: bold; font-size: 25px; margin-bottom: 5px; margin-top: -5px;">
                PT. {{ Auth::user()->perusahaan->nama_perusahaan ?? 'Kururing' }}
            </h6>
            <h4 class="card-title" align="center"
                style="font-weight: bold; font-size: 30px; margin-top: 5px; color: red;">
                Kartu Persediaan Barang Dagang
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -20px;">
                Periode tgl {{ \Carbon\Carbon::parse($awal)->translatedFormat('j F Y') }} s/d
                {{ \Carbon\Carbon::parse($akhir)->translatedFormat('j F Y') }}
            </h4>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 15%;">
                <span>
                    <div class="" style="font-weight: bold;">No. Barang </div>
                    <div class="" style="font-weight: bold;">Nama Barang </div>
                    <div class="" style="font-weight: bold;">Kategori </div>
                    <div>‎</div>
                    <div class="" style="font-weight: bold;">Rincian Mutasi </div>
                </span>
            </div>
            <div style="flex: 20%; text-align: left;">
                <span>
                    <div class="text-muted">: {{ $barang->barang_id }}</div>
                    <div class="text-muted">: {{ $barang->nama_barang }}</div>
                    <div class="text-muted">: {{ $barang->kategori }}</div>
                    <div>‎</div>
                    <div class="text-muted">: </div>
                </span>
            </div>
            <div style="flex: 65%;">
                <span>
                    <div>‎</div>
                </span>
            </div>
        </div>
        <p></p>
        <table id="absensi-table" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="border-top: 2px solid #000;">No</th>
                    <th scope="col" style="border-top: 2px solid #000;">Tanggal</th>
                    <th scope="col" style="border-top: 2px solid #000;">No. Bukti</th>
                    <th scope="col" style="border-top: 2px solid #000;">Dokumen</th>
                    <th scope="col" style="border-top: 2px solid #000;">Keterangan</th>
                    <th scope="col" style="border-top: 2px solid #000; text-align: right;">Penambahan</th>
                    <th scope="col" style="border-top: 2px solid #000; text-align: right;">Pengurangan</th>
                    <th scope="col" style="border-top: 2px solid #000; text-align: right;">Stok</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="3" style="text-align: left; padding-left:5%"><b>Persediaan Awal : </b></td>
                    <td style="text-align: right;"><b>{{ $stokawal }}</b></td>
                </tr>
            </tbody>
            <tbody>
                @php
                    $no = 1;
                    $debetall = 0;
                    $kreditall = 0;
                @endphp
                @foreach ($data as $row)
                    @php
                        $debet = $row->debet;
                        $kredit = $row->kredit;
                        $debetall += $debet;
                        $kreditall += $kredit;
                    @endphp
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $row->tanggal }}
                        </td>
                        <td>
                            {{ $row->no_bukti }}
                        </td>
                        <td>
                            {{ $row->dok }}
                        </td>
                        <td style="text-align: right;">
                            {{ $row->ket }} - {{ $row->nama_perusahaan }}
                        </td>
                        <td style="text-align: right;">
                            {{ $row->debet }}
                        </td>
                        <td style="text-align: right;">
                            @if ($row->kredit !== 0)
                                {{ $row->kredit }}
                            @else
                                {{ $row->kredit }}
                            @endif
                        </td>
                        <td style="text-align: right;">
                            {{ $row->stok }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="3" style="text-align: left; padding-left:5%"><b>Persediaan Sampai Dengan
                            {{ \Carbon\Carbon::parse($akhir)->translatedFormat('j F Y') }}</b></td>
                    <td style="text-align: right;"><b>{{ $stokakhir }}</b></td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td style="border-top: 2px solid #000;"></td>
                    <td style="border-top: 2px solid #000;"></td>
                    <td style="border-top: 2px solid #000;"></td>
                    <td style="border-top: 2px solid #000;"></td>
                    <td style="border-top: 2px solid #000; text-align: right;"><b>Jumlah</b></td>
                    <td style="border-top: 2px solid #000;"><b>{{ $debetall }}</b></td>
                    <td style="border-top: 2px solid #000;"><b>{{ $kreditall }}</b></td>
                    <td style="border-top: 2px solid #000;"><b></b></td>
                </tr>
            </tbody>
        </table>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: 0px; margin-bottom: 15px;">
        <div style="position: absolute; bottom: 10px; left: 10px;" id="currentTime">
            <span class="text-muted">Tanggal: {{ now()->addHours(7)->format('Y-m-d H:i:s') }}</span>
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
        </script>
</body>

</html>
