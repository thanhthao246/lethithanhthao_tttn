<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <div class="section-product-category">
        <h2 class="text-center my-5 caterory-title">
            <a href="#">{{$row_cat->name}}</a>
        </h2>
         <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach ($product_list as $product)
                    <div class="item">
                        <div class="product-item">
                            <div class="product-iamge">
                                <a href="product-detail.html">
                                    <img class="img-fluid" src="{{asset('images/home/sanpham1.jpg')}}" alt="heheh">
                                </a>
                            </div>
                        </div>
                        <h3 class="product-name">
                            <a href="product-detail.html">{{$product->name}} - {{$product->id}}</a>
                        </h3>
                        <div class="product-price">
                            <div class="row">
                                <div class="col-md-9">
                                    <strong>
                                        <span class="price">250000</span><del>250000</del>
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
                    {{-- <div class="features_items">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('public/images/home/sanpham1.jpg')}}" alt="" />
                                        <h2>145,000đ</h2>
                                        <p>Dâu tây Nhật bản</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>145,000đ</h2>
                                            <p>Dâu tây Nhật bản</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     --}}
                @endforeach
            </div>
         </div>
    </div>
</div>