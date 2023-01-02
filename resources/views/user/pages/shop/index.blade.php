@extends('user.layouts.app')

@section('title', 'Shop')

@section('style')

	<link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nouislider/nouislider.min.css') }}">

@endsection

@section('content')

    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Shop Category</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section-margin--small mb-5">
        <div class="container">
            <div class="row">
                @include('user.pages.shop.sidebar')

                <div class="col-xl-9 col-lg-8 col-md-7">
                    @include('user.pages.shop.filter')
                    
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <a href="{{ route('product') }}">
                                            <img class="card-img" src="{{ asset('frontend/img/product/product1.png') }}" alt="">
                                        </a>
                                        <ul class="card-product__imgOverlay">
                                            <li><button><i class="ti-search"></i></button></li>
                                            <li><button><i class="ti-shopping-cart"></i></button></li>
                                            <li><button><i class="ti-heart"></i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>Accessories</p>
                                        <h4 class="card-product__title">
                                            <a href="{{ route('product') }}">Quartz Belt Watch</a>
                                        </h4>
                                        <p class="card-product__price">$150.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section class="related-product-area">
		<div class="container">
			<div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Top <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row mt-30">
                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="{{ route('product') }}">
                                <img src="{{ asset('frontend/img/product/product-sm-4.png') }}" alt="">
                            </a>
                            <div class="desc">
                                <a href="{{ route('product') }}" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>

    @include('user.partials.subscribe')

@endsection

@section('js')

    <script src="{{ asset('frontend/vendors/nouislider/nouislider.min.js') }}"></script>

@endsection