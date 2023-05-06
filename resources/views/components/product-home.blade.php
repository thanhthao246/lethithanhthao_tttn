<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <div class="section-product-category">
        <h2 class="text-center my-5 caterory-title">
            <a href="{{ route('slug.home', ['slug' => $row_cat->slug]) }}">{{ $row_cat->name }}</a>
        </h2>
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
                                    <span class="price">{{ number_format($product->price_buy) }}vnđ</span>
                                </strong>
                            </div>
                            <div class="col-ms-2 text-center"><br>
                                <a href="{{route('gio-hang.AddCart',['id'=>$product->id])}}" class="btn btn-default add-to-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">Thêm giỏ hàng</i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
