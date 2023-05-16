@extends('layouts.site')
@section('title', 'tim kiem')
@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="section-product-category">
                    <h2 class="text-center category-title">Tìm kiếm</h2>
                    <div class="col-9">
                        <p class="pull-left">Đã tìm thấy {{ count($product) }} sản phẩm</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row text-center">
                        @foreach ($product as $product)
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
                </div>
            </div>
        </div>
    </div>
@endsection
