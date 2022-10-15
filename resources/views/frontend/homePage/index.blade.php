@extends('frontend.layouts.master')
@section('title', 'Home Page')
@section('addCss')
    <link rel="stylesheet" href="{{ asset('assets/css/homePage.css') }}">
@endsection
@section('content')
    <div class="main">
        <section class="intro">
            <div class="circles">
                <div class="point animated-point-1"></div>
                <div class="point animated-point-2"></div>
                <div class="point animated-point-3"></div>
                <div class="point animated-point-4"></div>
                <div class="point animated-point-5"></div>
                <div class="point animated-point-6"></div>
                <div class="point animated-point-7"></div>
                <div class="point animated-point-8"></div>
                <div class="point animated-point-9"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="content">
                            <h1 class="title">We are Connect Plus </h1>
                            <p class="lead">Thiết kế website chuyên nghiệp nâng tầm thương hiệu.</p>

                            <a href="#" class="link">Liên hệ với chúng tôi</a>
                        </div>
                    </div>
                    <div class="col"><img class="img" src="{{ asset('/assets/svg/SEO-pana.svg') }}"
                            alt="seo img" /></div>
                </div>
            </div>

        </section>
        <section class="ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8">
                        <div class="section-heading text-center mb-5">
                            <h2 class="font-h2">Kho mẫu giao diện website</h2>
                            <p class="lead">
                                Hơn 2000 mẫu giao diện Việt Hóa trên nhiều lĩnh vực cập nhật mỗi ngày cho bạn lựa chọn.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="home-sample__category">
                    <div class="row-1">
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="0.15s"
                            style="visibility: visible; animation-delay: 0.15s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/doanh-nghiep/bat-dong-san/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/bat-dong-san.png"
                                        class="attachment-full size-full lazyloaded" alt="Bat Dong San"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/bat-dong-san.png"
                                            class="attachment-full size-full" alt="Bat Dong San" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/doanh-nghiep/bat-dong-san/"
                                        target="_blank">Bất động sản</a>
                                </h3>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="0.45s"
                            style="visibility: visible; animation-delay: 0.45s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/ban-hang/xe-hoi-the-thao/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/oto.png"
                                        class="attachment-full size-full lazyloaded" alt="Oto"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/oto.png"
                                            class="attachment-full size-full" alt="Oto" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/ban-hang/xe-hoi-the-thao/"
                                        target="_blank">Xe cộ</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="0.6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/tin-tuc/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/tin-tuc.png"
                                        class="attachment-full size-full lazyloaded" alt="Tin Tuc"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/tin-tuc.png"
                                            class="attachment-full size-full" alt="Tin Tuc" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/tin-tuc/" target="_blank">Tin tức</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="0.75s"
                            style="visibility: visible; animation-delay: 0.75s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/ban-hang/thuc-pham-thuoc/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/nha-hang.png"
                                        class="attachment-full size-full lazyloaded" alt="Nha Hang"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/nha-hang.png"
                                            class="attachment-full size-full" alt="Nha Hang" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/ban-hang/thuc-pham-thuoc/"
                                        target="_blank">Nhà hàng</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="0.9s"
                            style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/doanh-nghiep/kien-truc-noi-that/"
                                    target="_blank" class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/noi-that.png"
                                        class="attachment-full size-full lazyloaded" alt="Noi That"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/noi-that.png"
                                            class="attachment-full size-full" alt="Noi That" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/doanh-nghiep/kien-truc-noi-that/"
                                        target="_blank">Nội thất</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="1.05s"
                            style="visibility: visible; animation-delay: 1.05s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/ban-hang/my-pham-lam-dep/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/lam-dep.png"
                                        class="attachment-full size-full lazyloaded" alt="Lam Dep"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/lam-dep.png"
                                            class="attachment-full size-full" alt="Lam Dep" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/ban-hang/my-pham-lam-dep/"
                                        target="_blank">Làm đẹp</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="1.2s"
                            style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/doanh-nghiep/du-lich-khach-san/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/du-lich.png"
                                        class="attachment-full size-full lazyloaded" alt="Du Lich"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/du-lich.png"
                                            class="attachment-full size-full" alt="Du Lich" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/doanh-nghiep/du-lich-khach-san/"
                                        target="_blank">Du lịch</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="1.35s"
                            style="visibility: visible; animation-delay: 1.35s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/doanh-nghiep/giao-duc-khoa-hoc/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/giao-duc.png"
                                        class="attachment-full size-full lazyloaded" alt="Giao Duc"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/giao-duc.png"
                                            class="attachment-full size-full" alt="Giao Duc" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/doanh-nghiep/giao-duc-khoa-hoc/"
                                        target="_blank">Giáo dục</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="1.5s"
                            style="visibility: visible; animation-delay: 1.5s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/doanh-nghiep/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/doanh-nghiep.png"
                                        class="attachment-full size-full lazyloaded" alt="Doanh Nghiep"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/doanh-nghiep.png"
                                            class="attachment-full size-full" alt="Doanh Nghiep" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/doanh-nghiep/" target="_blank">Doanh
                                        nghiệp</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="1.65s"
                            style="visibility: visible; animation-delay: 1.65s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/ban-hang/cong-nghe-do-dien/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/cong-nghe.png"
                                        class="attachment-full size-full lazyloaded" alt="Cong Nghe"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/cong-nghe.png"
                                            class="attachment-full size-full" alt="Cong Nghe" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/ban-hang/cong-nghe-do-dien/"
                                        target="_blank">Công nghệ</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2 home-sample__category-count wow fadeInUp" data-wow-delay="1.8s"
                            style="visibility: visible; animation-delay: 1.8s; animation-name: fadeInUp;">
                            <div class="home-sample__category-item">
                                <a href="https://themes.hazomedia.com/theme/ban-hang/" target="_blank"
                                    class="img-block img-1-1">
                                    <img width="170" height="170"
                                        src="https://hazomedia.com.vn/wp-content/uploads/2022/01/ban-hang.png"
                                        class="attachment-full size-full lazyloaded" alt="Ban Hang"
                                        data-ll-status="loaded"><noscript><img width="170" height="170"
                                            src="https://hazomedia.com.vn/wp-content/uploads/2022/01/ban-hang.png"
                                            class="attachment-full size-full" alt="Ban Hang" /></noscript> </a>
                                <h3 class="item__title text-center font-h3"><a
                                        href="https://themes.hazomedia.com/theme/ban-hang/" target="_blank">Bán hàng</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ptb-100 gray-light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-8">
                        <div class="section-heading text-center mb-5">
                            <h2 class="font-h2">Dịch vụ thiết kế website</h2>
                            <p class="lead">
                                Nắm bắt được nhu cầu thiết kế website ngày càng tăng nhanh của khách hàng, Thiết kế web
                                ConnectPlus đã ra đời. Với sự hiểu biết cùng kinh nghiệm lâu năm về lĩnh vực Marketing,
                                ConnectPlus đã giúp hàng ngàn khách hàng của mình có được trang web hoạt động hiệu quả, tăng
                                doanh số bán hàng.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row-2 equal">
                    <div class="col-md-3 col-lg-3">
                        <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-4 h-100">
                            <div class="circle-icon">
                                <div class="icon-interface"></div>
                            </div>
                            <h5 class="font-h5">Giao diện</h5>
                            <p>Giao diện đẹp mắt, thiết kế rất chuyên nghiệp và khoa học, đảm bảo uy tín nhất.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-4 h-100">
                            <div class="circle-icon">
                                <div class="icon-domain"></div>
                            </div>
                            <h5 class="font-h5">Tên miền</h5>
                            <p>Hỗ trợ tên miền quốc gia Việt Nam và tên miền Quốc tế đăng ký thông tin đầy đủ.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-4 h-100">
                            <div class="circle-icon">
                                <div class="icon-seo"></div>

                            </div>
                            <h5 class="font-h5">Seo từ khóa lên top google</h5>
                            <p>Giúp thu hút hàng trăm, hàng nghìn lượt khách truy cập trên công cụ tiềm kiếm google
                                mỗi ngày.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="single-promo single-promo-hover single-promo-1 rounded text-center white-bg p-4 h-100">
                            <div class="circle-icon">
                                <div class="icon-hosting"></div>

                            </div>
                            <h5 class="font-h5">Hosting/VPS giá siêu rẻ</h5>
                            <p>Chuyên cung cấp các gói hosting và VPS khủng giá siêu rẻ, có nhiều ưu đãi lớn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div style="height:500px"></div>
    </div>

@endsection
@section('addJs')
    <script src="{{ asset('assets/js/homepage.js') }}"></script>
@endsection
