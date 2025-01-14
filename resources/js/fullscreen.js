document.addEventListener('DOMContentLoaded', function () {
    // Mendapatkan tombol fullscreen dan ikon di dalamnya
    var fullscreenButton = document.getElementById('fullscreenButton');
    var icon = fullscreenButton.querySelector('em');

    // Pastikan elemen tombol dan ikon ditemukan
    if (!fullscreenButton) {
        console.error('Fullscreen button not found');
        return;
    }

    if (!icon) {
        console.error('Icon element not found');
        return;
    }

    // Fungsi untuk mengaktifkan atau menonaktifkan mode fullscreen
    function toggleFullScreen() {
        // Jika tidak dalam fullscreen, masuk fullscreen
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().catch(err => {
                console.error(`Error trying to enable fullscreen mode: ${err.message}`);
            });
            // Ganti ikon menjadi shrink
            icon.classList.remove('ni-expand');
            icon.classList.add('ni-shrink');
        } else {
            // Jika sudah fullscreen, keluar dari fullscreen
            document.exitFullscreen().catch(err => {
                console.error(`Error trying to exit fullscreen mode: ${err.message}`);
            });
            // Ganti ikon menjadi expand
            icon.classList.remove('ni-shrink');
            icon.classList.add('ni-expand');
        }
    }

    // Event listener untuk klik tombol fullscreen
    fullscreenButton.addEventListener('click', function (e) {
        e.preventDefault();
        toggleFullScreen();
    });

    // Event listener untuk memonitor perubahan fullscreen
    document.addEventListener('fullscreenchange', function () {
        if (!document.fullscreenElement) {
            icon.classList.remove('ni-shrink');
            icon.classList.add('ni-expand');
        } else {
            icon.classList.remove('ni-expand');
            icon.classList.add('ni-shrink');
        }
    });

    // Event listener untuk kompatibilitas dengan browser lain (Webkit, Moz, MS)
    document.addEventListener('webkitfullscreenchange', updateFullscreenButton);
    document.addEventListener('mozfullscreenchange', updateFullscreenButton);
    document.addEventListener('MSFullscreenChange', updateFullscreenButton);

    // Fungsi untuk memperbarui tombol berdasarkan status fullscreen
    function updateFullscreenButton() {
        if (!document.fullscreenElement &&
            !document.webkitIsFullScreen &&
            !document.mozFullScreen &&
            !document.msFullscreenElement) {
            icon.classList.remove('ni-shrink');
            icon.classList.add('ni-expand');
        } else {
            icon.classList.remove('ni-expand');
            icon.classList.add('ni-shrink');
        }
    }
});
