<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                    <em class="icon ni ni-menu"></em>
                </a>
            </div>

            <div class="nk-header-brand d-xl-none">
                <a href="{{ url('app/dashboard') }}" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('assets/dashboard/images/logo-clear.png') }}" srcset="{{ asset('images/logo-clear.png') }} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('assets/dashboard/images/logo-clear.png') }}" srcset="{{ asset('images/logo-clear.png') }} 2x" alt="logo-dark">
                </a>
            </div>

            <div class="nk-header-search ml-3 ml-xl-0">
                <em class="icon ni ni-search"></em>
                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search">
            </div>

            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <!-- Tombol Fullscreen -->
                    <li>
                        <button id="fullscreenButton" class="btn btn-icon btn-sm btn-trigger">
                            <em class="icon ni ni-expand"></em>
                        </button>
                    </li>

                    <!-- User Dropdown -->
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ url('app/user/profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="{{ url('/app/setting') }}"><em class="icon ni ni-setting-alt"></em><span>Setting Aplikasi</span></a></li>
                                    <li><a href="{{ url('app/user/profile#accountSettings') }}"><em class="icon ni ni-activity-alt"></em><span>Profile Perusahaan</span></a></li>
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <em class="icon ni ni-signout"></em><span>Log out</span>
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fullscreenButton = document.getElementById('fullscreenButton');
    const icon = fullscreenButton?.querySelector('em');

    if (!fullscreenButton || !icon) {
        console.error('Fullscreen button or icon not found');
        return;
    }

    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen()
                .then(() => {
                    icon.classList.remove('ni-expand');
                    icon.classList.add('ni-shrink');
                    localStorage.setItem('fullscreen', 'true');
                })
                .catch((err) => {
                    console.error('Error attempting to enable fullscreen:', err);
                });
        } else {
            document.exitFullscreen()
                .then(() => {
                    icon.classList.remove('ni-shrink');
                    icon.classList.add('ni-expand');
                    localStorage.setItem('fullscreen', 'false');
                })
                .catch((err) => {
                    console.error('Error attempting to exit fullscreen:', err);
                });
        }
    }

    fullscreenButton.addEventListener('click', function (e) {
        e.preventDefault();
        toggleFullScreen();
    });

    if (localStorage.getItem('fullscreen') === 'true') {
        document.documentElement.requestFullscreen()
            .then(() => {
                icon.classList.remove('ni-expand');
                icon.classList.add('ni-shrink');
            })
            .catch((err) => {
                console.error('Error re-enabling fullscreen:', err);
            });
    }

    document.addEventListener('fullscreenchange', () => {
        if (!document.fullscreenElement) {
            icon.classList.remove('ni-shrink');
            icon.classList.add('ni-expand');
            localStorage.setItem('fullscreen', 'false');
        }
    });
});
</script>
@endpush
