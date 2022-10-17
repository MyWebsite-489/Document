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
{{--                @php--}}
{{--                    $dashboard = ['admin.dashboard'];--}}
{{--                @endphp--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.dashboard') }}"--}}
{{--                        class="nav-link {{ \App\Helpers\Common::setActive($dashboard) }}">--}}
{{--                        <i class="nav-icon fa fa-dashboard"></i>--}}
{{--                        <p>Dashboard</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                @php
                    $subMenuHomePage = ['document.index'];
                @endphp
                @foreach($topics as $topic)
                    <li class="nav-item has-treeview {{ \App\Helpers\Common::setTreeViewOpen($subMenuHomePage) }}">
                        <a href="" class="nav-link {{ \App\Helpers\Common::setActive($subMenuHomePage) }}">
                            <i class="nav-icon fa fa-home"></i>
                            <p>{{ $topic->name }}<i class="right fa fa-angle-left"></i></p>
                        </a>
                        @foreach($topic->postChidDocument as $post)
                            <ul class="nav nav-treeview">
                                @php
                                    $namePost = ['document.index'];
                                @endphp
                                <li class="nav-item">
                                    <a href="{{ route('document.index',  ['id' => $post->id]) }}"
                                       class="nav-link {{ \App\Helpers\Common::setActive($namePost) }}">
                                        <i class="nav-icon fa fa-arrow-right"></i>
                                        <p>{{ $post->name }}</p>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
