@extends('layout.app')
@section('content')
<!-- content @s -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;

        }

        body {
            background-color: black;
            min-height: 100vh;
            padding: 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Memposisikan konten di tengah vertikal */
            height: 114vh; /* Mengambil seluruh tinggi viewport */
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 15rem;
        }

        .card {
            background: #8B5CF6;
            border-radius: 1rem;
            padding: 1.5rem;
            position: relative;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            min-height: 100px;
            display: flex;
            flex-direction: column;
        }

        .card.active {
            background: #8B5CF6;
            color: white;
        }

        .card-icon {
            background: #fff;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .card-icon svg {
            width: 30px;
            height: 30px;
            color: #666;
        }

        .card h2 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #111;
        }

        .card.active h2 {
            color: #fff;
        }

        .card p {
            font-size: 0.875rem;
            color: white;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .card.active p {
            color: rgba(255,255,255,0.9);
        }

        .pilih-btn {
    background: #fff;
    border: none;
    padding: 0.75rem;
    border-radius: 1rem ; /* Lengkung pada semua sudut */
    width: 100%;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}


        .options-menu {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: 8B5CF6;
            border-radius: 0 0 1rem 1rem;
            padding: 1rem;
            transform: translateY(100%);
            display: none;
            box-shadow: 0 4px 6px grey;
        }

        .options-menu.show {
            display: block;
        }

      .options-menu button {
    width: 100%;
    padding: 0.5rem;
    text-align: left;
    background: none;
    border: none;
    cursor: pointer;
}

/* Tambahkan ini untuk mengatur border-radius pada tombol dalam menu */
.options-menu button:first-child {
    border-top-left-radius: 0.5rem; /* Sudut kiri atas melengkung */
    border-top-right-radius: 0.5rem; /* Sudut kanan atas melengkung */
}

.options-menu button:last-child {
    border-bottom-left-radius: 0.25rem; /* Sudut kiri bawah tetap kotak */
    border-bottom-right-radius: 0.25rem; /* Sudut kanan bawah tetap kotak */
}


        .options-menu button:hover {
            background: #8B5CF6;
        }

        footer {
            text-align: center;
            color: #666;
            font-size: 0.875rem;
            margin-top: 2rem;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 1200px) {
            .cards-grid {
                grid-template-columns: repeat(3, 1fr); /* 3 columns on medium screens */
            }
        }

        @media (max-width: 900px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 columns on small screens */
            }
        }

        @media (max-width: 600px) {
            .cards-grid {
                grid-template-columns: 1fr; /* 1 column on extra small screens */
            }

            .container {
                padding: 1rem; /* Less padding for mobile */
            }

            .card {
                padding: 1rem; /* Less padding for cards on mobile */
            }

            .card h2 {
                font-size: 1.1rem; /* Smaller font size for headers */
            }

            .card p {
                font-size: 0.8rem; /* Smaller font size for paragraphs */
            }
        }

    .card-pemeliharaan {
            margin-top: 30px; /* Adjust this value as needed */
        }
        card-all {
            margin-top: 30px;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="card-all">
        <div class="cards-grid">
<div class="card card-pemeliharaan">
    <div class="card-icon">
        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 19H6.2C5.0799 19 4.51984 19 4.09202 18.782C3.71569 18.5903 3.40973 18.2843 3.21799 17.908C3 17.4802 3 16.9201 3 15.8V8.2C3 7.07989 3 6.51984 3.21799 6.09202C3.40973 5.71569 3.71569 5.40973 4.09202 5.21799C4.51984 5 5.0799 5 6.2 5H17.8C18.9201 5 19.4802 5 19.908 5.21799C20.2843 5.40973 20.5903 5.71569 20.782 6.09202C21 6.51984 21 7.0799 21 8.2V8.5M9 9.5V8.5M9 9.5H11.0001M9 9.5C7.88279 9.49998 7.00244 9.62616 7.0001 10.8325C6.99834 11.7328 7.00009 12 9.00009 12C11.0001 12 11.0001 12.2055 11.0001 13.1667C11.0001 13.889 11 14.5 9 14.5M9 15.5V14.5M9 14.5L7.0001 14.5M14 10H17M14 20L16.025 19.595C16.2015 19.5597 16.2898 19.542 16.3721 19.5097C16.4452 19.4811 16.5147 19.4439 16.579 19.399C16.6516 19.3484 16.7152 19.2848 16.8426 19.1574L21 15C21.5523 14.4477 21.5523 13.5523 21 13C20.4477 12.4477 19.5523 12.4477 19 13L14.8426 17.1574C14.7152 17.2848 14.6516 17.3484 14.601 17.421C14.5561 17.4853 14.5189 17.5548 14.4903 17.6279C14.458 17.7102 14.4403 17.7985 14.405 17.975L14 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
    </div>
    <h2>Pemeliharaan</h2>
    <p>Fitur untuk melakukan pemeliharaan barang dan relasi perusahaan.</p>
    <button class="pilih-btn" onclick="toggleOptions(this)">Pilih</button>
    <div class="options-menu">
        <button onclick="window.location.href='{{ url('perusahaan') }}'">Daftar Relasi</button>

        <button onclick="window.location.href='{{ url('barang') }}'">Daftar Barang</button>

        <button onclick="window.location.href='{{ url('kategori') }}'">Daftar Kategori</button>
        <button onclick="window.location.href='{{ url('kelompok') }}'">Daftar Kelompok</button>
        <button onclick="window.location.href='{{ url('fakturpembelian') }}'">Daftar Buku Besar</button>
        <button>Print</button>
        <button>Download</button>
    </div>
</div>

<!-- Barang Masuk Card -->
<div class="card">
    <div class="card-icon">

        <svg viewBox="0 -0.5 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="si-glyph si-glyph-trolley-briefcase" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>985</title> <defs> </defs> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g transform="translate(1.000000, 0.000000)" fill="#000000"> <ellipse cx="4.471" cy="14.478" rx="1.471" ry="1.478" class="si-glyph-fill"> </ellipse> <circle cx="12.481" cy="14.481" r="1.481" class="si-glyph-fill"> </circle> <path d="M15.342,11.062 L2.938,11.062 L2.938,3.075 L1.206,0.267 C0.99,-0.018 0.576,-0.081 0.281,0.126 C-0.015,0.335 -0.079,0.735 0.135,1.022 L2.033,3.53 L2.033,11.062 C2.033,11.062 1.062,10.895 1.062,11.479 C1.062,12 1.627,11.948 1.996,11.948 L15.342,11.948 C15.71,11.948 15.951,11.884 15.951,11.535 C15.951,11.186 15.71,11.062 15.342,11.062 L15.342,11.062 Z" class="si-glyph-fill"> </path> <path d="M6.223,7.5 L6.223,7.5 L6.223,7.459 L6.223,7.5 Z" class="si-glyph-fill"> </path> <path d="M6.889,9.297 C6.889,9.65 6.61,9.936 6.264,9.936 L4.681,9.936 C4.336,9.936 4.057,9.65 4.057,9.297 L4.057,2.663 C4.057,2.31 4.336,2.024 4.681,2.024 L6.264,2.024 C6.61,2.024 6.889,2.31 6.889,2.663 L6.889,9.297 L6.889,9.297 Z" class="si-glyph-fill"> </path> <path d="M10.928,9.272 C10.928,9.638 10.646,9.935 10.299,9.935 L8.705,9.935 C8.356,9.935 8.076,9.638 8.076,9.272 L8.076,3.77 C8.076,3.403 8.356,3.106 8.705,3.106 L10.299,3.106 C10.646,3.106 10.928,3.403 10.928,3.77 L10.928,9.272 L10.928,9.272 Z" class="si-glyph-fill"> </path> <path d="M14.946,9.259 C14.946,9.655 14.661,9.978 14.308,9.978 L12.691,9.978 C12.337,9.978 12.052,9.656 12.052,9.259 L12.052,4.801 C12.052,4.405 12.337,4.084 12.691,4.084 L14.308,4.084 C14.661,4.084 14.946,4.405 14.946,4.801 L14.946,9.259 L14.946,9.259 Z" class="si-glyph-fill"> </path> </g> </g> </g></svg>
    </div>
    <h2>Barang Masuk</h2>
    <p>Fitur untuk membeli barang melalui berbagai aksi.</p>
    <button class="pilih-btn" onclick="toggleOptions(this)">Pilih</button>
    <div class="options-menu">
        <button onclick="window.location.href='{{ url('orderpembelian') }}'">Purchase Order</button>

        <button onclick="window.location.href='{{ url('penerimaanbarang') }}'">Penerimaan Barang</button>

        <button onclick="window.location.href='{{ url('fakturpembelian') }}'">Faktur Beli</button>
        <button>Print</button>
        <button>Download</button>
    </div>
</div>
<!-- Barang Keluar Card -->
<div class="card">
    <div class="card-icon">
        <svg fill="#000000" height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M356.174,144.695H189.217c-9.217,0-16.696,7.479-16.696,16.696v83.478h200.348V161.39 C372.869,152.173,365.391,144.695,356.174,144.695z"></path> </g> </g> <g> <g> <path d="M456.348,445.217h-16.696V294.956c0-9.22-7.475-16.696-16.696-16.696H172.521v72.626 c38.844,13.795,66.783,50.813,66.783,94.33c0,11.721-2.128,22.929-5.844,33.391h222.887c9.217,0,16.696-7.479,16.696-16.696 S465.565,445.217,456.348,445.217z"></path> </g> </g> <g> <g> <path d="M139.13,378.434V83.477c0-4.429-1.761-8.674-4.892-11.804L67.456,4.891c-6.521-6.521-17.087-6.521-23.609,0 c-6.521,6.516-6.521,17.092,0,23.609l61.892,61.891v297.027c-19.941,11.565-33.391,33.133-33.391,57.799 c0,36.826,29.956,66.783,66.783,66.783s66.783-29.956,66.783-66.783C205.913,408.39,175.956,378.434,139.13,378.434z M139.13,478.608c-18.413,0-33.391-14.978-33.391-33.391s14.978-33.391,33.391-33.391s33.391,14.978,33.391,33.391 S157.543,478.608,139.13,478.608z"></path> </g> </g> </g></svg>
    </div>
    <h2>Barang Keluar</h2>
    <p>Fitur untuk menjual barang melalui berbagai aksi.</p>
    <button class="pilih-btn" onclick="toggleOptions(this)">Pilih</button>
    <div class="options-menu">
        <button onclick="window.location.href='{{ url('suratorderpenjualan') }}'">Surat Order Penjualan</button>
        <button onclick="window.location.href='{{ url('kategori') }}'">Surat Jalan</button>
        <button onclick="window.location.href='{{ url('fakturpenjualan') }}'">Faktur Penjualan</button>
        <button>Print</button>
        <button>Download</button>
    </div>
</div>

<!-- Laporan Card -->
<div class="card">
    <div class="card-icon">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 7C7 6.44772 7.44772 6 8 6H16C16.5523 6 17 6.44772 17 7C17 7.55228 16.5523 8 16 8H8C7.44772 8 7 7.55228 7 7Z" fill="#0F0F0F"></path> <path d="M8 9C7.44772 9 7 9.44771 7 10C7 10.5523 7.44772 11 8 11H13C13.5523 11 14 10.5523 14 10C14 9.44771 13.5523 9 13 9H8Z" fill="#0F0F0F"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M7 23H19C20.6569 23 22 21.6569 22 20V4C22 2.34315 20.6569 1 19 1H7C4.23858 1 2 3.23858 2 6V18C2 20.7055 4.27504 23 7 23ZM4 6C4 4.34315 5.34315 3 7 3H19C19.5523 3 20 3.44772 20 4V14.1707C19.6872 14.0602 19.3506 14 19 14H7C5.87439 14 4.83566 14.3719 4 14.9996V6ZM20 17C20 16.4477 19.5523 16 19 16H7C5.5135 16 4.04148 17.0532 4.04148 18.5C4.04148 19.9162 5.5135 21 7 21H19C19.5523 21 20 20.5523 20 20V17Z" fill="#0F0F0F"></path> </g></svg>
    </div>
    <h2>Laporan</h2>
    <p>Fitur untuk membuat laporan seperti: laporan neraca, laporan laba rugi, dll.</p>
    <button class="pilih-btn" onclick="toggleOptions(this)">Pilih</button>
    <div class="options-menu">
        <button onclick="window.location.href='{{ url('laporanpembelian') }}'">Laporan Pembelian</button>
        <button onclick="window.location.href='{{ url('laporanpenjualan') }}'">Laporan Penjualan</button>
        <button onclick="window.location.href='{{ url('') }}'">Laporan Neraca</button>
        <button onclick="window.location.href='{{ url('') }}'">Laporan Laba Rugi</button>
        <button>Print</button>
        <button>Download</button>
    </div>
</div>
</div>
    <script>
        function toggleOptions(button) {
            // Menutup semua menu yang terbuka
            document.querySelectorAll('.options-menu').forEach(menu => {
                if (menu !== button.nextElementSibling) {
                    menu.classList.remove('show');
                }
            });

            // Toggle menu untuk tombol yang diklik
            const menu = button.nextElementSibling;
            menu.classList.toggle('show');
        }

        // Menutup menu saat mengklik di luar
        document.addEventListener('click', (event) => {
            if (!event.target.closest('.card')) {
                document.querySelectorAll('.options-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });
    </script>

</body>
</html>

<!-- content @e -->
@endsection
