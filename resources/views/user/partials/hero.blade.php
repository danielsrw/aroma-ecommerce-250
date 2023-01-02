<section class="hero-banner">
    <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
            <div class="col-5 d-none d-sm-block">
                <div class="hero-banner__img">
                    <img class="img-fluid" src="{{ asset('frontend/img/home/hero-banner.png') }}" alt="">
                </div>
            </div>
            <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                <div class="hero-banner__content">
                    <h4>Shop is fun</h4>
                    <h1>Browse Our Premium Product</h1>
                    <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
                    <a class="button button-hero" href="{{ route('shop') }}">Browse Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-margin mt-0">
    <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel__slide">
            <img src="{{ asset('frontend/img/home/hero-slide1.png') }}" alt="" class="img-fluid">
            <a href="{{ route('shop') }}" class="hero-carousel__slideOverlay">
                <h3>Wireless Headphone</h3>
                <p>Accessories Item</p>
            </a>
        </div>
        <div class="hero-carousel__slide">
            <img src="{{ asset('frontend/img/home/hero-slide2.png') }}" alt="" class="img-fluid">
            <a href="{{ route('shop') }}" class="hero-carousel__slideOverlay">
                <h3>Wireless Headphone</h3>
                <p>Accessories Item</p>
            </a>
        </div>
        <div class="hero-carousel__slide">
            <img src="{{ asset('frontend/img/home/hero-slide3.png') }}" alt="" class="img-fluid">
            <a href="{{ route('shop') }}" class="hero-carousel__slideOverlay">
                <h3>Wireless Headphone</h3>
                <p>Accessories Item</p>
            </a>
        </div>
    </div>
  </section>