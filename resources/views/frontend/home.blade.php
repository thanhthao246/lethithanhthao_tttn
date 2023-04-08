@extends('layouts.site')
@section('title','Trang chủ')
@section('header')
    <link href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">  
    <link href="{{asset('owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">  
@endsection
@section('footer')
    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
@endsection

@section('content')
    

    <div class="container">
        <div class="row">
           
            @foreach ($list_category as $row_category)
                <x-product-home :rowcat="$row_category"/>
            @endforeach
            <div class="col-sm-12 padding-right">
            <!--sản phẩm bán chạy -->
                

                <!--end-->
                <div class="category-tab"><!--category-tab-->
                    <h2 class="title text-center">Sản phẩm nhập khẩu</h2>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('public/images/home/sanpham2.jpg')}}" alt="" />
                                    <h2>145,000đ</h2>
                                    <p>Dâu tây Bạch tuyết</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>145,000đ</h2>
                                        <p>Dâu tây Bạch tuyết</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('public/images/home/sanpham2.jpg')}}" alt="" />
                                    <h2>145,000đ</h2>
                                    <p>Dâu tây Bạch tuyết</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>145,000đ</h2>
                                        <p>Dâu tây Bạch tuyết</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('public/images/home/sanpham2.jpg')}}" alt="" />
                                    <h2>145,000đ</h2>
                                    <p>Dâu tây Bạch tuyết</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>145,000đ</h2>
                                        <p>Dâu tây Bạch tuyết</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('public/images/home/sanpham2.jpg')}}" alt="" />
                                    <h2>145,000đ</h2>
                                    <p>Dâu tây Bạch tuyết</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>145,000đ</h2>
                                        <p>Dâu tây Bạch tuyết</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="recommended_items">
                    <h2 class="title text-center">Sản phẩm được đề xuất</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/images/home/sanpham3.jpg')}}" alt="" />
                                                <h2>2,450,000</h2>
                                                <p>Nho mẫu đơn Shine Muscat</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vô giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/images/home/sanpham3.jpg')}}" alt="" />
                                                <h2>2,450,000</h2>
                                                <p>Nho mẫu đơn Shine Muscat</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vô giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/images/home/sanpham3.jpg')}}" alt="" />
                                                <h2>2,450,000</h2>
                                                <p>Nho mẫu đơn Shine Muscat</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vô giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/images/home/sanpham3.jpg')}}" alt="" />
                                                <h2>2,450,000</h2>
                                                <p>Nho mẫu đơn Shine Muscat</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vô giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/images/home/sanpham3.jpg')}}" alt="" />
                                                <h2>2,450,000</h2>
                                                <p>Nho mẫu đơn Shine Muscat</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vô giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/images/home/sanpham3.jpg')}}" alt="" />
                                                <h2>2,450,000</h2>
                                                <p>Nho mẫu đơn Shine Muscat</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vô giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection