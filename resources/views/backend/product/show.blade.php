@extends('layouts.admin')
@section('title','Chi tiết danh mục sản phẩm')
@section('conten')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CHI TIẾT DANH MỤC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Chi tiết danh mục</li>
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
            <div class="col-md-6"></div>
              <div class="col-md-6 text-right">
                <a href="{{route('product.edit', ['product'=>$product->id])}}" class="btn btn-sm btn-primary">
                  <i class="fas fa-edit"></i>Sửa
                </a>
                <a href="{{route('product.delete', ['product'=>$product->id])}}" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash-alt"></i>Xóa
                </a>
                <a href="{{route('product.index')}}" class="btn btn-sm btn-info">
                  <i class="fas fa-reply"></i>Quay về danh sách
                </a>
              </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Tên trường</th>
              <th>Giá trị</th>
            </tr>
            <tr>
              <td>Id</td>
              <td>{{$product->id}}</td>
            </tr>
            <tr>
              <td>name</td>
              <td>{{$product->name}}</td>
            </tr>
            <tr>
              <td>slug</td>
              <td>{{$product->slug}}</td>
            </tr>
            <tr>
              <td>parent_id</td>
              <td>{{$product->parent_id}}</td>
            </tr>
            <tr>
              <td>sort_order</td>
              <td>{{$product->sort_order}}</td>
            </tr>
            <tr>
              <td>Id</td>
              <td>{{$product->image}}</td>
            </tr>
            <tr>
              <td>metakey</td>
              <td>{{$product->metakey}}</td>
            </tr>
            <tr>
              <td>metadesc</td>
              <td>{{$product->metadesc}}</td>
            </tr>
            <tr>
              <td>created_by</td>
              <td>{{$product->created_by}}</td>
            </tr>
            <tr>
              <td>update_by</td>
              <td>{{$product->update_by}}</td>
            </tr>
            <tr>
              <td>status</td>
              <td>{{$product->status}}</td>
            </tr>
            <tr>
              <td>created_at</td>
              <td>{{$product->created_at}}</td>
            </tr>
            <tr>
              <td>update_at</td>
              <td>{{$product->update_at}}</td>
          </tr>
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