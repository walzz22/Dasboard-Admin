<div class="border-end" id="sidebar-wrapper">
    
    <div class="sidebar-heading text-center py-4 fs-5 fw-bold" style="color: #2196F3;">
        APP DASHBOARD
    </div>
    
    <div class="list-group list-group-flush">
        
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        
        {{-- Produk Afiliasi --}}
        <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fas fa-box me-2"></i> Produk Afiliasi
        </a>
        
        {{-- Info Kantor --}}
        <a href="{{ route('admin.info.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('admin.info.*') ? 'active' : '' }}">
            <i class="fas fa-bullhorn me-2"></i> Info Kantor
        </a>
        
        {{-- Karyawan --}}
        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i> Karyawan
        </a>
        
        {{-- Contoh Link Lain --}}
        <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-cog me-2"></i> Pengaturan
        </a>
        
    </div>
</div>