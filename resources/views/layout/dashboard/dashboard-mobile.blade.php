@extends('layout.app')
@section('content')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inter', sans-serif;
            }

            :root {
                --primary-color: #7c3aed;
                --primary-dark: #6d28d9;
                --primary-light: #8b5cf6;
                --white: #ffffff;
                --gray-50: #f9fafb;
                --gray-100: #f3f4f6;
            }

            body {
                background-color: var(--gray-50);
                min-height: 100vh;
                padding: 1rem;
            }

            .dashboard-container {
                max-width: 480px;
                margin: 0 auto;
                padding: 1rem;
            }

            .dashboard-header {
                margin-bottom: 2rem;
                text-align: center;
            }

            .dashboard-header h1 {
                color: var(--primary-color);
                font-size: 1.5rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .dashboard-grid {
                display: grid;
                gap: 1.5rem;
            }

            .dashboard-card {
                background: var(--white);
                border-radius: 2rem;
                overflow: visible;
                transition: transform 0.2s, box-shadow 0.2s;
                position: relative;
            }

            .dashboard-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }

            .card-content {
                background: var(--primary-color);
                color: var(--white);
                padding: 1.5rem;
                border-radius: 2rem;
                position: relative;
            }

            .card-icon {
                background: var(--white);
                border-radius: 50%;
                width: 48px;
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
            }

            .card-icon i {
                color: var(--primary-color);
                font-size: 1.25rem;
            }

            .card-title {
                font-size: 1.25rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
                color: var(--white);
            }

            .card-description {
                font-size: 0.875rem;
                opacity: 0.9;
                margin-bottom: 1.5rem;
                line-height: 1.4;
                color: var(--white);
            }

            .card-options {
                position: relative;
            }

            .options-button {
                width: 100%;
                padding: 0.75rem;
                background: var(--white);
                border: none;
                border-radius: 1rem;
                color: var(--primary-color);
                font-weight: 600;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: background-color 0.2s;
            }

            .options-button:hover {
                background: var(--gray-100);
            }

            .options-dropdown {
                position: absolute;
                bottom: 100%;
                left: 0;
                right: 0;
                background: var(--white);
                border-radius: 1rem;
                box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);
                display: none;
                z-index: 10;
                max-height: 200px;
                overflow-y: auto;
                margin-bottom: 0.5rem;
            }

            .options-dropdown.active {
                display: block;
            }

            .option-item {
                padding: 0.75rem 1rem;
                color: #374151;
                cursor: pointer;
                transition: background-color 0.2s;
            }

            .option-item:hover {
                background: var(--gray-100);
                color: var(--primary-color);
            }

            /* Responsive Adjustments */
            @media (min-width: 640px) {
                .dashboard-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1.5rem;
                }

                .dashboard-container {
                    max-width: 768px;
                }
            }

            /* Loading Animation */
            .loading-indicator {
                width: 3px;
                height: 3px;
                border-radius: 50%;
                background: var(--white);
                position: absolute;
                right: 1rem;
                top: 50%;
                transform: translateY(-50%);
                animation: loading 1s infinite;
                opacity: 0;
            }

            .is-loading .loading-indicator {
                opacity: 1;
            }

            @keyframes loading {
                0%, 100% { transform: translateY(-50%) scale(1); }
                50% { transform: translateY(-50%) scale(2); }
            }
        </style>
    </head>
    <body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Dashboard Menu</h1>
            <p class="text-gray-600">Selamat datang di sistem manajemen</p>
        </div>

        <div class="dashboard-grid">
            @php
                $menuItems = [
                    [
                        'icon' => 'fa-clipboard-list',
                        'title' => 'Pemeliharaan',
                        'description' => 'Fitur untuk melakukan pemeliharaan barang dan relasi perusahaan.',
                        'options' => ['Tambah Data', 'Edit Data', 'Hapus Data', 'Lihat Data']
                    ],
                    [
                        'icon' => 'fa-cart-shopping',
                        'title' => 'Barang Masuk',
                        'description' => 'Fitur untuk membeli barang melalui berbagai aksi.',
                        'options' => ['Input Barang', 'Retur Barang', 'Cek Stok', 'Histori']
                    ],
                    [
                        'icon' => 'fa-box',
                        'title' => 'Barang Keluar',
                        'description' => 'Fitur untuk menjual barang melalui berbagai aksi.',
                        'options' => ['Jual Barang', 'Retur Penjualan', 'Cek Pengiriman', 'Histori']
                    ],
                    [
                        'icon' => 'fa-file-lines',
                        'title' => 'Laporan',
                        'description' => 'Fitur untuk membuat laporan seperti: laporan neraca, laporan laba rugi, dll.',
                        'options' => ['Laporan Neraca', 'Laporan Laba Rugi', 'Laporan Stok', 'Ekspor Data']
                    ]
                ];
            @endphp

            @foreach($menuItems as $item)
                <div class="dashboard-card">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fas {{ $item['icon'] }}"></i>
                        </div>
                        <h3 class="card-title">{{ $item['title'] }}</h3>
                        <p class="card-description">{{ $item['description'] }}</p>
                        <div class="card-options" data-card="{{ $loop->index }}">
                            <button class="options-button" onclick="toggleOptions({{ $loop->index }})">
                                Pilih
                            </button>
                            <div class="options-dropdown" id="dropdown-{{ $loop->index }}">
                                @foreach($item['options'] as $option)
                                    <div class="option-item" onclick="selectOption('{{ $item['title'] }}', '{{ $option }}')">
                                        {{ $option }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleOptions(index) {
            const dropdowns = document.querySelectorAll('.options-dropdown');
            dropdowns.forEach((dropdown, i) => {
                if (i === index) {
                    dropdown.classList.toggle('active');
                } else {
                    dropdown.classList.remove('active');
                }
            });
        }

        function selectOption(menu, option) {
            const card = event.target.closest('.card-options');
            const button = card.querySelector('.options-button');
            button.classList.add('is-loading');

            // Simulate loading state
            setTimeout(() => {
                button.classList.remove('is-loading');
                alert(`Selected "${option}" from ${menu} menu`);
                toggleOptions(parseInt(card.dataset.card));
            }, 500);
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            if (!event.target.closest('.card-options')) {
                document.querySelectorAll('.options-dropdown').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
        });
    </script>
    </body>
@endsection
