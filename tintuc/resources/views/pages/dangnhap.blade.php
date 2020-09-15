@extends('master')

@section('content')
    @include('component.header')
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-nav-area">
                            <h1 class="text-white">Đăng nhập</h1>
                            <p class="text-white link-nav"><a href="">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="dang-nhap">Đăng nhập</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12 post-list">
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="comment-form">
                                <h4 class="text-center">Đăng nhập</h4>
                                <form method="post" action="dang-nhap">
                                    {{csrf_field()}}

                                    <div class="row">
                                        <div class="form-group col-lg-6 offset-3">
                                            <input type="email" class="form-control" name="email" placeholder="Nhập email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập email'"/>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 offset-3">
                                            <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập mật khẩu'"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="primary-btn text-uppercase">Đăng nhập</button>

                                    <p class="m-5">Bạn chưa có tài khoản? <a href="dang-ky"> Đăng ký</a></p>
                                </form>
                                @if(Session::has('error'))
                                    <script>
                                        Swal.fire({
                                            title: 'Lỗi!',
                                            text: 'Email hoặc mật khẩu không chính xác',
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        })
                                    </script>
                                @endif
                            </div>
                        </div>
                        <!-- End single-post Area -->
                    </div>
                </div>
            </div>
        </section>
    @include('component.footer')
@endsection