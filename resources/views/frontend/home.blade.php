@extends('layouts.site')
@section('title','Trang chủ')
@section('header')
    <link href="{{asset('public/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">  
    <link href="{{asset('public/owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">  
@endsection
@section('footer')
    <script src="{{asset('public/owlcarousel/owl.carousel.min.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
           
            @foreach ($list_category as $row_category)
                <x-product-home :rowcat="$row_category"/>
            @endforeach
            <div class="col-sm-12 padding-right">

            </div>
        </div>
    </div>
@endsection