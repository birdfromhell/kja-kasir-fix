<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="KJA">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Erka Solution Group</title>

    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/dashlite.css?ver=2.90') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/dashboard/css/theme.css?ver=2.9.0') }}">

    <!-- Load jQuery terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Load SweetAlert setelah jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="nk-body bg-lighter npc-default has-sidebar">
    <div class="nk-app-root">
        <div class="nk-main">
            @include('layout.components.sidebar')

            <div class="nk-wrap">
                @include('layout.components.navbar')

                @yield('content')

                @include('layout.components.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/dashboard/js/bundle.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('assets/dashboard/js/scripts.js?ver=2.9.0') }}"></script>
    <script src="{{ asset('assets/dashboard/js/charts/chart-ecommerce.js?ver=2.9.0') }}"></script>

    <!-- Tambahkan script AJAX Anda di sini -->
    <script>
        $(document).ready(function() {
            // Kode AJAX Anda di sini
            $('#btnUpdatePerusahaan').click(function() {
                Swal.fire({
                    title: "Do you want to save the changes?",
                    showCancelButton: true,
                    confirmButtonText: "Confirm",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $("#formUpdatePerusahaan").attr('action'),
                            type: "POST",
                            data: $("#formUpdatePerusahaan").serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success',
                                    icon: 'success',
                                    text: 'Perusahaan berhasil diperbarui!',
                                }).then(() => {
                                    window.location.href =
                                    '/app/relasi'; // Redirect setelah sukses
                                });
                            },
                            error: function(xhr) {
                                let errorMessage = 'Gagal memperbarui perusahaan.';
                                if (xhr.status === 422) {
                                    errorMessage = xhr.responseJSON.message ||
                                        'Ada kesalahan dalam input data.';
                                }
                                Swal.fire({
                                    title: 'Error',
                                    text: errorMessage,
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var userAgent = navigator.userAgent.toLowerCase();
            var isMobile = /mobile|android|iphone|ipad|phone/i.test(userAgent);
            var currentUrl = window.location.href;

            if (currentUrl.includes('/app/dashboard') && !currentUrl.includes('redirected=true')) {
                if (isMobile) {
                    window.location.href = "{{ url('/app/dashboard/mobile') }}?redirected=true";
                } else {
                    window.location.href = "{{ url('/app/dashboard') }}?redirected=true";
                }
            }
        });
    </script>

</body>

</html>
