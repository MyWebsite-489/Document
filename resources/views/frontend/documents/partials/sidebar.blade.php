<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link" alt="">
        <img src="{{ asset('assets/images/header/logo.png') }}" alt="" class="brand-image img-circle"
            style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php
                    $dashboard = ['admin.dashboard'];
                @endphp
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ \App\Helpers\Common::setActive($dashboard) }}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @php
                    $subMenuHomePage = ['admin.sliders.index', 'admin.contact.index'];
                @endphp
                <li class="nav-item has-treeview {{ \App\Helpers\Common::setTreeViewOpen($subMenuHomePage) }}">
                    <a href="" class="nav-link {{ \App\Helpers\Common::setActive($subMenuHomePage) }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Quản lý trang chủ<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @php
                            $nameSliders = ['admin.sliders.index'];
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('admin.sliders.index') }}"
                                class="nav-link {{ \App\Helpers\Common::setActive($nameSliders) }}">
                                <i class="nav-icon fa fa-image"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        @php
                            $nameContact = ['admin.contact.index'];
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('admin.contact.index') }}"
                                class="nav-link {{ \App\Helpers\Common::setActive($nameContact) }}">
                                <i class="nav-icon fa fa-envelope-o"></i>
                                <p>Khách hàng liên hệ</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $subMenuPost = ['admin.topic.index', 'admin.post.posts', 'admin.post.create', 'admin.post.edit'];
                @endphp
                <li class="nav-item has-treeview {{ \App\Helpers\Common::setTreeViewOpen($subMenuPost) }}">
                    <a href="" class="nav-link {{ \App\Helpers\Common::setActive($subMenuPost) }}">
                        <i class="nav-icon fa fa-pencil-square-o"></i>
                        <p>Quản lý bài viết<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @php
                            $nameTopic = ['admin.topic.index'];
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('admin.topic.index') }}"
                                class="nav-link {{ \App\Helpers\Common::setActive($nameTopic) }}">
                                <i class="fa fa-th-list nav-icon"></i>
                                <p>Chủ đề</p>
                            </a>
                        </li>
                        @php
                            $namePost = ['admin.post.posts', 'admin.post.create', 'admin.post.edit'];
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('admin.post.posts') }}"
                                class="nav-link {{ \App\Helpers\Common::setActive($namePost) }}">
                                <i class="fa fa-clipboard nav-icon"></i>
                                <p>Bài viết</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link ">
                                <i class="fa fa-tags nav-icon"></i>
                                <p>Hashtag</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
