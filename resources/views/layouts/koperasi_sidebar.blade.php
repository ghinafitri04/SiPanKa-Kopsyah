<!-- resources/views/layouts/sidebar.blade.php -->

<aside class="sidebar" id="sidebar">
    

    <div class="sidebar-sub-header" id="sidebar-sub-header">
        <p>SIPANKA KOPSYAH</p>
    </div>

    <ul>
        <li class="menu-item">
            <img src='/img/tabler_home.png' alt="Home Icon"> 
            <a href="{{ route('koperasi.dashboard') }}" >Dashboard</a>
        </li>

        <li class="menu-item">
            <img src='/img/dps.png' alt="Pemilihan DPS"> 
            <a href="{{ route('pemilihan.dps') }}" >Pemilihan DPS</a>
        </li>
        
        <li class="menu-item">
            <img src='/img/koperasi.png' alt="Proses Konversi">
            <a href="{{ route('proses.konversi.koperasi') }}" >Proses Konversi</a>
        </li>

        <li class="menu-item">
            <img src='/img/dps.png' alt="Hasil Pengawasan"> 
            <a href="{{ route('hasil.pengawasan.koperasi') }}" >Hasil Pengawasan</a>
        </li>
    
    </ul>

    <div class="logout">
        <a href="#" onclick="logout()">
            <img src='/img/keluar.png' alt="Logout Icon">
            Keluar
        </a>
    </div>
</aside>