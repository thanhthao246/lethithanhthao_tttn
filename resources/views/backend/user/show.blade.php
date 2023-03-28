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
                <a href="{{route('category.edit', ['category'=>$category->id])}}" class="btn btn-sm btn-primary">
                  <i class="fas fa-edit"></i>Sửa
                </a>
                <a href="{{route('category.delete', ['category'=>$category->id])}}" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash-alt"></i>Xóa
                </a>
                <a href="{{route('category.index')}}" class="btn btn-sm btn-info">
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
              <td>{{$category->id}}</td>
            </tr>
            <tr>
              <td>name</td>
              <td>{{$category->name}}</td>
            </tr>
            <tr>
              <td>slug</td>
              <td>{{$category->slug}}</td>
            </tr>
            <tr>
              <td>parent_id</td>
              <td>{{$category->parent_id}}</td>
            </tr>
            <tr>
              <td>sort_order</td>
              <td>{{$category->sort_order}}</td>
            </tr>
            <tr>
              <td>Id</td>
              <td>{{$category->image}}</td>
            </tr>
            <tr>
              <td>metakey</td>
              <td>{{$category->metakey}}</td>
            </tr>
            <tr>
              <td>metadesc</td>
              <td>{{$category->metadesc}}</td>
            </tr>
            <tr>
              <td>created_by</td>
              <td>{{$category->created_by}}</td>
            </tr>
            <tr>
              <td>update_by</td>
              <td>{{$category->update_by}}</td>
            </tr>
            <tr>
              <td>status</td>
              <td>{{$category->status}}</td>
            </tr>
            <tr>
              <td>created_at</td>
              <td>{{$category->created_at}}</td>
            </tr>
            <tr>
              <td>update_at</td>
              <td>{{$category->update_at}}</td>
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