@extends('user.layouts.app')

@section('title', 'Home')

@section('content')

    @include('user.partials.hero')

    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Hot <span class="section-intro__style">Item</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                @foreach($product_lists as $product)
                    @if($product->condition=='hot')
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                @php 
                                    $photo=explode(',', $product->photo);
                                @endphp
                                <img class="img-fluid" src="{{ $photo[0] }}" alt="">
                                <ul class="card-product__imgOverlay">
                                    <li>
                                        <button>
                                            <i class="ti-search"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <a href="{{ route('add-to-cart',$product->slug) }}">
                                            <button>
                                                <i class="ti-shopping-cart"></i>
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add-to-wishlist',$product->slug) }}">
                                            <button>
                                                <i class="ti-heart"></i>
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <p>Accessories</p>
                                <h4 class="card-product__title">
                                    <a href="{{ route('product-detail', $product->slug) }}">
                                        {{ $product->title }}
                                    </a>
                                </h4>
                                <p class="card-product__price">${{ number_format($product->price,2) }}</p>
                                @php 
                                    $after_discount=($product->price-($product->price*$product->discount)/100)
                                @endphp
                                <p><del>${{ number_format($after_discount,2) }}</del></p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
        <div class="container">
            @if($featured)
                @foreach($featured as $data)
                    <div class="row">
                        @php 
                            $photo=explode(',',$data->photo);
                        @endphp
                        <div class="col-xl-4">
                            <div class="offer__content text-center">
                                <img class="card-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="offer__content text-center">
                                <h3>{{ $data->discount }}% Off</h3>
                                <h4>{{ $data->cat_info['title'] }}</h4>
                                <p>{{ $data->title }}</p>
                                <a class="button button--active mt-3 mt-xl-4" href="{{ route('product-detail', $data->slug) }}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Latest <span class="section-intro__style">Items</span></h2>
            </div>
            <div class="row">
                @php
                    $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                @endphp
                @foreach($product_lists as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                @php 
                                    $photo=explode(',',$product->photo);
                                @endphp
                                <img class="card-img" src="{{ $photo[0] }}" alt="{{ $photo[0] }}">
                                <ul class="card-product__imgOverlay">
                                    <li>
                                        <button>
                                            <i class="ti-search"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <a href="{{ route('add-to-cart',$product->slug) }}">
                                            <button>
                                                <i class="ti-shopping-cart"></i>
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <button>
                                            <i class="ti-heart"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <p>Accessories</p>
                                <h4 class="card-product__title">
                                    <a href="{{ $product->title }}">Quartz Belt Watch</a>
                                </h4>
                                <p class="card-product__price">${{ number_format($product->discount,2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Latest <span class="section-intro__style">News</span></h2>
            </div>
    
            <div class="row">
                @if($posts)
                    @foreach($posts as $post)
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="card card-blog">
                                <div class="card-blog__img">
                                    <img class="card-img rounded-0" src="{{ $post->photo }}" alt="">
                                </div>
                                <div class="card-body">
                                    <ul class="card-blog__info">
                                        <li><a href="#">By Admin</a></li>
                                        <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                                        <li><a href="#">{{ $post->created_at->format('d M , Y. D') }}</a></li>
                                    </ul>
                                    <h4 class="card-blog__title">
                                        <a href="{{ route('blog.detail',$post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h4>
                                    <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
                                    <a class="card-blog__link" href="{{ route('blog.detail',$post->slug) }}">
                                        Read More <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    @include('user.partials.subscribe')

@endsection