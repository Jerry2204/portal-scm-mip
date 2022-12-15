<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <div class="d-flex justify-content-center align-items-center word-image text-white bg-c-blue">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                {{-- <img class="img-40 img-radius" src="{{ asset('admin/images/avatar-4.jpg') }}" alt="User-Profile-Image"> --}}
                <div class="user-details">
                    <span>{{ auth()->user()->name }}</span>
                    <span id="more-details">{{ auth()->user()->role->nama_role }}<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="{{ route('admin.users.show') }}"><i class="ti-user"></i>View Profile</a>
                        <a class="logout" href="#"><i class="ti-layout-sidebar-left"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            @if (auth()->user()->role->nama_role == 'user')
            <li>
                <a href="{{ route('scm.dashboard') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">SCM Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
            @if (auth()->user()->role->nama_role == 'admin')
            <li>
                <a href="{{ route('admin.users') }}">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Users</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
