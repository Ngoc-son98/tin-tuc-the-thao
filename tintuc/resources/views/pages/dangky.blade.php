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
                            <h1 class="text-white">Đăng ký</h1>
                            <p class="text-white link-nav"><a href="">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="dang-ky">Đăng nhập</a></p>
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
                                <h4 class="text-center">Đăng ký</h4>
                                <form method="post" action="dang-ky">
                                    {{csrf_field()}}

                                    <div class="row">
                                        <div class="form-group col-lg-6 offset-3">
                                            <input type="text" class="form-control" name="name" placeholder="Nhập họ tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập họ tên'"/>
                                        </div>

                                        <div class="error text-danger" id="name_error">
                                            @if($errors->has('name'))
                                                <i>*
                                                    {{$errors->get('name')[0]}}
                                                </i>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 offset-3">
                                            <input type="email" class="form-control" name="email" placeholder="Nhập email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập email'"/>
                                        </div>

                                        <div class="error text-danger" id="username_error">
                                            @if($errors->has('email'))
                                                <i>*
                                                    {{$errors->get('email')[0]}}
                                                </i>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 offset-3">
                                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập mật khẩu'"/>
                                        </div>

                                        <div class="error text-danger" id="password_error">
                                            @if($errors->has('password'))
                                                <i>*
                                                    {{$errors->get('password')[0]}}
                                                </i>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6 offset-3">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập lại mật khẩu'"/>
                                        </div>

                                        <div class="error text-danger" id="re_password_error">
                                            @if($errors->has('password_confirmation'))
                                                <i>*
                                                    {{$errors->get('password_confirmation')[0]}}
                                                </i>
                                            @endif
                                        </div>
                                    </div>


                                    <button type="submit" class="primary-btn text-uppercase">Đăng ký</button>
                                    <p class="m-5">Bạn đã có tài khoản? <a href="dang-nhap"> Đăng nhập</a></p>
                                </form>
                                @if(Session::has('message'))
                                    <script>
                                        Swal.fire({
                                            title: 'Thông báo',
                                            text: 'Đăng ký thành công',
                                            icon: 'success',
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