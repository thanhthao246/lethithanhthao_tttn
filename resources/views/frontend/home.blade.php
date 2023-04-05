@extends('layouts.site')
@section('title','Trang chủ')
@section('content')
    

    <div class="container">
        <div class="row">
            {{-- <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Tất cả Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Sportswear
                                    </a>
                                </h4>
                            </div>
                            <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Nike </a></li>
                                        <li><a href="#">Under Armour </a></li>
                                        <li><a href="#">Adidas </a></li>
                                        <li><a href="#">Puma</a></li>
                                        <li><a href="#">ASICS </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Mens
                                    </a>
                                </h4>
                            </div>
                            <div id="mens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Fendi</a></li>
                                        <li><a href="#">Guess</a></li>
                                        <li><a href="#">Valentino</a></li>
                                        <li><a href="#">Dior</a></li>
                                        <li><a href="#">Versace</a></li>
                                        <li><a href="#">Armani</a></li>
                                        <li><a href="#">Prada</a></li>
                                        <li><a href="#">Dolce and Gabbana</a></li>
                                        <li><a href="#">Chanel</a></li>
                                        <li><a href="#">Gucci</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Womens
                                    </a>
                                </h4>
                            </div>
                            <div id="womens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Fendi</a></li>
                                        <li><a href="#">Guess</a></li>
                                        <li><a href="#">Valentino</a></li>
                                        <li><a href="#">Dior</a></li>
                                        <li><a href="#">Versace</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Kids</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Fashion</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Households</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Interiors</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Clothing</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Bags</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Shoes</a></h4>
                            </div>
                        </div>
                    </div><!--/category-products-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>Thương hiệu</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    
                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->
                    
                    <div class="shipping text-center">
                        <img src="{{asset('public/images/home/shipping.jpg')}}" alt="" />
                    </div>
                </div>
            </div> --}}
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
                
                <div class="recommended_items"><!--recommended_items-->
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
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
@endsection