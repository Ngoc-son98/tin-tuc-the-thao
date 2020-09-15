<div class="site-main-container">
<!-- Start top-post Area -->
<section class="top-post-area pt-10">
    <div class="container no-padding">
        <div class="row small-gutters">
            <div class="col-lg-8 top-post-left">
                <div class="feature-image-thumb relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid p0" src="{{asset('upload/tintuc/'.$toppost[0]->Hinh)}}" alt="">
                    <style>
                        img.p0{
                            height: 442px;
                        }
                    </style>
                </div>
                <div class="top-post-details">
                    <ul class="tags">
                        <li><a href="loai-tin/{{$toppost[0]->TenKhongDau}}">{{$toppost[0]->Ten}}</a></li>
                    </ul>
                    <a href="chi-tiet/{{$toppost[0]->TieuDeKhongDau}}">
                        <h3>{{$toppost[0]->TieuDe}}</h3>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-eye"></span>{{$toppost[0]->SoLuotXem}}</a></li>
                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
{{--                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 top-post-right">
                <div class="single-top-post">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid p1" src="{{asset('upload/tintuc/'.$toppost[1]->Hinh)}}" alt="">
                        <style>
                            img.p1{
                                height: 216px;
                            }
                        </style>
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li><a href="loai-tin/{{$toppost[1]->TenKhongDau}}">{{$toppost[1]->Ten}}</a></li>
                        </ul>
                        <a href="chi-tiet/{{$toppost[1]->TieuDeKhongDau}}">
                            <h4>{{$toppost[1]->TieuDe}}</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-eye"></span>{{$toppost[1]->SoLuotXem}}</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
                            {{--                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="single-top-post mt-10">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid p1" src="{{asset('upload/tintuc/'.$toppost[2]->Hinh)}}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li><a href="loai-tin/{{$toppost[2]->TenKhongDau}}">{{$toppost[2]->Ten}}</a></li>
                        </ul>
                        <a href="chi-tiet/{{$toppost[2]->TieuDeKhongDau}}">
                            <h4>{{$toppost[2]->TieuDe}}</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-eye"></span>{{$toppost[2]->SoLuotXem}}</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>19/02/2020</a></li>
                            {{--                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="news-tracker-wrap">
{{--                    <h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>--}}
                </div>
            </div>
        </div>
    </div>
</section>