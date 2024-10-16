<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ url('app/dashboard') }}" class="logo-link nk-sidebar-logo">
                <img src="{{ asset('images/OW.png') }}" alt="Deskripsi Gambar" style="margin-right: 100px;">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt" style="font-weight: bold; font-size: 1.0rem; text-transform: capitalize; letter-spacing: -0.05em;">Main</h6>
                        <br>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ url('/app/dashboard') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon" style="display: flex; align-items: center;">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#" width="20" height="20" style="margin-right: 8px;">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <svg height="23px" width="23px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 2C7.31377 2 6.72293 2.48437 6.58835 3.15728L6.2198 5H4.1802L4.62719 2.76505C4.94874 1.15729 6.3604 0 8 0C9.6396 0 11.0513 1.15729 11.3728 2.76505L11.8198 5H9.7802L9.41165 3.15728C9.27707 2.48437 8.68623 2 8 2Z" fill="#8B5CF6"></path> <path d="M15 15H1V13L2 7H14L15 13V15Z" fill="#8B5CF6"></path> </g></svg>
                                                </g>
                                            </svg>
                                        </span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>

                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon" style="display: flex; align-items: center;">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#c671bb" width="20" height="20" style="margin-right: 8px;">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <svg height="25px" width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 19H6.2C5.0799 19 4.51984 19 4.09202 18.782C3.71569 18.5903 3.40973 18.2843 3.21799 17.908C3 17.4802 3 16.9201 3 15.8V8.2C3 7.07989 3 6.51984 3.21799 6.09202C3.40973 5.71569 3.71569 5.40973 4.09202 5.21799C4.51984 5 5.0799 5 6.2 5H17.8C18.9201 5 19.4802 5 19.908 5.21799C20.2843 5.40973 20.5903 5.71569 20.782 6.09202C21 6.51984 21 7.0799 21 8.2V8.5M9 9.5V8.5M9 9.5H11.0001M9 9.5C7.88279 9.49998 7.00244 9.62616 7.0001 10.8325C6.99834 11.7328 7.00009 12 9.00009 12C11.0001 12 11.0001 12.2055 11.0001 13.1667C11.0001 13.889 11 14.5 9 14.5M9 15.5V14.5M9 14.5L7.0001 14.5M14 10H17M14 20L16.025 19.595C16.2015 19.5597 16.2898 19.542 16.3721 19.5097C16.4452 19.4811 16.5147 19.4439 16.579 19.399C16.6516 19.3484 16.7152 19.2848 16.8426 19.1574L21 15C21.5523 14.4477 21.5523 13.5523 21 13C20.4477 12.4477 19.5523 12.4477 19 13L14.8426 17.1574C14.7152 17.2848 14.6516 17.3484 14.601 17.421C14.5561 17.4853 14.5189 17.5548 14.4903 17.6279C14.458 17.7102 14.4403 17.7985 14.405 17.975L14 20Z" stroke="#8B5CF6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                </g>
                                            </svg>
                                        </span>
                            <span class="nk-menu-text">Pemeliharaan</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ url('app/relasi') }}" class="nk-menu-link"><span class="nk-menu-text">Daftar Relasi</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ url('app/barang')}}" class="nk-menu-link"><span class="nk-menu-text">Daftar Barang</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ url('kategori')}}" class="nk-menu-link"><span class="nk-menu-text">Daftar Kategori</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ url('app/kelompok') }}" class="nk-menu-link"><span class="nk-menu-text">Daftar Kelompok</span></a>

                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ url('bukubesar')}}" class="nk-menu-link"><span class="nk-menu-text">Daftar Buku Besar</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon" style="display: flex; align-items: center;">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="" width="20" height="20" style="margin-right: 8px;">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <svg viewBox="0 -0.5 17 17" height="24px" width="24px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="si-glyph si-glyph-trolley-briefcase" fill="#8B5CF6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>985</title> <defs> </defs> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g transform="translate(1.000000, 0.000000)" fill="#8B5CF6"> <ellipse cx="4.471" cy="14.478" rx="1.471" ry="1.478" class="si-glyph-fill"> </ellipse> <circle cx="12.481" cy="14.481" r="1.481" class="si-glyph-fill"> </circle> <path d="M15.342,11.062 L2.938,11.062 L2.938,3.075 L1.206,0.267 C0.99,-0.018 0.576,-0.081 0.281,0.126 C-0.015,0.335 -0.079,0.735 0.135,1.022 L2.033,3.53 L2.033,11.062 C2.033,11.062 1.062,10.895 1.062,11.479 C1.062,12 1.627,11.948 1.996,11.948 L15.342,11.948 C15.71,11.948 15.951,11.884 15.951,11.535 C15.951,11.186 15.71,11.062 15.342,11.062 L15.342,11.062 Z" class="si-glyph-fill"> </path> <path d="M6.223,7.5 L6.223,7.5 L6.223,7.459 L6.223,7.5 Z" class="si-glyph-fill"> </path> <path d="M6.889,9.297 C6.889,9.65 6.61,9.936 6.264,9.936 L4.681,9.936 C4.336,9.936 4.057,9.65 4.057,9.297 L4.057,2.663 C4.057,2.31 4.336,2.024 4.681,2.024 L6.264,2.024 C6.61,2.024 6.889,2.31 6.889,2.663 L6.889,9.297 L6.889,9.297 Z" class="si-glyph-fill"> </path> <path d="M10.928,9.272 C10.928,9.638 10.646,9.935 10.299,9.935 L8.705,9.935 C8.356,9.935 8.076,9.638 8.076,9.272 L8.076,3.77 C8.076,3.403 8.356,3.106 8.705,3.106 L10.299,3.106 C10.646,3.106 10.928,3.403 10.928,3.77 L10.928,9.272 L10.928,9.272 Z" class="si-glyph-fill"> </path> <path d="M14.946,9.259 C14.946,9.655 14.661,9.978 14.308,9.978 L12.691,9.978 C12.337,9.978 12.052,9.656 12.052,9.259 L12.052,4.801 C12.052,4.405 12.337,4.084 12.691,4.084 L14.308,4.084 C14.661,4.084 14.946,4.405 14.946,4.801 L14.946,9.259 L14.946,9.259 Z" class="si-glyph-fill"> </path> </g> </g> </g></svg>
                                                </g>
                                            </svg>
                                        </span>
                            <span class="nk-menu-text">Barang Masuk</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ url('dataPO') }}" class="nk-menu-link"><span class="nk-menu-text">Order Pembelian (PO)</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ url('dataPB') }}" class="nk-menu-link"><span class="nk-menu-text">Penerimaan Barang (PB)</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ url('dataFB') }}" class="nk-menu-link"><span class="nk-menu-text">Faktur Pembelian (FB)</span></a>
                            </li>
                    </li>
                </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon" style="display: flex; align-items: center;">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#" width="20" height="20" style="margin-right: 8px;">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <svg fill="#8B5CF6" height="25px" width="25px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M356.174,144.695H189.217c-9.217,0-16.696,7.479-16.696,16.696v83.478h200.348V161.39 C372.869,152.173,365.391,144.695,356.174,144.695z"></path> </g> </g> <g> <g> <path d="M456.348,445.217h-16.696V294.956c0-9.22-7.475-16.696-16.696-16.696H172.521v72.626 c38.844,13.795,66.783,50.813,66.783,94.33c0,11.721-2.128,22.929-5.844,33.391h222.887c9.217,0,16.696-7.479,16.696-16.696 S465.565,445.217,456.348,445.217z"></path> </g> </g> <g> <g> <path d="M139.13,378.434V83.477c0-4.429-1.761-8.674-4.892-11.804L67.456,4.891c-6.521-6.521-17.087-6.521-23.609,0 c-6.521,6.516-6.521,17.092,0,23.609l61.892,61.891v297.027c-19.941,11.565-33.391,33.133-33.391,57.799 c0,36.826,29.956,66.783,66.783,66.783s66.783-29.956,66.783-66.783C205.913,408.39,175.956,378.434,139.13,378.434z M139.13,478.608c-18.413,0-33.391-14.978-33.391-33.391s14.978-33.391,33.391-33.391s33.391,14.978,33.391,33.391 S157.543,478.608,139.13,478.608z"></path> </g> </g> </g></svg>
                                                </g>
                                            </svg>
                                        </span>
                        <span class="nk-menu-text">Barang Keluar</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ url('app/dataOP') }}" class="nk-menu-link"><span class="nk-menu-text">Surat Order Penjualan(SO)</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ url('app/dataSJ') }}" class="nk-menu-link"><span class="nk-menu-text">Surat Jalan (SJ)</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ url('app/dataFJ') }}" class="nk-menu-link"><span class="nk-menu-text">Faktur Penjualan (FJ)</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon" style="display: flex; align-items: center;">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="" width="20" height="20" style="margin-right: 8px;">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 7C7 6.44772 7.44772 6 8 6H16C16.5523 6 17 6.44772 17 7C17 7.55228 16.5523 8 16 8H8C7.44772 8 7 7.55228 7 7Z" fill="#8B5CF6"></path> <path d="M8 9C7.44772 9 7 9.44771 7 10C7 10.5523 7.44772 11 8 11H13C13.5523 11 14 10.5523 14 10C14 9.44771 13.5523 9 13 9H8Z" fill="#8B5CF6"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M7 23H19C20.6569 23 22 21.6569 22 20V4C22 2.34315 20.6569 1 19 1H7C4.23858 1 2 3.23858 2 6V18C2 20.7055 4.27504 23 7 23ZM4 6C4 4.34315 5.34315 3 7 3H19C19.5523 3 20 3.44772 20 4V14.1707C19.6872 14.0602 19.3506 14 19 14H7C5.87439 14 4.83566 14.3719 4 14.9996V6ZM20 17C20 16.4477 19.5523 16 19 16H7C5.5135 16 4.04148 17.0532 4.04148 18.5C4.04148 19.9162 5.5135 21 7 21H19C19.5523 21 20 20.5523 20 20V17Z" fill="#8B5CF6"></path> </g></svg>
                                                </g>
                                            </svg>
                                        </span>
                        <span class="nk-menu-text">Laporan</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ url('laporan/pembelian') }}" class="nk-menu-link"><span class="nk-menu-text">Laporan Pembelian</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ url('laporan/penjualan') }}" class="nk-menu-link"><span class="nk-menu-text">Laporan Penjualan</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/apps-file-manager.html" class="nk-menu-link"><span class="nk-menu-text">Laporan Neraca</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="html/apps-chats.html" class="nk-menu-link"><span class="nk-menu-text">Laporan Laba Rugi</span></a>
                        </li>

                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon" style="display: flex; align-items: center;">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="" width="20" height="20" style="margin-right: 8px;">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                <svg height="23px" width="23px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#8B5CF6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#8B5CF6;} </style> <g> <polygon class="st0" points="1.914,293.73 1.914,293.714 1.897,293.657 "></polygon> <path class="st0" d="M10.027,313.061l-0.12-0.145c-0.008-0.008-0.008-0.008-0.008-0.008L10.027,313.061z"></path> <path class="st0" d="M10.027,223.738l-0.12-0.145c-0.008,0-0.008,0-0.008,0L10.027,223.738z"></path> <path class="st0" d="M1.914,204.423c0,0,0-0.024-0.008-0.04l-0.008-0.024L1.914,204.423z"></path> <path class="st0" d="M512,204.688c0.008-2.275-0.435-4.479-1.15-6.569c0.7-1.93,1.07-3.876,1.078-5.758 c0.016-2.96-0.805-5.822-2.05-8.122l-0.04-0.072c-0.378-0.691-0.893-1.423-1.464-2.155v-55.268 c2.268-3.257,3.619-7.173,3.627-11.378c0-8.138-4.905-15.448-12.408-18.527l-185.36-77.446h-0.539 c-3.892-1.367-7.928-2.187-12.022-2.187c-3.996,0-8.001,0.78-11.852,2.106h-0.482L17.667,128.786l-0.676,0.378l0.016,0.024 c-3.466,1.825-6.031,4.358-7.8,6.81c-3.095,4.302-4.679,8.838-5.83,12.955l-0.008,0.056c-1.728,6.393-2.452,12.882-2.894,18.375 l-0.008,0.048c-0.41,5.516-0.434,10.18-0.466,12.095v0.048v1.022c0.008,6.698,0.378,15.406,1.906,23.786l0.024,0.089 c0.805,4.213,1.938,8.491,3.869,12.657l0.032,0.064l0.007,0.016c0.982,2.051,2.26,4.246,4.029,6.337l0.04,0.048 c0.128,0.153,0.314,0.29,0.459,0.435c-0.37,0.434-0.853,0.852-1.159,1.294c-3.104,4.294-4.679,8.83-5.83,12.938l-0.008,0.04v0.016 c-1.728,6.393-2.452,12.89-2.894,18.382l-0.008,0.04C0.056,262.264,0.032,266.92,0,268.842v0.04v1.029 c0.008,6.707,0.378,15.416,1.914,23.803l0.016,0.064c0.805,4.222,1.938,8.508,3.869,12.673l0.039,0.072 c0.974,2.035,2.252,4.23,4.029,6.344l0.04,0.049c0.322,0.386,0.796,0.732,1.174,1.117c-0.636,0.7-1.367,1.392-1.874,2.091 c-3.104,4.302-4.679,8.838-5.83,12.938l-0.024,0.113l0.016-0.049c-1.728,6.393-2.452,12.891-2.894,18.383l-0.008,0.048 c-0.41,5.516-0.434,10.18-0.466,12.11v0.048v0.997c0.008,6.714,0.378,15.431,1.914,23.819l0.016,0.064 c0.805,4.214,1.938,8.5,3.869,12.657l0.039,0.08c0.974,2.043,2.252,4.23,4.029,6.345l-0.128-0.145l0.169,0.201 c1.696,1.97,4.028,3.876,6.94,5.299l-0.032,0.048l0.056,0.032l0.41,0.233l199.948,82.52l0.458,0.193 c4.431,1.81,9.143,2.734,13.879,2.734c4.648,0,9.304-0.892,13.694-2.686l255.907-103.99v-0.008c2.951-1.19,5.734-3.128,7.865-6.24 l0.008,0.008c0,0,0.008-0.024,0.016-0.04c0.008-0.008,0.016-0.008,0.024-0.024h-0.008c2.018-3.056,2.838-6.272,2.855-9.328 c0.016-2.96-0.805-5.822-2.05-8.122l-0.04-0.072v0.008c-0.378-0.692-0.893-1.431-1.464-2.163v-55.26 c2.268-3.257,3.619-7.189,3.627-11.386c0.008-2.541-0.531-5.01-1.44-7.318c0.917-2.171,1.359-4.382,1.367-6.498 c0.016-2.967-0.805-5.813-2.05-8.13l-0.04-0.072c-0.378-0.684-0.893-1.424-1.464-2.156v-55.252 C510.64,212.802,511.992,208.877,512,204.688z M216.272,469.136L25.852,390.539l-0.716-0.836c-0.595-0.925-1.358-2.686-1.97-4.873 c-0.948-3.273-1.6-7.535-1.994-11.845c-0.394-4.302-0.531-8.636-0.531-12.271v-0.86c0.032-2.806,0.136-10.928,1.294-18.568 c0.547-3.812,1.392-7.487,2.436-10.092l0.218-0.474l191.681,77.76V469.136z M216.272,378.324L43.005,306.789l-17.152-7.06 l-0.716-0.836c-0.595-0.933-1.358-2.686-1.97-4.866c-0.948-3.289-1.6-7.543-1.994-11.852c-0.394-4.302-0.531-8.636-0.531-12.264 v-0.868c0.032-2.814,0.136-10.928,1.294-18.576c0.547-3.804,1.392-7.487,2.436-10.084l0.218-0.474l191.681,77.759V378.324z M216.272,233.291v3.682v52.036l-175.108-72.3l-15.311-6.297l-0.716-0.844c-0.595-0.925-1.358-2.686-1.97-4.856 c-0.948-3.282-1.6-7.535-1.994-11.854c-0.394-4.31-0.531-8.636-0.531-12.262v-0.869c0.032-2.806,0.136-10.928,1.294-18.568 c0.547-3.812,1.392-7.486,2.436-10.092l0.218-0.466l191.681,77.752V233.291z M487.731,371.313L238.16,472.706l-0.66,0.297 c-1.922,0.756-3.924,1.15-5.934,1.15c-0.716,0-1.447-0.105-2.155-0.217v-61.412c0.941,0.105,1.914,0.161,2.855,0.161 c3.756,0,7.519-0.74,11.033-2.187l0.241-0.104l244.192-99.664V371.313z M487.731,280.156v0.338L238.16,381.895l-0.66,0.29 c-1.922,0.764-3.924,1.15-5.934,1.15c-0.716,0-1.447-0.104-2.155-0.201v-61.42c0.941,0.104,1.914,0.161,2.855,0.161 c3.756,0,7.519-0.74,11.033-2.18l0.241-0.112l171.272-69.896l72.919-29.77V280.156z M487.731,189.345v1.841L238.16,292.58 l-0.66,0.289c-1.922,0.764-3.924,1.158-5.934,1.158c-0.716,0-1.447-0.105-2.155-0.208v-56.145v-5.283 c0.941,0.113,1.914,0.16,2.855,0.16c3.756,0,7.519-0.731,11.033-2.17l0.241-0.105l244.192-99.672V189.345z"></path> <polygon class="st0" points="1.914,384.549 1.914,384.533 1.897,384.484 "></polygon> </g> </g></svg>
                                                </g>
                                            </svg>
                                        </span>
                        <span class="nk-menu-text">Jurnal</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ url('jurnal') }}" class="nk-menu-link"><span class="nk-menu-text">Input Lain</span></a>
                        </li>

                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon" style="display: flex; align-items: center;">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="" width="20" height="20" style="margin-right: 8px;">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <svg height="22px" width="22px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#8B5CF6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#8B5CF6;} </style> <g> <polygon class="st0" points="437.57,6.684 271.071,6.684 271.071,137.81 512,137.81 "></polygon> <polygon class="st0" points="240.929,6.684 74.43,6.684 0,137.81 240.929,137.81 "></polygon> <path class="st0" d="M0,505.316h512v-339.25H0V505.316z M199.372,239.41h113.256c11.56,0,20.928,9.368,20.928,20.928 c0,11.56-9.368,20.928-20.928,20.928H199.372c-11.56,0-20.928-9.368-20.928-20.928C178.444,248.778,187.812,239.41,199.372,239.41z "></path> </g> </g></svg>
                                                </g>
                                            </svg>
                                        </span>
                        <span class="nk-menu-text">Opname</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="{{ url('stokopnembarang') }}" class="nk-menu-link"><span class="nk-menu-text">Stok Opnem Barang</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ url('cashopnem') }}" class="nk-menu-link"><span class="nk-menu-text">Cash Opnem</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
