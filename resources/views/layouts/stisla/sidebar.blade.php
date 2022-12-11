<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><p>BPS <br>Kota Malang</p></a>
        </div>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray;width:75%"> <br>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BPS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Manajemen</li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'barang' ? 'active' : '' }}">
                <a href="{{ route('barang.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Barang</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'service' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('service.index') }}"><i class="fas fa-wrench"></i> <span>Service</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(2) === 'ruang' ? 'active' : '' }}">
                <a href="{{ route('ruang.index') }}" class="nav-link"><i class="fas fa-th"></i> <span>Data Ruangan</span></a>
            </li>
            @can('admin')
            <li class="nav-item dropdown {{ Request::segment(2) === 'user' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-user"></i> <span>Tambah Admin</span></a>
            </li>
            @endcan
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-warning btn-lg btn-block btn-icon-split" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>
</div>