@extends('layouts.site')
@section('title', $row_brand->name)
@section('header')
    <link href="{{ asset('public/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection
@section('footer')
    <script src="{{ asset('public/owlcarousel/owl.carousel.min.js') }}"></script>
@endsection
@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-3">
                <x-Category-list />
                <x-Band-list />
            </div>
            <div class="col-md-9">
                <div class="section-product-category">
                    <h2 class="text-center my-3 caterory-title">
                        {{ $row_brand->name }}
                    </h2>
                    <div class="row">
                        <div class="owl-carousel owl-them">
                            @foreach ($product_list as $product)
                                @php
                                    $product_image = $product->productimg;
                                    $hinh = ' ';
                                    if (count($product_image) > 0) {
                                        $hinh = $product_image[0]['image'];
                                    }
                                @endphp
                                <div class="col-md-4">
                                    <div class="product-item">
                                        <div class="product-iamge ">
                                            <a href="{{ route('slug.home', ['slug' => $product->slug]) }}">
                                                <img class="img-fluid w-100" src="{{ asset('images/product/' . $hinh) }}"
                                                    alt="{{ $hinh }}">
                                            </a>
                                        </div>
                                    </div>
                                    <h3 class="product-name">
                                        <a
                                            href="{{ route('slug.home', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <strong>
                                                    <span class="price">{{ number_format($product->price_buy) }}</span>
                                                </strong>
                                            </div>
                                            <div class="col-ms-2 text-center"><br>
                                                <a href="cart.html" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true">Thêm giỏ hàng</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>{{ $product_list->Links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
