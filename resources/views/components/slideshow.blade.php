<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel"> 
                    <div class="carousel-inner">
                        @foreach ($list_slider as $row_slider)
                            @if ($loop->first)
                            <div class="item active">
                                <div class="col-sm-12">
                                    <img src="{{ asset('images/slider/'.$row_slider->image)}}" class="d-block w-100" alt="{{$row_slider->image}}" />
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="col-sm-12">
                                    <img src="{{ asset('images/slider/'.$row_slider->image)}}" class="d-block w-100" alt="{{$row_slider->image}}" />
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <div class="item">
                            <div class="col-sm-12">
                                <img src="{{ asset('public/images/home/slider12.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>