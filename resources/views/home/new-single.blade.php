@extends('layouts.app')

@section('section')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    @if(isset($news))
        <main id="main">
{{--            <section class="breadcrumbs">--}}
{{--                <div class="container cover-image2-news">--}}
{{--                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                        <img src="{{asset('storage/cover_news/')}}/{{$news->cover_image}}" alt="{{$news->title}}" style="height: 250px; width:100% !important;">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--            <section class="cover-image2-news">--}}
{{--                --}}{{--                <div class="container cover-image2-news">--}}
{{--                <div class="d-flex justify-content-between align-items-center">--}}
{{--                    <img src="{{asset('storage/cover_news/')}}/{{$news->cover_image}}" alt="{{$news->title}}" style="height: 250px; width:100% !important;">--}}
{{--                </div>--}}
{{--                --}}{{--                </div>--}}
{{--            </section>--}}
            <div class="ex-basic-1 pt-4">
                <div class="d-flex justify-content-between align-items-center cover-image-news">
                    <img src="{{asset('storage/cover_news/')}}/{{$news->cover_image}}" alt="{{$news->title}}" style="height: 350px; width:100% !important;">
                </div>
                <div class="container">
                    <div class="row single-post">
                        <div class="col-xl-10 offset-xl-1">
                            <h1 style="align-content: center !important;">
                                <center>{{$news->title}} </center>
                            </h1>
                            <p class="py-2">
{{--                            {{ preg_replace('/(<.*?>)|(&.*?;)/', '', $news->description) }}--}}
                                {!! $news->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif

@endsection

@section('script')
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

@endsection







