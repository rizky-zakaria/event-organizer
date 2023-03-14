<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li><a><i class="fa fa-edit"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('event.index') }}">Event</a></li>
                    <li><a href="{{ route('kategori.index') }}">Kategori Event</a></li>
                    <li><a href="{{ route('peserta') }}">Peserta</a></li>
                    <li><a href="{{ route('sponsor') }}">Sponsor</a></li>
                    <li><a href="{{ route('pengunjung') }}">Pengunjung</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('pengguna.index') }}">
                    <i class="fa fa-user"></i> Petugas
                </a>
            </li>
            <li>
                <a href="{{ route('berita.index') }}">
                    <i class="fa fa-newspaper-o"></i> Berita
                </a>
            </li>
            <li>
                <a href="{{ route('slide-show.index') }}">
                    <i class="fa fa-picture-o"></i> Slide Show
                </a>
            </li>
            <li>
                <a href="{{ route('kontak.index') }}">
                    <i class="fa fa-phone"></i> Kontak
                </a>
            </li>
        </ul>
    </div>
</div>
