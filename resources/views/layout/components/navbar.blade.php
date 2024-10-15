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
                    <img class="logo-light logo-img" src="{{ asset('images/pogo.png') }}" srcset="./images/logo2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('images/pogo.png') }}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                </a>
            </div>

            <div class="nk-header-search ml-3 ml-xl-0">
                <em class="icon ni ni-search"></em>
                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search">
            </div>

            <div class="nk-header-tools">
                <ul class="nk-quick-nav">

                    <!-- User Dropdown -->
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name  }}</div>
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
                                        <span class="lead-text">{{ Auth::user()->name  }}</span>
                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
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
            </div>
        </div>
    </div>
</div>
