<footer id="footer" class="site-footer vertical-scrolling fp-auto-height">
    <div class="box-contact text-center" id="box-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="box-info__title text-align_left">CONNECT PLUS</h2>
                    <div class="box-contact-form text-align_left">
                        <div class="box-info__contact">
                            Theo dõi chúng tôi để cập nhập thông tin mới nhất về chương trình khuyến mãi và sản phẩm
                            chất lượng. Xin chân thành cảm ơn quý khách!
                        </div>
                        <div class="box-info__contact">
                            <i class="fa fa-facebook-square brand-color"></i> Facebook: Connect Plus
                        </div>
                        <div class="box-info__contact">
                            <i class="fa fa-instagram brand-color"></i> Instagram: _ConnectPlus_
                        </div>
                        <div class="box-info__contact">
                            <i class="fa fa-phone brand-color"></i> Hotline: 0987654321
                        </div>
                        <div class="box-info__contact">
                            <i class="fa fa-envelope-o brand-color"></i> Email: connectplus@gmail.com
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="box-info__title">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                    <div class="box-contact-form">
                        <form action="{{ route('homePage.createContact') }}" method="POST" id="createContact">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="fullname" placeholder="Họ tên của bạn"
                                        value="{{ old('fullname') }}">
                                    @error('fullname')
                                        <small class="form-text text-muted mt-0 mb-2">{{ $message }}</small>
                                    @enderror
                                    <input type="text" name="phone" placeholder="Số điện thoại liên hệ"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <small class="form-text text-muted mt-0 mb-2">{{ $message }}</small>
                                    @enderror
                                    <input type="text" name="email" placeholder="Email liên hệ"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <small class="form-text text-muted mt-0 mb-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="box-contact-right">
                                        <textarea name="content" placeholder="Nội dung...">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="footer-bt-send" type="submit">
                                Gửi <i class="fa fa-send-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="box-copyright">

        <div class="box-copyright-wrap">
            <div>Copyrights © 2021 by Connect Plus</div>
        </div>

    </div>
</footer>
