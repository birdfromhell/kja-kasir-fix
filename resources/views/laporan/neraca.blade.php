<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" />
    <title>Laporan Neraca</title>
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
</style>
<style>
    .container {
        display: flex;
        justify-content: space-between;
        position: relative;
    }

    .column {
        width: 48%;
        /* Sesuaikan lebar kolom */
    }

    .divider {
        position: absolute;
        height: 100%;
        width: 1px;
        /* Lebar garis vertikal */
        background-color: #000;
        /* Warna garis vertikal */
        top: 0;
        right: 50%;
        /* Mengatur posisi garis di tengah */
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
    <div id="printableArea">
        <div style="display: flex; flex-direction: column; align-items: center;">
            <h6 class="card-title" align="center"
                style="font-weight: bold; font-size: 25px; margin-bottom: 5px; margin-top: -5px;">
                PT. {{ Auth::user()->perusahaan->nama_perusahaan ?? 'Kururing' }}
            </h6>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: 5px;">
                NERACA
            </h4>
            <h4 class="card-title" align="center" style="font-weight: bold; font-size: 20px; margin-top: -20px;">
                Per tgl. <?php echo $currentDate; ?>
            </h4>
            <hr style="border-top: 2px solid black; width: 100%; margin-top: 15px; margin-bottom: 0px;">
            {{-- <hr style="border-top: 2px solid black; width: 100%; margin-top: -18px; margin-bottom: 15px;"> --}}
        </div>
        <div class="container">
            <div class="column">
                @foreach ($aktivaData as $tipeAkun)
                    <p></p>
                    {{-- Tipe Akun   --}}
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 60%;">
                            <span><strong>{{ strtoupper($tipeAkun->tipe) }}</strong></span>
                        </div>
                        <div style="flex: 10%;">
                            <span></span>
                        </div>
                        <div style="flex: 30%;">
                            <span></span>
                        </div>
                    </div>
                    @foreach ($tipeAkun->bukuBesar as $item)
                        <div class="custom-tab">
                            @php
                                $jumlah = $item->kredit + $item->debet;
                            @endphp
                            {{-- BukuBesar --}}
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

                            @foreach ($item->subBukuBesar as $subItem)
                                <div class="custom-tab">
                                    @php
                                        $jumlah = $subItem->kredit + $subItem->debet;
                                    @endphp
                                    {{-- SubBukuBesar --}}
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start;">
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
                        </div>
                    @endforeach

                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 60%;">
                            <span><strong>Jumlah {{ strtoupper($tipeAkun->tipe) }}</strong></span>
                        </div>
                        <div style="flex: 10%;">
                            <span></span>
                        </div>
                        <div style="flex: 30%; text-align: right; position: relative;">
                            <span><strong>
                                    @if ($tipeAkun->jumlah < 0)
                                        ({{ number_format(abs($tipeAkun->jumlah), 0, ',', '.') }})
                                    @else
                                        {{ number_format($tipeAkun->jumlah, 0, ',', '.') }}
                                    @endif
                                </strong></span>
                            {{-- <div
                                style="position: absolute; top: 0; right: 0; transform: translateX(-100%); border-top: 1px solid #000; width: 30%;">
                            </div> --}}
                        </div>
                    </div>
                @endforeach


                {{-- <div>Jumlah Aktiva (jumlah:
                    {{ $aktivaData->sum(function ($tipeAkun) {return $tipeAkun->bukuBesar->sum('debit') - $tipeAkun->bukuBesar->sum('kredit');}) }})
                </div> --}}
            </div>
            {{-- <div class="divider"></div> --}}
            <div class="column">
                @foreach ($pasivaData as $tipeAkun)
                    <p></p>
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 60%;">
                            <span><strong>{{ strtoupper($tipeAkun->tipe) }}</strong></span>
                        </div>
                        <div style="flex: 10%;">
                            <span></span>
                        </div>
                        <div style="flex: 30%;">
                            <span></span>
                        </div>
                    </div>
                    @foreach ($tipeAkun->bukuBesar as $item)
                        <div class="custom-tab">
                            @php
                                $jumlah = $item->kredit + $item->debet;
                            @endphp
                            <div style="display: flex; justify-content: space-between;">
                                <strong>{{ $item->ket }}</strong>
                                <span><strong>
                                        @if ($item->ket != 'Ekuitas')
                                            @if ($item->jumlah < 0)
                                                ({{ number_format(abs($item->jumlah), 0, ',', '.') }})
                                            @else
                                                {{ number_format($item->jumlah, 0, ',', '.') }}
                                            @endif
                                        @endif
                                    </strong></span>
                            </div>

                            @foreach ($item->subBukuBesar as $subItem)
                                <div class="custom-tab">
                                    @php
                                        $jumlah = $subItem->kredit + $subItem->debet;
                                    @endphp
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start;">
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
                        </div>
                    @endforeach

                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 60%;">
                            <span><strong>Jumlah {{ strtoupper($tipeAkun->tipe) }}</strong></span>
                        </div>
                        <div style="flex: 10%;">
                            <span></span>
                        </div>
                        <div style="flex: 30%; text-align: right; position: relative;">
                            <span><strong>
                                    @if ($tipeAkun->jumlah < 0)
                                        ({{ number_format(abs($tipeAkun->jumlah), 0, ',', '.') }})
                                    @else
                                        {{ number_format($tipeAkun->jumlah, 0, ',', '.') }}
                                    @endif
                                </strong></span>
                            {{-- <div
                                style="position: absolute; top: 0; right: 0; transform: translateX(-100%); border-top: 1px solid #000; width: 30%;">
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <p></p>
        <hr style="border-top: 2px solid black; width: 100%; margin-top: 0px; margin-bottom: 15px;">
        <div class="container">
            @foreach ($neraca as $item)
                <div class="column">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 60%; text-align: center;">
                            <span><strong>JUMLAH {{ strtoupper($item->neraca) }}</strong></span>
                        </div>
                        <div style="flex: 10%;">
                            <span></span>
                        </div>
                        <div style="flex: 30%; text-align: right; position: relative;">
                            {{-- <span><strong>{{ $aktivaData->sum(function ($tipeAkun) {return $tipeAkun->bukuBesar->sum('debit') + $tipeAkun->bukuBesar->sum('kredit');}) }}</strong></span> --}}
                            <span><strong>
                                    @if ($item->jumlah < 0)
                                        ({{ number_format(abs($item->jumlah), 0, ',', '.') }})
                                    @else
                                        {{ number_format($item->jumlah, 0, ',', '.') }}
                                    @endif
                                </strong></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <P></P>
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
