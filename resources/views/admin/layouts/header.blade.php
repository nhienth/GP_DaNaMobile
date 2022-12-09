<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->name }}</span><span class="user-status">Admin</span></div>
                    <span class="avatar"><img class="round" src="{{asset('images/user/default.jpg')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="page-profile.html"><i class="me-80" data-feather="user"></i> Thông tin cá nhân</a>
                    <a class="dropdown-item" href=""><i class="me-50" data-feather="settings"></i>Đổi mật khẩu</a>
                <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        <i class="me-50" data-feather="power"></i>{{ __('Đăng xuất') }}
                        </x-responsive-nav-link>
                    </form> 
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->