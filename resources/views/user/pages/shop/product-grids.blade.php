@extends('user.layouts.app')

@section('title', 'Shop')

@section('style')

	<link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nouislider/nouislider.min.css') }}">

    <style>
        .pagination{
            display:inline-flex;
        }
        .filter_button{
            /* height:20px; */
            text-align: center;
            background:#F7941D;
            padding:8px 16px;
            margin-top:10px;
            color: white;
        }
    </style>

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


    <form action="{{route('shop.filter')}}" method="POST">
        @csrf
        <section class="section-margin--small mb-5">
            <div class="container">
                <div class="row">
                    @include('user.pages.shop.sidebar')

                    <div class="col-xl-9 col-lg-8 col-md-7">
                        @include('user.pages.shop.filter')

                        <section class="lattest-product-area pb-40 category-list">
                            <div class="row">
                                @if(count($products)>0)
                                    @foreach($products as $product)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="card text-center card-product">
                                                <div class="card-product__img">
                                                    <a href="{{ route('product-detail',$product->slug) }}">
                                                        @php
                                                            $photo=explode(',',$product->photo);
                                                        @endphp
                                                        <img class="card-img" src="{{ $photo[0]}} }}" alt="{{ $photo[0]}} }}">
                                                    </a>
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
                                                            <a href="{{ route('add-to-wishlist',$product->slug) }}" data-id="{{$product->id}}">
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
                                                        <a href="{{ route('product-detail',$product->slug) }}">
                                                            {{ $product->title }}
                                                        </a>
                                                    </h4>
                                                    <p class="card-product__price">
                                                        @php
                                                            $after_discount=($product->price-($product->price*$product->discount)/100);
                                                        @endphp
                                                        ${{ number_format($after_discount, 2) }}
                                                        <del>
                                                            {{ number_format($product->price, 2) }}
                                                        </del>
                                                        <sup>
                                                            @if($product->discount)
                                                                <span class="price-dec">{{$product->discount}} % Off</span>
                                                            @endif
                                                        </sup>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h4 class="text-primary" style="margin:100px auto;">There are no products.</h4>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12 justify-content-center d-flex">
                                    {{$products->appends($_GET)->links()}}
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </form>


    <section class="related-product-area">
		<div class="container">
			<div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Recent <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row mt-30">
                @foreach($recent_products as $product)
                    @php
                        $photo=explode(',',$product->photo);
                    @endphp
                    <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                        <div class="single-search-product-wrapper">
                            <div class="single-search-product d-flex">
                                <a href="{{ route('product-detail',$product->slug) }}">
                                    <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                </a>
                                <div class="desc">
                                    <a href="{{ route('product-detail',$product->slug) }}" class="title">
                                        {{ $product->title }}
                                    </a>
                                    @php
                                        $org=($product->price-($product->price*$product->discount)/100);
                                    @endphp
                                    <div class="price">
                                        <del class="text-muted">${{ number_format($product->price, 2) }}</del>
                                        ${{ number_format($org, 2) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
		</div>
	</section>

    @include('user.partials.subscribe')

@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{ asset('frontend/vendors/nouislider/nouislider.min.js') }}"></script>

    <script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#price-range").length > 0) {
            const max_value = parseInt( $("#price-range").data('max') ) || 500;
            const min_value = parseInt($("#price-range").data('min')) || 0;
            const currency = $("#price-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }

            let price = price_range.split('-');
            $("#price-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#price-range").data('currency') || '';
            $("#amount").val(m_currency + $("#price-range").slider("values", 0) +
                "  -  "+m_currency + $("#price-range").slider("values", 1));
            }
        })
    </script>

@endsection
