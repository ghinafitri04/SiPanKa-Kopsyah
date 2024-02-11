<!-- resources/views/layouts/sidebar.blade.php -->

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src='/img/profile_admin.png' alt="Admin Profile">
        <p>Admin</p>
    </div>

    <div class="sidebar-sub-header" id="sidebar-sub-header">
        <p>SIPANKA KOPSYAH</p>
    </div>


    <ul>
        <li class="menu-item">
            <img src='/img/tabler_home.png' alt="Home Icon"> 
            <a href="{{ route('dashboardAdminProvinsi') }}" >Dashboard</a>
        </li>
        
        
        <li class="menu-item">
            <img src='/img/manajemen_kab.png' alt="Manajemen Kab"> 
            <a href="{{ route('admin_provinsi.manajemen_kab_kota.index') }}">Manajemen Kab Kota</a>
        </li>
        

        <li class="parent-menu">
            <li class="menu-item">
            <img src='/img/dps.png' alt="Manajemen dps"> 
            <a href="#" onclick="toggleSubMenu('dpsSubMenu')">Manajemen DPS <span class="arrow">&#11167;</span></a>
            </li>

            <ul id="dpsSubMenu" class="submenu">
                <li class="menu-item">
                    <img src='/img/dps.png' alt="Manajemen dps"> 
                    <a href="{{ route('admin_provinsi.manajemen_dps.index') }}">Admin DPS</a>
                </li>

                <li class="menu-item">
                    <img src='/img/dps.png' alt="Manajemen dps"> 
                    <a href="{{ route('pengawasandps') }}">Pengawasan DPS</a>
                </li>
            </ul>
        </li>

        <li class="parent-menu">
            <li class="menu-item">
                <img src='/img/koperasi.png' alt="Manajemen Koperasi"> 
                <a href="#" onclick="toggleSubMenu('koperasiSubMenu')">Manajemen Koperasi <span class="arrow">&#11167;</span></a>
            </li>

            <ul id="koperasiSubMenu" class="submenu">
                <li class="menu-item">
                    <img src='/img/koperasi.png' alt="Manajemen Koperasi"> 
                    <a href="{{ route('adminkoperasi') }}">Admin Koperasi</a>
                </li>
                
                <li class="menu-item">
                    <img src='/img/koperasi.png' alt="Manajemen Koperasi">
                    <a href="{{ route('konversikoperasi') }}">Konversi Koperasi</a>
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
