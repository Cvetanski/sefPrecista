@extends('layouts.app')
@section('title','Свештена Пречистанска Обител')
@section('section')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- ======= Hero Section ======= -->

{{--<section id="hero">--}}
    <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            @foreach ($sliders as $slider )
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="transition: color">
                    <img src="{{asset('storage/slider/')}}/{{$slider->photo}}" alt="{{$slider->title}}" style="width: 100%;height: 100%">
                </div>
            @endforeach
        </div>
        <ol class="carousel-indicators">
            @foreach ($sliders as $slider )
                <li data-target="#carousel-1" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

            @endforeach
        </ol>
    </div>
{{--</section>--}}
        </div>
    </div>

{{--    </div>--}}
{{--    <div class="row text-center">--}}
{{--        <div class="col">--}}
{{--            <div class="counter">--}}
{{--                <i class="fa fa-code fa-2x"></i>--}}
{{--                <h2 class="timer count-title count-number" data-to="705" data-speed="2000"></h2>--}}
{{--                <p class="count-text ">Години Постоење</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- ======= Events Section ======= -->
    @if(isset($news))
    <section id="events" class="events">

        <div class="container background-color"  data-aos="fade-up">

            <div class="section-title">
                <h2>Новости</h2>
                <p>Новости во православниот свет</p>
            </div>

            <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach($news as $new)
                        <div class="swiper-slide">
                            <div class="row event-item">
                                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="about-img">
                                        <a href="{{route('novosti-news',$new->slug) }}" onclick="routeToManastir()">
                                        <img src="{{asset('storage/news/')}}/{{$new->image}}" alt="{{$new->title}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 content">
                                        <h3>{{$new->title}}</h3>
                                    <p class="fst-italic">
{{--                                        {{(preg_replace($new->short_description))}}--}}
{{--                                        {{ preg_replace('/(<.*?>)|(&.*?;)/', '', $new->short_description) }}--}}
                                        {!! $new->short_description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Events Section -->
    @endif
<main id="main">

    <!-- ======= About Section ======= -->
{{--    <section id="about" class="about">--}}
{{--        <div class="container" data-aos="fade-up">--}}

{{--            <div class="row">--}}
{{--                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                    <div class="about-img">--}}
{{--                        <img src="assets/img/about.jpg" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">--}}
{{--                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>--}}
{{--                    <p class="fst-italic">--}}
{{--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore--}}
{{--                        magna aliqua.--}}
{{--                    </p>--}}
{{--                    <ul>--}}
{{--                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>--}}
{{--                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>--}}
{{--                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>--}}
{{--                    </ul>--}}
{{--                    <p>--}}
{{--                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate--}}
{{--                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in--}}
{{--                        culpa qui officia deserunt mollit anim id est laborum--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section><!-- End About Section -->--}}

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Тест Содржина</h2>
                <p>Тест Содржина</p>
            </div>

            <div class="row">

                <div class="col-lg-4">
                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                        <span>01</span>
                        <h4>Lorem Ipsum</h4>
                        <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box" data-aos="zoom-in" data-aos-delay="200">
                        <span>02</span>
                        <h4>Repellat Nihil</h4>
                        <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                        <span>03</span>
                        <h4> Ad ad velit qui</h4>
                        <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Testimonials Section ======= -->
{{--    <section id="testimonials" class="testimonials section-bg">--}}
{{--        <div class="container" data-aos="fade-up">--}}

{{--            <div class="section-title">--}}
{{--                <h2>Testimonials</h2>--}}
{{--                <p>What they're saying about us</p>--}}
{{--            </div>--}}

{{--            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">--}}
{{--                <div class="swiper-wrapper">--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="testimonial-item">--}}
{{--                            <p>--}}
{{--                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.--}}
{{--                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                            </p>--}}
{{--                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">--}}
{{--                            <h3>Saul Goodman</h3>--}}
{{--                            <h4>Ceo &amp; Founder</h4>--}}
{{--                        </div>--}}
{{--                    </div><!-- End testimonial item -->--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="testimonial-item">--}}
{{--                            <p>--}}
{{--                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.--}}
{{--                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                            </p>--}}
{{--                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">--}}
{{--                            <h3>Sara Wilsson</h3>--}}
{{--                            <h4>Designer</h4>--}}
{{--                        </div>--}}
{{--                    </div><!-- End testimonial item -->--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="testimonial-item">--}}
{{--                            <p>--}}
{{--                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.--}}
{{--                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                            </p>--}}
{{--                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">--}}
{{--                            <h3>Jena Karlis</h3>--}}
{{--                            <h4>Store Owner</h4>--}}
{{--                        </div>--}}
{{--                    </div><!-- End testimonial item -->--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="testimonial-item">--}}
{{--                            <p>--}}
{{--                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.--}}
{{--                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                            </p>--}}
{{--                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">--}}
{{--                            <h3>Matt Brandon</h3>--}}
{{--                            <h4>Freelancer</h4>--}}
{{--                        </div>--}}
{{--                    </div><!-- End testimonial item -->--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="testimonial-item">--}}
{{--                            <p>--}}
{{--                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.--}}
{{--                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                            </p>--}}
{{--                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">--}}
{{--                            <h3>John Larson</h3>--}}
{{--                            <h4>Entrepreneur</h4>--}}
{{--                        </div>--}}
{{--                    </div><!-- End testimonial item -->--}}

{{--                </div>--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section><!-- End Testimonials Section -->--}}

    <!-- ======= Gallery Section ======= -->
    @if(($images))
    <section id="gallery" class="gallery" style="background-color: #1a1814  !important;">

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Галерија</h2>
                <p>Медија на Света Пречиста Богородица</p>
            </div>
        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">
                @foreach($images as $image)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{asset('storage/photogallery/')}}/{{$image->image}}" class="gallery-lightbox" data-gall="gallery-item">
{{--                            <img src="{{asset('storage/news/')}}/{{$new->image2}}" alt="{{$new->title}}">--}}
                            <img src="{{asset('storage/photogallery/')}}/{{$image->image}}" alt="{{$image->title}}" class="img-fluid">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Gallery Section -->
    @endif

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Контакт и Локација</h2>
                <p>Контакт и Локација</p>
            </div>
        </div>

        <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d747.5166593483453!2d20.935198229211572!3d41.4594700037601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1351373321524fe7%3A0xfc477650d5f87fef!2sImmaculate%20Holy%20Mother%20of%20God!5e0!3m2!1sen!2smk!4v1643756741831!5m2!1sen!2smk" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

{{--            <div class="row mt-5">--}}

{{--                <div class="col-lg-4">--}}
{{--                    <div class="info">--}}
{{--                        <div class="address">--}}
{{--                            <i class="bi bi-geo-alt"></i>--}}
{{--                            <h4>Локација:</h4>--}}
{{--                            <p>Кичево</p>--}}
{{--                        </div>--}}

{{--                        <div class="email">--}}
{{--                            <i class="bi bi-envelope"></i>--}}
{{--                            <h4>Е-пошта:</h4>--}}
{{--                            <p>svprecista@gmail.com</p>--}}
{{--                        </div>--}}

{{--                        <div class="phone">--}}
{{--                            <i class="bi bi-phone"></i>--}}
{{--                            <h4>Телефон:</h4>--}}
{{--                            <p>+38978843520</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

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
                <script>

                    (function ($) {
                        $.fn.countTo = function (options) {
                            options = options || {};

                            return $(this).each(function () {
                                // set options for current element
                                var settings = $.extend({}, $.fn.countTo.defaults, {
                                    from:            $(this).data('from'),
                                    to:              $(this).data('to'),
                                    speed:           $(this).data('speed'),
                                    refreshInterval: $(this).data('refresh-interval'),
                                    decimals:        $(this).data('decimals')
                                }, options);

                                // how many times to update the value, and how much to increment the value on each update
                                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                                    increment = (settings.to - settings.from) / loops;

                                // references & variables that will change with each update
                                var self = this,
                                    $self = $(this),
                                    loopCount = 0,
                                    value = settings.from,
                                    data = $self.data('countTo') || {};

                                $self.data('countTo', data);

                                // if an existing interval can be found, clear it first
                                if (data.interval) {
                                    clearInterval(data.interval);
                                }
                                data.interval = setInterval(updateTimer, settings.refreshInterval);

                                // initialize the element with the starting value
                                render(value);

                                function updateTimer() {
                                    value += increment;
                                    loopCount++;

                                    render(value);

                                    if (typeof(settings.onUpdate) == 'function') {
                                        settings.onUpdate.call(self, value);
                                    }

                                    if (loopCount >= loops) {
                                        // remove the interval
                                        $self.removeData('countTo');
                                        clearInterval(data.interval);
                                        value = settings.to;

                                        if (typeof(settings.onComplete) == 'function') {
                                            settings.onComplete.call(self, value);
                                        }
                                    }
                                }

                                function render(value) {
                                    var formattedValue = settings.formatter.call(self, value, settings);
                                    $self.html(formattedValue);
                                }
                            });
                        };

                        $.fn.countTo.defaults = {
                            from: 0,               // the number the element should start at
                            to: 0,                 // the number the element should end at
                            speed: 500,           // how long it should take to count between the target numbers
                            refreshInterval: 100,  // how often the element should be updated
                            decimals: 0,           // the number of decimal places to show
                            formatter: formatter,  // handler for formatting the value before rendering
                            onUpdate: null,        // callback method for every time the element is updated
                            onComplete: null       // callback method for when the element finishes updating
                        };

                        function formatter(value, settings) {
                            return value.toFixed(settings.decimals);
                        }
                    }(jQuery));

                    jQuery(function ($) {
                        // custom formatting example
                        $('.count-number').data('countToOptions', {
                            formatter: function (value, options) {
                                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                            }
                        });

                        // start all the timers
                        $('.timer').each(count);

                        function count(options) {
                            var $this = $(this);
                            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                            $this.countTo(options);
                        }
                    });
                </script>
@endsection
