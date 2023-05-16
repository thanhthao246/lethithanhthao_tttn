@extends('layouts.site')
@section('title','tat ca san pham')
@section('header')
    <link href="{{ asset('public/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection
@section('footer')
    <script src="{{ asset('public/owlcarousel/owl.carousel.min.js') }}"></script>
@endsection
@section('content')
@foreach ($product_list as $item)
    {{$item->name}}
    //mới có tên sản phẩm
    
@endforeach
@endsection
