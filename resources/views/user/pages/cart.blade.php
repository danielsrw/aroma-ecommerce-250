@extends('user.layouts.app')

@section('title', 'About Us')

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
                    <h1>Shopping Cart</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('frontend/img/cart/cart1.png') }}" alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <p>Minimalistic shop for multipurpose use</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>$360.00</h5>
                                            </td>
                                            <td>
                                                <div class="product_count">
                                                    <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>$720.00</h5>
                                            </td>
                                        </tr>
                                        <tr class="bottom_button">
                                            <td>
                                                <a class="button" href="#">Update Cart</a>
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <div class="cupon_text d-flex align-items-center">
                                                    <input type="text" placeholder="Coupon Code">
                                                    <a class="primary-btn" href="#">Apply</a>
                                                    <a class="button" href="#">Have a Coupon?</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <h5>Subtotal</h5>
                                            </td>
                                            <td>
                                                <h5>$2160.00</h5>
                                            </td>
                                        </tr>
                                        <tr class="shipping_area">
                                            <td class="d-none d-md-block">

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <h5>Shipping</h5>
                                            </td>
                                            <td>
                                                <div class="shipping_box">
                                                    <ul class="list">
                                                        <li><a href="#">Flat Rate: $5.00</a></li>
                                                        <li><a href="#">Free Shipping</a></li>
                                                        <li><a href="#">Flat Rate: $10.00</a></li>
                                                        <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                                    </ul>
                                                    <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                                    <select class="shipping_select">
                                                        <option value="1">Nyarugenge</option>
                                                        <option value="2">Kicukiro</option>
                                                        <option value="4">Gasabo</option>
                                                    </select>
                                                    <select class="shipping_select">
                                                        <option value="1">Nyamirambo</option>
                                                        <option value="2">Remera</option>
                                                        <option value="4">Kanombe</option>
                                                    </select>
                                                    <input type="text" placeholder="Postcode/Zipcode">
                                                    <a class="gray_btn" href="#">Update Details</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="out_button_area">
                                            <td class="d-none-l">

                                            </td>
                                            <td class="">

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <div class="checkout_btn_inner d-flex align-items-center">
                                                    <a class="gray_btn" href="{{ route('product-grids') }}">Continue Shopping</a>
                                                    <a class="primary-btn ml-2" href="{{ route('checkout') }}">Proceed to checkout</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center">
                                            There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a>

                                        </td>
                                    </tr>
                                @endif
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
