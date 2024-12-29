<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard RT</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rt.data_warga.index') }}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Data warga</span>
            </a>
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('surat.masuk') }}">surat masuk</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat.terverifikasi') }}">Surat Terverifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surat.ditolak') }}">Surat Ditolak</a>
                    </li>
                </ul>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-file-chart menu-icon"></i>
                <span class="menu-title">Laporan RT</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rt.informasi.index') }}">
               <i class="mdi mdi-information-outline menu-icon"></i>
                <span class="menu-title">Informasi RT</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-account-circle menu-icon"></i>
                <span class="menu-title">Profil</span>
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
