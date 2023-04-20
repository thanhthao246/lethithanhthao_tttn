@extends('layouts.admin')
@section('title','Thêm danh mục sản phẩm')
@section('conten')

<form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÊM THƯƠNG HIỆU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thêm thương hiệu</li>
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
                <button type="submit" class="btn btn-sm btn-success">
                  <i class="fas fa-save"></i>Lưu
                </button>
                <a href="{{route('category.index')}}" class="btn btn-sm btn-info">
                  <i class="fas fa-reply"></i>Quay về danh sách
                </a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message_alert')
          <div class="row">
            <div class="col-md-9">
              <div class="md-3">
                <label for="name">Tên danh mục</label>
                <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control" placeholder="nhập tên danh mục">
                @if($errors->has('name'))
                <div class="text-danger">
                  {{ $errors->first('name')}}
                </div>
                @endif
              </div>

              <div class="md-3">
                <label for="metakey">Từ khóa</label>
                <textarea name="metakey" id="metakey" class="form-control" placeholder="Từ khóa tìm kiếm">{{old('metakey')}}</textarea>
                @if($errors->has('metakey'))
                <div class="text-danger">
                  {{ $errors->first('metakey')}}
                </div>
                @endif
              </div>

              <div class="md-3">
                <label for="metadesc">Mô tả</label>
                <textarea name="metadesc" id="metadesc" class="form-control" placeholder="Nhập mô tả">{{old('metadesc')}}</textarea>
                @if($errors->has('metadesc'))
                <div class="text-danger">
                  {{ $errors->first('metadesc')}}
                </div>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              {{-- <div class="md-3">
                <label for="parent_id">Danh mục cha</label>
                <select class="form-control" id="parent_id" name="parent_id">
                  <option value="0">--Cấp cha--</option>
                  {!! $html_parent_id !!}
                </select>
              </div>

              <div class="md-3">
                <label for="sort_order">Vị trí sắp xếp</label>
                <select class="form-control" id="sort_order" name="sort_order">
                  <option value="0">--Vị trí sắp xếp--</option>
                  {!! $html_sort_order !!}
                </select>
              </div> --}}

              {{-- <div class="md-3">
                <label for="image">Hình đại diện</label>
                <input type="file" name="image" value="{{old('image')}}" id="image" class="form-control" placeholder="nhập tên danh mục">
              </div> --}}
              
              <div class="md-3">
                <label for="status">Trạng thái</label>
                <select class="form-control" id="status" name="status">
                  <option value="1">Trạng thái xuất bản</option>
                  <option value="2">Trạng thái chưa xuất bản</option>                
                </select>
              </div>

            </div>
          </div>
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
</form>
@endsection