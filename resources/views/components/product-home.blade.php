<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <div class="section-product-category">
        <h2 class="text-center my-5 caterory-title">
            <a href="#">{{ $row_cat->name }}</a>
        </h2>
        {{-- <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach ($product_list as $product)
                    @php
                        $product_image = $product->productimg;
                        $hinh = ' ';
                        if (count($product_image) > 0) {
                            $hinh = $product_image[0]['image'];
                        }
                    @endphp
                    <div class="item">
                        <div class="product-item">
                            <div class="product-iamge">
                                <a href="{{ route('slug.home', ['slug' => $product->slug]) }}">
                                    <img class="img-fluid" src="{{ asset('images/product/' . $hinh) }}"
                                        alt="{{ $hinh }}">
                                </a>
                            </div>
                        </div>
                        <h3 class="product-name">
                            <a href="{{ route('slug.home', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="product-price">
                            <div class="row">
                                <div class="col-md-9">
                                    <strong>
                                        <span class="price">250000</span>-<del>250000</del>
                                    </strong>
                                </div>
                                <div class="col-md-3 text-end">
                                    <a class="cart" href="cart.html">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-sale">-10%</div>
                    </div>
                @endforeach
            </div>
        </div> --}}
        <div class="row">
            <div class="col-3 my-1">
                @foreach ($product_list as $product)
                    @php
                        $product_image = $product->productimg;
                        $hinh = ' ';
                        if (count($product_image) > 0) {
                            $hinh = $product_image[0]['image'];
                        }
                    @endphp
                    <div class="card" style="width: 18rem;">
                        <img style="width:180px;" src="{{ asset('images/product/' . $hinh) }}" alt="{{ $hinh }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h3 class="product-name">
                                <a href="{{ route('slug.home', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="product-price">
                                <div class="row">
                                    <div class="col-md-9">
                                        <strong>
                                            <span
                                                class="price">{{ $product->price_buy }}</span>-<del>{{ $product->price_sale }}</del>
                                        </strong>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <a class="cart" href="cart.html">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </a>

                                        {{-- <a href="cart.html" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart" aria-hidden="true">

                                            </i>Thêm giỏ hàng</a> --}}

                                    </div>
                                </div>
                            </div>
                            <div class="product-sale">-10%</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
