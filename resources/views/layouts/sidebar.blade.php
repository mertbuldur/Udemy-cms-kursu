<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{ route('admin.index') }}">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="assets/static/images/logo.png" alt=""></div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">{{Auth::user()->name}}</h5></div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active"><a class="sidebar-link" href="index.html"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>

            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Slider</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.slider.index') }}">Slider Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.slider.create') }}">Yeni Slider Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Servisler</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.services.index') }}">Servis Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.services.create') }}">Yeni Servis Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Blog Kategori</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.blogcategory.index') }}">Blog Kategori Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.blogcategory.create') }}">Yeni Blog Kategori Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Blog</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.blog.index') }}">Blog  Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.blog.create') }}">Yeni Blog  Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Yorumlar</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.comment.index') }}">Yorumlar  Listesi</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Bülten</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.newsletter.index') }}">Bülten  Listesi</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Sayfalar</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.page.index') }}">Sayfa  Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.page.create') }}">Yeni Sayfa  Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Projeler</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.project.index') }}">Proje  Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.project.create') }}">Yeni Proje  Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Takım</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.team.index') }}">Takım  Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.team.create') }}">Yeni Takım  Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Referans</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.referans.index') }}">Referans  Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.referans.create') }}">Yeni Referans  Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Dil</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                    <li><a class="sidebar-link" href="{{ route('admin.language.index') }}">Dil  Listesi</a></li>
                    <li><a class="sidebar-link" href="{{ route('admin.language.create') }}">Yeni Dil  Ekle</a></li>
                </ul>
            </li>
            <li class="nav-item mT-30 "><a class="sidebar-link" href="{{ route('admin.setting.index') }}"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Site Ayarları</span></a></li>


        </ul>
    </div>
</div>
