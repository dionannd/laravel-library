<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <span class="label label-success">{{ ucfirst(Auth::user()->username) }}</span>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li class="{{ set_active('home') }}">
                <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview {{ set_active(['buku.index', 'kategori.index', 'kategori.create', 'anggota.index']) }}">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Kelola Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ set_active(['kategori.index', 'kategori.create']) }}"><a href="{{ route('kategori.index') }}"><i class="fa fa-book"></i> Data Kategori</a></li>
                    <li class="{{ set_active('buku.index') }}"><a href="{{ route('buku.index') }}"><i class="fa fa-book"></i> Data Buku</a></li>
                    <li class="{{ set_active('anggota.index') }}"><a href="{{ route('anggota.index') }}"><i class="fa fa-group"></i> Data Anggota</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-refresh"></i> <span>Sirkulasi</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Log Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-clock-o"></i> Peminjaman</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i> Pengembalian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-print"></i>
                    <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Buku</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Anggota</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Peminjaman</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Pengembalian</a></li>
                </ul>
            </li>
            <li class="header">PENGATURAN</li>
            <li class="treeview {{ set_active(['role.index', 'user.index', 'user.role_permission']) }}">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Kelola Akun</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ set_active('role.index') }}"><a href="{{ route('role.index') }}"><i class="fa fa-cog"></i> Role</a></li>
                    <li class="{{ set_active('user.role_permission') }}"><a href="{{ route('user.role_permission') }}"><i class="fa fa-cog"></i> Role Permission</a></li>
                    <li class="{{ set_active('user.index') }}"><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> Akun Pengguna</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>