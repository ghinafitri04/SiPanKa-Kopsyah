<!-- Navbar -->
<nav class="navbar" id="mainNavbar">
    <div class="navbar1">
    <style>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show-sidebar');
        }
    </style>    

            <button id="toggleSidebar" onclick="toggleSidebar()" class="menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" stroke-width="2">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
            </button>
            <img src="{{ asset('img/logo_sumbar.png') }}" alt="Logo" class="logo">
            <div class="navbar-brand">
                <div class="brand-text">
                    <p>Sistem Informasi Pemantauan Perkembangan Syariah</p>
                    <p>Provinsi Sumatra Barat</p>
                </div>
            </div>
            
            <div class="navbar-menu">
                <div class="profile-container">
                    <img src='/img/profile_admin.png' alt= "Admin Profile"> 
                    <li class="menu-item">
                        <a href="#" onclick="toggleProfileMenu('profilSubMenu')"><span class="arrow">&#11167;</span></a>
                    </li>
                </div>

                <div id="profilSubMenu" class="profile-dropdown">
                    <a class="profile-item" href="{{ route('koperasi.profile') }}">
                        <div class="profile-img">
                            <img src='/img/Profile Icon.png' alt="Profile Icon">
                        </div>
                        <div class="profile-text">
                            Profil
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a class="profile-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <div class="logout-img">
                            <img src='/img/keluar.png' alt="Logout Icon">
                        </div>
                        <div class="logout-text">
                            Logout
                        </div>
                    </a>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf <!-- Tambahkan token CSRF -->
                        <!-- Tambahkan input tambahan atau apa pun yang diperlukan di dalam form jika diperlukan -->
                    </form>
                </div>                
            </div>
        </div>
</nav>