<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.datarw.index') }}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Data Ketua RW</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.data_rt.index') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Data Ketua RT</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('data-warga.index') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Data Warga</span>
            </a>
       <!---surat----->
       <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#data-surat" aria-expanded="false" aria-controls="data-user">
            <i class="mdi mdi-email-outline menu-icon"></i>
            <span class="menu-title">Surat</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="data-surat">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('surat.masuk.admin.index3') }}">Surat Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Surat Terverifikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Surat Ditolak</a>
                </li>
            </ul>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-file-chart menu-icon"></i>
                <span class="menu-title">Laporan Kelurahan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.informasi.index') }}">
                <i class="mdi mdi-information-outline menu-icon"></i>
                <span class="menu-title">Informasi Kelurahan</span>
            </a>
        </li>        
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="mdi mdi-cog menu-icon"></i>
                <span class="menu-title">Setting Akun</span>
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
