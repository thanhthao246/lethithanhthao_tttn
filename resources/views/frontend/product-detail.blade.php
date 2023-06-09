@extends('layouts.site')
@section('title', $product->name)
@section('content')
    @php
        $product_image = $product->productimg;
        $hinh = ' ';
        if (count($product_image) > 0) {
            $hinh = $product_image[0]['image'];
        }
    @endphp
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="hinhlon">
                    <img class="img-fluid w-100" src="{{ asset('images/product/' . $hinh) }}" alt="{{ $hinh }}">
                </div>
                @if (count($product_image) > 1)
                    <div class="row">
                        @for ($i = 1; $i < count($product_image) - 1; $i++)
                            @php
                                $hinh = $product_image[$i]['image'];
                            @endphp
                            <div class="col-md-3">
                                <img class="img-fluid w-100" src="{{ asset('images/product/' . $hinh) }}"
                                    alt="{{ $hinh }}">
                            </div>
                        @endfor
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h3>{{ $product->name }}</h3>
                <h4>Giá:{{ number_format($product->price_buy) }} vnđ</h4>
            </div>
            <label>Số lượng:</label>
            <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="1">
            <button type="button" class="btn btn-fefault cart">
                <i class="fa fa-shopping-cart"></i>
                Thêm vào giỏ hàng
            </button>
            <div class="my-4">
                <h3>Chi tiết sản phẩm</h3>
                <p>{!! $product->detail !!}</p>
            </div>

        </div>
        @if (count($product_list) > 0)
            <div class="my-4">
                <h3>Sản phẩm cùng loại</h3>
                <div class="row">
                    @foreach ($product_list as $row_pro)
                        @php
                            $product_image = $row_pro->productimg;
                            $hinh = ' ';
                            if (count($product_image) > 0) {
                                $hinh = $product_image[0]['image'];
                            }
                        @endphp
                        <div class="col-md-3 mb-4">
                            <div class="product-item">
                                <div class="product-iamge ">
                                    <a href="{{ route('slug.home', ['slug' => $row_pro->slug]) }}">
                                        <img class="img-fluid "style: width="200px"
                                            src="{{ asset('images/product/' . $hinh) }}" alt="{{ $hinh }}">
                                    </a>
                                </div>
                            </div>
                            <h3 class="product-name">
                                <a href="{{ route('slug.home', ['slug' => $row_pro->slug]) }}">{{ $row_pro->name }}</a>
                            </h3>
                            <div class="product-price">
                                <div class="row">
                                    <div class="col-md-9">
                                        <strong>
                                            <span class="price">{{ $row_pro->price_buy }} VNĐ</span>
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
        @endif
    </div>
@endsection
