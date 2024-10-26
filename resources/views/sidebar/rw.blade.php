<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="index.html">
                    <img src="images/logo.svg" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="index.html">
                    <img src="images/logo-mini.svg" alt="logo" />
                </a>
            </div>
        </div>
    </div>

    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Data User -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#data-user" aria-expanded="false" aria-controls="data-user">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Data User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="data-user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="">Admin RT</a></li>
                    <li class="nav-item"><a class="nav-link" href="">warga</a></li>
                </ul>
            </div>
        </li>
        
        <!---surat----->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#data-surat" aria-expanded="false" aria-controls="data-user">
                <i class="mdi mdi-email-outline menu-icon"></i>
                <span class="menu-title">Surat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="data-surat">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="">surat masuk</a></li>
                    <li class="nav-item"><a class="nav-link" href="">surat terverivikasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="">surat ditolak</a></li>
                </ul>
        


        <!-- Informasi -->
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-information menu-icon"></i>
                <span class="menu-title">Informasi</span>
            </a>
        </li>

        <!-- Setting -->
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
        
        <!-- Form logout yang tersembunyi -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
