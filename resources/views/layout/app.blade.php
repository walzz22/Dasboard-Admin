<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard Biru Android</title>
    {{-- Memuat Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Memuat Font Awesome (Ikon) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #F8F9FA; }
        
        /* Warna Primer (Biru Android #2196F3) */
        .bg-primary, .btn-primary, .badge-primary { background-color: #2196F3 !important; border-color: #2196F3 !important; }
        .btn-primary:hover, .btn-primary:focus { background-color: #1565C0 !important; border-color: #1565C0 !important; }
        .text-primary { color: #2196F3 !important; }

        /* Style Sidebar (Putih Bersih dengan Shadow) */
        #sidebar-wrapper { 
            background-color: #FFFFFF !important; 
            color: #343A40;
            min-height: 100vh; 
            width: 250px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1); 
        }
        /* Style Link di Sidebar */
        #sidebar-wrapper .list-group-item-action { color: #555; background-color: transparent !important; }
        .list-group-item-action.active {
            background-color: #E3F2FD !important; /* Biru Sangat Pucat */
            color: #2196F3 !important; /* Teks Biru Cerah */
            border-left: 4px solid #2196F3; 
        }

        /* Style Topbar dan Kartu */
        .navbar { background-color: #FFFFFF !important; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); }
        .card { border-radius: 12px; border: none; box-shadow: 0 0 15px rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body>

    <div class="d-flex" id="wrapper">
        
        {{-- MEMUAT SIDEBAR DARI FILE PARTIALS --}}
        @include('layout.partials.sidebar') 

        <div id="page-content-wrapper" class="flex-grow-1">
            
            {{-- MEMUAT TOPBAR DARI FILE PARTIALS --}}
            @include('layout.partials.topbar') 

            <div class="container-fluid py-4">
                @yield('content') {{-- INI ADALAH TEMPAT KONTEN DINAMIS (DASHBOARD, PRODUK, DLL.) MASUK --}}
            </div>
        </div>
    </div>

    {{-- Memuat JavaScript Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>