@extends('layouts.admin')
@section('title','tất cả danh mục sản phẩm')
@section('conten')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TẤT CẢ SẢN PHẨM</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></a></li>
              <li class="breadcrumb-item active">Tất cả sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <button class="btn-sm btn-danger" type="submit">
                Xóa
              </button>
            </div>
              <div class="col-md-6 text-right">
                <a href="{{route('product.index')}}" class="btn btn-sm btn-info">
                  <i class="fas fa-reply"></i>Quay về danh sách
                </a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message_alert')
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width:20px;" class="text-center">#</th>
                <th style="width:90px;" class="text-center">Hình ảnh</th>
                <th>tên danh mục</th>
                <th>slug</th>
                <th style="width:160px;" class="text-center">Ngày đăng</th>
                <th style="width:170px;" class="text-center">Chức năng</th>
                <th style="width:20px;" class="text-center">Id</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list_product as $product)
                   
              <tr>
                <td class="text-center">
                  <input type="checkbox">
                </td>
                <td>
                  <img class="img-fluid" src="{{asset('images/product/'.$product->image)}}" alt="{{$product->image}}">
                </td>
                <td>{{$product->name}}</td>
                <td>{{$product->slug}}</td>
                <td class="text-center">{{$product->created_at}}</td>
                <td class="text-center">
                  <a href="{{ route('product.restore', ['product'=>$product->id])}}" class="ntn btn-sm btn-success">
                    <i class="fas fa-redo"></i>
                  </a>
                  <a href="{{ route('product.destroy', ['product'=>$product->id])}}" class="ntn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
                <td class="text-center">{{$product->id}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
         
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection