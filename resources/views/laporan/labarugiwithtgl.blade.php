<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Laporan Laba Rugi</title>
</head>

<style>
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
</style>
<style>
    /* Style agar tabel bersebelahan */
    .table-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        /* Jarak antara tabel */
    }

    /* Style tambahan jika diperlukan */
    .table {
        width: 48%;
        /* Lebar masing-masing tabel */
    }

    .custom-tab {
        padding-left: 20px;
        /* Sesuaikan dengan jumlah piksel yang Anda inginkan */
    }

    .custom-left {
        padding-left: 40px;
        /* Sesuaikan dengan jumlah piksel yang Anda inginkan */
    }
</style>


<body style="background: white">
    <button href="#" onclick="printAbsensi('printableArea');" class="btn btn-success btn-sm"><span
            class="glyphicon glyphicon-print" bgcolor="blue">Print</span></button>
    <?php
    // Set the time zone to your desired location
    date_default_timezone_set('Asia/Jakarta');
    
    // Array nama bulan dalam Bahasa Indonesia
    $namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    
    // Mendapatkan tanggal saat ini
    $tanggal = date('d');
    // Mendapatkan bulan saat ini
    $bulan = $namaBulan[date('n') - 1];
    // Mendapatkan tahun saat ini
    $tahun = date('Y');
    
    // Gabungkan ke dalam format yang diinginkan
    $currentDate = $tanggal . ' ' . $bulan . ' ' . $tahun;
    ?>
    <p></p>
    <form action="/laporan/laba-rugi" method="POST">
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
    <form action="/laporan/laba-rugi" method="POST" hidden>
        @csrf
        <button type="submit">Semua Data</button>
    </form>
    <div id="printableArea">
        <div style="display: flex; flex-direction: column; align-items: center;">
            <h6 class="card-title" align="center"
                style="font-weight: bold; font-size: 25px; margin-bottom: 5px; margin-top: -5px;">
                PT. {{ Auth::user()->perusahaan->nama_perusahaan ?? 'Kururing' }}
            </h6>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: 5px;">
                Laporan Laba Rugi
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -20px;">
                Periode tgl {{ \Carbon\Carbon::parse($awal)->translatedFormat('j F Y') }} s/d
                {{ \Carbon\Carbon::parse($akhir)->translatedFormat('j F Y') }}
            </h4>
            <hr style="border-top: 2px solid black; width: 100%; margin-top: 10px; margin-bottom: 0px;">
            {{-- <hr style="border-top: 2px solid black; width: 100%; margin-top: -18px; margin-bottom: 15px;"> --}}
        </div>
        <p></p>
        <span><strong>PENDAPATAN</strong></span>
        <div class="container">
            <div class="column">
                @foreach ($penjualan as $item)
                    <div class="custom-tab">
                        <div style="display: flex; justify-content: space-between;">
                            <strong>{{ $item->ket }}</strong>
                            <span>
                                <strong>
                                    @if ($totalpenjualan < 0)
                                        ({{ number_format(abs($totalpenjualan), 0, ',', '.') }})
                                    @else
                                        {{ number_format($totalpenjualan, 0, ',', '.') }}
                                    @endif
                                </strong>
                            </span>
                        </div>
                    </div>
                    @foreach ($item->subBukuBesar as $subItem)
                        <div class="custom-left">
                            @php
                                $jumlah = $subItem->kredit + $subItem->debet;
                            @endphp
                            {{-- SubBukuBesar --}}
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div style="flex: 60%;">
                                    <span>{{ $subItem->ket }}</span>
                                </div>
                                <div style="flex: 25%; text-align: right;">
                                    <span>
                                        @if ($totalpenjualan < 0)
                                            ({{ number_format(abs($totalpenjualan), 0, ',', '.') }})
                                        @else
                                            {{ number_format($totalpenjualan, 0, ',', '.') }}
                                        @endif
                                    </span>
                                </div>
                                <div style="flex: 15%; text-align: right;">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                {{-- HPP --}}
                @php
                    $totalphp = 0;
                    $totalphp = $saldo_kumulatif_pbdawal + $pembelian - $saldo_kumulatif_pbdakhir;
                @endphp
                @foreach ($hpp as $item)
                    <div class="custom-tab">
                        <div style="display: flex; justify-content: space-between;">
                            <strong>{{ $item->ket }}</strong>
                            <span><strong>
                                    @if ($totalphp < 0)
                                        ({{ number_format(abs($totalphp), 0, ',', '.') }})
                                    @else
                                        {{ number_format($totalphp, 0, ',', '.') }}
                                    @endif
                                </strong></span>
                        </div>
                    </div>
                    <div class="custom-left">
                        {{-- SubBukuBesar --}}
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div style="flex: 60%;">
                                <span>Persediaan Barang Dagang Awal</span>
                            </div>
                            <div style="flex: 25%; text-align: right;">
                                <span>
                                    @if ($saldo_kumulatif_pbdawal < 0)
                                        ({{ number_format(abs($saldo_kumulatif_pbdawal), 0, ',', '.') }})
                                    @else
                                        {{ number_format($saldo_kumulatif_pbdawal, 0, ',', '.') }}
                                    @endif
                                </span>
                            </div>
                            <div style="flex: 15%; text-align: right;">
                                <span></span>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div style="flex: 60%;">
                                <span>Pembelian</span>
                            </div>
                            <div style="flex: 25%; text-align: right;">
                                <span>
                                    @if ($pembelian < 0)
                                        ({{ number_format(abs($pembelian), 0, ',', '.') }})
                                    @else
                                        {{ number_format($pembelian, 0, ',', '.') }}
                                    @endif
                                </span>
                            </div>
                            <div style="flex: 15%; text-align: right;">
                                <span></span>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div style="flex: 60%;">
                                <span>Persediaan Barang Dagang Akhir</span>
                            </div>
                            <div style="flex: 25%; text-align: right;">
                                <span>
                                    @if ($saldo_kumulatif_pbdakhir < 0)
                                        ({{ number_format(abs($saldo_kumulatif_pbdakhir), 0, ',', '.') }})
                                    @else
                                        {{ number_format($saldo_kumulatif_pbdakhir, 0, ',', '.') }}
                                    @endif
                                </span>
                            </div>
                            <div style="flex: 15%; text-align: right;">
                                <span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <p></p>
                @php
                    $labakotor = 0;
                    $labakotor = $totalpenjualan - $totalphp;
                @endphp
                <div class="custom-tab">
                    <div style="display: flex; justify-content: space-between;">
                        <strong>Laba Kotor</strong>
                        <span><strong>
                                @if ($labakotor < 0)
                                    ({{ number_format(abs($labakotor), 0, ',', '.') }})
                                @else
                                    {{ number_format($labakotor, 0, ',', '.') }}
                                @endif
                            </strong></span>
                    </div>
                </div>
                <p></p>
                @php
                    $biayalaintotal = 0;
                    $biayalaintotal =
                        $saldo_kumulatif_bbm +
                        $saldo_kumulatif_listrik +
                        $saldo_kumulatif_pulsa +
                        $saldo_kumulatif_pengiriman +
                        $saldo_kumulatif_gaji;
                @endphp
                @foreach ($biayalain as $item)
                    @php
                        $biayalain = $item->jumlah;
                        $lababersih = $labakotor - $biayalaintotal;
                    @endphp
                    <div class="custom-tab">
                        <div style="display: flex; justify-content: space-between;">
                            <strong>{{ $item->ket }}</strong>
                            <span><strong>
                                    @if ($item->jumlah < 0)
                                        ({{ number_format(abs($item->jumlah), 0, ',', '.') }})
                                    @else
                                        {{ number_format($item->jumlah, 0, ',', '.') }}
                                    @endif
                                </strong></span>
                        </div>
                    </div>
                    @foreach ($item->subBukuBesar as $subItem)
                        <div class="custom-left">
                            @php
                                $jumlah = $subItem->kredit + $subItem->debet;
                            @endphp
                            {{-- SubBukuBesar --}}
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div style="flex: 60%;">
                                    <span>{{ $subItem->ket }}</span>
                                </div>
                                <div style="flex: 25%; text-align: right;">
                                    <span>
                                        @if ($subItem->jumlah < 0)
                                            ({{ number_format(abs($subItem->jumlah), 0, ',', '.') }})
                                        @else
                                            {{ number_format($subItem->jumlah, 0, ',', '.') }}
                                        @endif
                                    </span>
                                </div>
                                <div style="flex: 15%; text-align: right;">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                <p></p>
                <div class="custom-tab">
                    <div style="display: flex; justify-content: space-between;">
                        <strong>Laba Bersih</strong>
                        <span><strong>
                                @if ($lababersih < 0)
                                    ({{ number_format(abs($lababersih), 0, ',', '.') }})
                                @else
                                    {{ number_format($lababersih, 0, ',', '.') }}
                                @endif
                            </strong></span>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: 0px; margin-bottom: 15px;">
    </div>

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
