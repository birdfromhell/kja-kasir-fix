<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">

    <link rel="shortcut icon" href="{{ asset('images/logooo.png') }}">
    <title>Erka Solution Group</title>

    <link rel="stylesheet" href="{{ asset('material/assets/css/dashlite.css?ver=2.9.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('material/assets/css/theme.css?ver=2.9.0') }}">

    <!-- Load jQuery terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Load SweetAlert setelah jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<script src="{{ asset('material/assets/js/bundle.js?ver=2.9.0') }}"></script>
<script src="{{ asset('material/assets/js/scripts.js?ver=2.9.0') }}"></script>
<script src="{{ asset('material/assets/js/charts/chart-ecommerce.js?ver=2.9.0') }}"></script>

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
                                window.location.href = '/app/relasi'; // Redirect setelah sukses
                            });
                        },
                        error: function(xhr) {
                            let errorMessage = 'Gagal memperbarui perusahaan.';
                            if (xhr.status === 422) {
                                errorMessage = xhr.responseJSON.message || 'Ada kesalahan dalam input data.';
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

</body>
</html>
