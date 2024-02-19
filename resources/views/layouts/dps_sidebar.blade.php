<!-- resources/views/layouts/sidebar.blade.php -->

<aside class="sidebar" id="sidebar">
    

    <div class="sidebar-sub-header" id="sidebar-sub-header">
        <p>SIPANKA KOPSYAH</p>
    </div>

    <ul>
        <li class="menu-item">
            <img src='/img/tabler_home.png' alt="Home Icon"> 
            <a href="{{ route('dps.dashboard') }}" >Dashboard</a>
        </li>

        <li class="menu-item">
            <img src='/img/dps.png' alt="Riwayat Pengawasan"> 
            <a href="{{ route('dps_riwayat_pengawasan') }}" >Riwayat Pengawasan</a>
        </li>
        
        <li class="parent-menu">
            <li class="menu-item">
                <img src='/img/koperasi.png' alt="Manajemen Koperasi"> 
                <a href="#" onclick="toggleSubMenu('koperasiSubMenu')">Manajemen Koperasi <span class="arrow">&#11167;</span></a>
            </li>

            <ul id="koperasiSubMenu" class="submenu">
                <li class="menu-item">
                    <img src='/img/koperasi.png' alt="Manajemen Koperasi"> 
                    <a href="{{ route('dps_informasi_koperasi') }}">Informasi Koperasi</a>
                </li>
                
                <li class="menu-item">
                    <img src='/img/koperasi.png' alt="Manajemen Koperasi">
                    <a href="{{ route('dps_konversi_koperasi') }}">Konversi Koperasi</a>
                </li>

            </ul>
        </li>
    
    </ul>

    <div class="logout">
        <a href="#" onclick="logout()">
            <img src='/img/keluar.png' alt="Logout Icon">
            Keluar
        </a>
    </div>
</aside>