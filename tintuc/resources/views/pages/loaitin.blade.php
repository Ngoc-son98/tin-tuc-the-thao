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
                            <h1 class="text-white">{{$loaitin->Ten}}</h1>
                            <p class="text-white link-nav"><a href="">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span><a href="loai-tin/{{$loaitin->TenKhongDau}}">{{$loaitin->Ten}}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="news-tracker-wrap">
{{--                            <h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>--}}
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
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">Tin mới</h4>
                            @foreach($listnew as $post)
                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid p2" src="{{asset('upload/tintuc/'.$post->Hinh)}}" alt="">
                                            <style>
                                                img.p2{
                                                    height: 200px;
                                                }
                                            </style>
                                        </div>
                                        <ul class="tags">
                                            <li><a href="loai-tin/{{$post->TenKhongDau}}">{{$post->Ten}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7 post-right">
                                        <a href="chi-tiet/{{$post->TieuDeKhongDau}}">
                                            <h4>{{$post->TieuDe}}</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-eye"></span>{{$post->SoLuotXem}}</a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
                                        </ul>
                                        <p class="excert">
                                            {!!$post->TomTat!!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="load-more">
                                {{$listnew->links()}}
                            </div>

                        </div>
                        <!-- End latest-post Area -->
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebars-area">
                            <div class="single-sidebar-widget editors-pick-widget">
                                <h6 class="title">Lựa chọn của biên tập viên</h6>
                                <div class="editors-pick-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="{{asset('upload/tintuc/'.$highlightpost[0]->Hinh)}}" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="loai-tin/{{$highlightpost[0]->TenKhongDau}}">{{$highlightpost[0]->Ten}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="chi-tiet/{{$highlightpost[0]->TieuDeKhongDau}}">
                                            <h4 class="mt-20">{{$highlightpost[0]->TieuDe}}</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
                                            <li><a href="#"><span class="lnr lnr-eye"></span>{{$highlightpost[0]->SoLuotXem}}</a></li>
                                        </ul>
                                        <p class="excert">
                                            {!!$highlightpost[0]->TomTat!!}
                                        </p>
                                    </div>
                                    <div class="post-lists">

                                        @foreach($highlightpost as $post)
                                            <div class="single-post d-flex flex-row">
                                                <div class="thumb">
                                                    <img class="img-fluid p3" src="{{asset('upload/tintuc/'.$post->Hinh)}}" alt="">
                                                    <style>
                                                        img.p3 {
                                                            height: 100px;
                                                            width: 100px;
                                                        }
                                                    </style>
                                                </div>
                                                <div class="detail">
                                                    <a href="chi-tiet/{{$post->TieuDeKhongDau}}">
                                                        <h6>{{$post->TieuDe}}</h6>
                                                    </a>
                                                    <ul class="meta">
                                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
                                                        <li><a href="#"><span class="lnr lnr-eye"></span>{{$post->SoLuotXem}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="single-sidebar-widget most-popular-widget">
                                <h6 class="title">Tin phổ biến</h6>

                                @foreach($popularpost as $post)
                                    <div class="single-list flex-row d-flex">
                                        <div class="thumb">
                                            <img class="img-fluid p3" src="{{asset('upload/tintuc/'.$post->Hinh)}}" alt="">
                                        </div>
                                        <div class="details">
                                            <a href="chi-tiet/{{$post->TieuDeKhongDau}}">
                                                <h6>{{$post->TieuDe}}</h6>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
                                                <li><a href="#"><span class="lnr lnr-eye"></span>{{$post->SoLuotXem}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="single-sidebar-widget social-network-widget">
                                <h6 class="title">Social Networks</h6>
                                <ul class="social-list">
                                    <li class="d-flex justify-content-between align-items-center fb">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <p>983 Likes</p>
                                        </div>
                                        <a href="#">Like our page</a>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center tw">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                            <p>983 Followers</p>
                                        </div>
                                        <a href="#">Follow Us</a>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center yt">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                            <p>983 Subscriber</p>
                                        </div>
                                        <a href="#">Subscribe</a>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center rs">
                                        <div class="icons d-flex flex-row align-items-center">
                                            <i class="fa fa-rss" aria-hidden="true"></i>
                                            <p>983 Subscribe</p>
                                        </div>
                                        <a href="#">Subscribe</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>

    @include('component.footer')
@endsection