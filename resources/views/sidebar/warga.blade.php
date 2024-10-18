<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="......">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        
        <!-- Ajukan Surat -->
        <li class="nav-item">
            <a class="nav-link" href="......">
                <i class="mdi mdi-send menu-icon"></i>
                <span class="menu-title">Ajukan Surat</span>
            </a>
        </li>       
        
        <!-- Status Pengajuan -->
        <li class="nav-item">
            <a class="nav-link" href="......">
                <i class="mdi mdi-file-check menu-icon"></i>
                <span class="menu-title">Status Pengajuan</span>
            </a>
        </li>
        
        <!-- Informasi -->
        <li class="nav-item">
            <a class="nav-link" href="......">
                <i class="mdi mdi-information-outline menu-icon"></i>
                <span class="menu-title">Informasi</span>
            </a>
        </li>
        
        <!-- Profil Saya -->
        <li class="nav-item">
            <a class="nav-link" href="......">
                <i class="mdi mdi-account-circle menu-icon"></i>
                <span class="menu-title">Profil Saya</span>
            </a>
        </li>
        
        <!-- Bantuan -->
        <li class="nav-item">
            <a class="nav-link" href="......">
                <i class="mdi mdi-help-circle menu-icon"></i>
                <span class="menu-title">Bantuan</span>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</nav>
