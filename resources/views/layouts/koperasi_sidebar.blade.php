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
            <a href="{{ route('koperasi.hasil_pengawasan.index') }}" >Hasil Pengawasan</a>
        </li>
    
    </ul>

    <div class="logout">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
            <img src='/img/keluar.png' alt="Logout Icon">
            Keluar
        </a>
        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf <!-- Tambahkan token CSRF -->
            <!-- Tambahkan input tambahan atau apa pun yang diperlukan di dalam form jika diperlukan -->
        </form>
    </div>
    
</aside>