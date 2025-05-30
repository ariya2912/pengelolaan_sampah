<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('adminlte/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Pengelolaan Sampah</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>Laporan Sampah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setoran.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p>Setoran Bank Sampah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengangkutan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Layanan Pengangkutan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
