<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="menu-mb">
                    <i class="fa fa-bars icon-bar"></i>
                    <div class="mean-menu-mb">
                        <div class="close-mb-menu">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="mean-menu-wrap">
                            <ul>
                                <li class="menu-mb-lv1">
                                    <a href="{{ route('homePage.index') }}" class="">TRANG CHỦ</a>
                                </li>
                                <li class="menu-mb-lv1">
                                    <a href="{{ route('newslist.index') }}" class="">TIN TỨC</a>
                                </li>
                                <li class="menu-mb-lv1">
                                    <a href="{{ route('document.index', ['id' => 0]) }}" class="">TÀI LIỆU</a>
                                </li>
                                <li class="menu-mb-lv1">
                                    <a href="#box-contact" class="scroll-box-contact">LIÊN HỆ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="main-menu">
                    <div class="menu-header">
                        <ul class="menu-wrap">
                            <li class="menu-lv1">
                                <a href="{{ route('homePage.index') }}" class="">TRANG CHỦ</a>
                            </li>
                            <li class="menu-lv1">
                                <a href="{{ route('newslist.index') }}" class="">TIN TỨC</a>
                            </li>
                            <li class="menu-lv1">
                                <a href="{{ route('document.index', ['id' => 0]) }}" class="">TÀI LIỆU</a>
                            </li>
                            <li class="menu-lv1">
                                <a href="#" class="contact-box">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
