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
                            <h1 class="text-white">{{$post->TieuDe}}</h1>
                            <p class="text-white link-nav"><a href="index.html">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span><a href="#">{{$post->Ten}} </a><span class="lnr lnr-arrow-right"></span><a href="image-post.html">{{$post->TieuDe}}</a></p>
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
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid pp" src="{{asset('upload/tintuc/'.$post->Hinh)}}" alt="">
                                <style>
                                    img.pp{
                                        height: 300px;
                                    }
                                </style>
                            </div>
                            <div class="content-wrap">
                                <ul class="tags mt-10">
                                    <li><a href="loai-tin/{{$post->TenKhongDau}}">{{$post->Ten}}</a></li>
                                </ul>
                                <a href="#">
                                    <h3>{{$post->TieuDe}}</h3>
                                </a>
                                <ul class="meta pb-20">
                                    <li><a href="#"><span class="lnr lnr-eye"></span>{{$post->SoLuotXem}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
                                </ul>

                                <div>
                                    {!! $post->NoiDung !!}
                                </div>

                                <div class="comment-sec-area">
                                    <div class="container">
                                        <div class="row flex-column">
                                            <h6>{{count($comment)}} Bình luận</h6>
                                            @foreach($comment as $cmt)
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">

                                                            <div class="desc">
                                                                <h5><a href="#">{{$cmt->name}}</a></h5>
                                                                <p class="date">{{$cmt->created_at}}</p>
                                                                <p class="comment">
                                                                    {{$cmt->NoiDung}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        @if( Auth::check() && Auth::user()->id == $cmt->idUser)
                                                            <div class="reply-btn">
                                                                <a href="xoa-comment/{{$cmt->id}}" class="btn-reply text-uppercase">xóa</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Session::has('error'))
                                <script>
                                    Swal.fire({
                                        title: 'Lỗi!',
                                        text: 'Bạn phải đăng nhập để bình luận',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    })
                                </script>
                            @endif
                            <div class="comment-form">
                                <h4>Bình Luận</h4>
                                <form method="post" action="comment">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <textarea class="form-control mb-10" rows="5" name="comment" placeholder="Nội dung" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                        <input type="hidden" value="{{$post->TieuDeKhongDau}}" name="slug">
                                    </div>
                                    <button type="submit" class="primary-btn text-uppercase">Bình luận</button>
                                </form>
                            </div>
                        </div>
                        <!-- End single-post Area -->
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