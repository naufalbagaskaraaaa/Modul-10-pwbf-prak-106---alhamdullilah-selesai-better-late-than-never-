<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">RSHP</span>
        </a>
    </div>
    
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false" id="navigation">
                
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard-admin') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Master Data
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.jenis-hewan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Jenis Hewan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.ras-hewan.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ras Hewan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pet.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Pet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kategori.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kategori-klinis.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori Klinis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tindakan Terapi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pemilik.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Pemilik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Data Role</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">TRANSAKSI</li>
                
                <li class="nav-item">
                    <a href="{{ route('admin.transaksi.rekam') }}" class="nav-link">
                        <i class="nav-icon bi bi-file-medical"></i> <p>Rekam Medis</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.transaksi.temu') }}" class="nav-link">
                        <i class="nav-icon bi bi-calendar-check"></i> <p>Temu Dokter</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>