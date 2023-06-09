@extends('layouts.site')
@section('title', 'tat ca san pham')
@section('header')
    <link href="{{ asset('public/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection
@section('footer')
    <script src="{{ asset('public/owlcarousel/owl.carousel.min.js') }}"></script>
@endsection
@section('content')
    <div class="row text-center">
        @foreach ($product_list as $item)
            @php
                $product_image = $product->productimg;
                $hinh = null;
                if (count($product_image) > 0) {
                    $hinh = $product_image[0]['image'];
                }
                
            @endphp
            <div class="item col-md-6 mb-6">
                <div class="product-item">
                    <div class="product-image">
                        <a href="{{ route('slug.home', ['slug' => $product->slug]) }}">
                            <img class="img-fluid w-100" src="{{ asset('images/product/' . $hinh) }}"
                                alt="{{ $hinh }}" />
                        </a>
                    </div>
                    <h5 class="product-name">
                        <a href="{{ route('slug.home', ['slug' => $product->slug]) }}">
                            {{ $product->name }}
                        </a>
                    </h5>
                    <div class="product-price">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <strong>
                                    <span class="price">{{ number_format($product->price_buy) }} VND</span>
                                    <del>{{ $product->price_sale }}</del>
                                </strong>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="cart.html" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">
                                    </i>Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
