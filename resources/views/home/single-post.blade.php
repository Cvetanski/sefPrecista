@extends("layouts.app")
{{--@section('title',$contents->title)--}}
@section('meta')
    @if(isset($contents))
@section('title',$contents->title)
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{Request::url()}}">
    <title>{{$contents->title}}</title>
    <meta property="og:image" content="{{asset("storage/content/")}}/{{$contents->image}}">
    <meta property="og:title" content="{{asset("storage/content/")}}/{{$contents->image}}">

    <meta property="og:description" content="{{ $contents->short_description}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{Request::url()}}">
    <meta property="twitter:title" content={{$contents->title}}>
    <meta property="twitter:image" content="{{asset('/storage/content/'.$contents->image)}}}">

    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="description" content="{{ $contents->short_description}}">
    @else
    <h1>Тука сеуште нема содржина</h1>
    @endif
@endsection

@section('section')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
{{--    <a href="https://www.vecteezy.com/free-vector/ornament-pattern">Ornament Pattern Vectors by Vecteezy</a>--}}


{{--<link href="assets/css/style.css" rel="stylesheet">--}}
<link href="/css/custom.css" rel="stylesheet" type="text/css" >

    <div id="nav">
        @if(isset($contents))
            <div id="main">
                <div class="ex-basic-1 pt-4 single-post-wallpaper">
                    <div class="d-flex justify-content-between align-items-center cover-image-news">
                        <img src="{{asset("storage/content/")}}/{{$contents->image}}" alt="{{$contents->title}}" style="height: 300px; width:100% !important;">
                        <img src="{{asset("storage/content/212.jpg")}}" style="height: 300px; width:100% !important;">
                    </div>
                    <div class="ex-basic-1 pt-4">
                        <div class="container">
                            <div class="row">
                                <div class="social-links mt-3">
                                    <ul class="share-box d-flex">
                                        <li>
                                            <span class="bi-share-fill">Сподели</span>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.precista.org.mk/{{$contents->slug}}" class="bx bxl-facebook">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.precista.org.mk/{{$contents->slug}}" class="bx bxl-twitter"></a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.precista.org.mk/{{$contents->slug}}" class="bi-telephone-fill"></a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.precista.org.mk/{{$contents->slug}}" class="bx bxl-whatsapp"></a>
                                        </li>
                                    </ul>
                                </div>
                                    <div class="col-md-12 col-sm-3 col-lg-9 single-post single-post-font block-image">
                                        <div class="col-xl-10 offset-xl-1">
                                            <h1 style="align-content: center !important; font-size: 37px; color: #cda45e" class="">
                                                <center>{{$contents->title}} </center>
                                            </h1>
                                            <p class="py-2 img-fluid" onclick="show()" id="btnID">
                                                {!! $contents->description !!}
                                            </p>
                                        </div>
                                    </div>
{{--                                <div class="col-sm-3 sidebar-item" id="main">--}}
{{--                                    @foreach($news as $new)--}}
{{--                                        <div class="widget ">--}}
{{--                                            <li>--}}
{{--                                                <img src="{{asset("storage/news/")}}/{{$new->image}}" alt="{{$new->title}}" style="height: 300px; width:100% !important;">--}}
{{--                                                <div>--}}
{{--                                                    <h>{{$new->title}}</h>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
@endsection

@section('script')
    <script>
        function show() {
            /* Get image2 and change value
            of src attribute */
            let image = document.getElementById("image2");

            image.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210915115837/gfg3.png"

            document.getElementById("btnID")
                .style.display = "none";
        }
    </script>

    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
@endsection
