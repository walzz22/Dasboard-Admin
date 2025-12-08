<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm p-3 mb-4">
    <div class="container-fluid">
        
        {{-- Tombol untuk menyembunyikan/menampilkan Sidebar (jika menggunakan JS) --}}
        <button class="btn btn-outline-secondary" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        {{-- Teks Sambutan --}}
        <span class="fw-bold ms-3 me-auto">
            Selamat Datang di Panel Admin
        </span>

        {{-- Area Notifikasi dan Profil --}}
        <div class="d-flex align-items-center">
            
            {{-- Notifikasi --}}
            <button class="btn btn-light me-3">
                <i class="fas fa-bell"></i>
                <span class="badge bg-danger position-absolute translate-middle rounded-pill">3</span>
            </button>
            
            {{-- Dropdown Profil --}}
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-1"></i> Admin
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>