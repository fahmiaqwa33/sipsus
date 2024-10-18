<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href=".....">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard RW</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=".....">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Data RT</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=".....">
                <i class="mdi mdi-file-check menu-icon"></i>
                <span class="menu-title">Verifikasi Surat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=".....">
                <i class="mdi mdi-file-chart menu-icon"></i>
                <span class="menu-title">Laporan RW</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=".....">
                <i class="mdi mdi-information-outline menu-icon"></i>
                <span class="menu-title">Informasi RW</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=".....">
                <i class="mdi mdi-logout menu-icon"></i>
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
