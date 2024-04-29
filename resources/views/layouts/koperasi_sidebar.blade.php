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
            <a href="{{ route('koperasi.pemilihan_dps.index') }}" >Pemilihan DPS</a>
        </li>
        
        <li class="menu-item">
            <img src='/img/koperasi.png' alt="Proses Konversi">
            <a href="{{ route('prosesTahap1') }}" >Proses Konversi</a>
        </li>

        <li class="menu-item">
            <img src='/img/dps.png' alt="Hasil Pengawasan"> 
            <a href="{{ route('hasil.pengawasan.koperasi') }}" >Hasil Pengawasan</a>
        </li>
    
    </ul>

    <div class="logout">
        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
            @csrf <!-- Tambahkan token CSRF -->
            <button type="submit" >
                <img src='/img/keluar.png' alt="Logout Icon">
                Keluar
            </button>
        </form>
    </div>
    
</aside>