@extends('layouts.admin')
@section('title','Thêm danh mục sản phẩm')
@section('conten')

<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('post')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Thêm bài viết</h1>
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
            <div class="col-md-6">
              
            </div>
            <div class="col-md-6 text-right">
              <button type="submit" class="btn btn-sm btn-success">
             <i class="fas fa-save"></i>Lưu[Thêm]
              </button>
              <a href="{{route('post.index')}}" class="btn btn-sm btn-info">
                <i class="fas fa-trash"></i>Quay về danh sách
                 </a>
            </div>
          </div> 
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
           <div class="row">
              <div class="col-md-9">
                  <div class="mb-3">
                      <label for="title">Tên bài viết</label>
                      <input type="text" value="{{old('title')}}" name="title" id='title' class="form-control" placeholder="Nhập tên danh mục">
                      @if ($errors->has('title'))
                         <div class="text-danger">
                        {{$errors->first('title')}}  
                        </div> 
                      @endif
                      
                  </div>
                  <div class="mb-3">
                      <label for="metakey">Từ khóa</label>
                      <textarea name="metakey" id="metakey" class="form-control" placeholder="Từ khóa tìm kiếm" >{{old('metakey')}}</textarea>
                      @if ($errors->has('metakey'))
                         <div class="text-danger">
                          {{$errors->first('metakey')}}  
                         </div> 
                       @endif
                  </div>
                  <div class="mb-3">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="metadesc" id="metadesc" class="form-control" placeholder=" Nhập mô tả" >{{old('metadesc')}}</textarea>
                      @if ($errors->has('metadesc'))
                         <div class="text-danger">
                          {{$errors->first('metadesc')}}  
                         </div> 
                       @endif
                  </div>
                  <div class="mb-3">
                    <label for="detail">Chi tiết</label>
                    <textarea name="detail" id="detail" class="form-control" placeholder=" Nhập mô tả" >{{old('detail')}}</textarea>
                    @if ($errors->has('detail'))
                       <div class="text-danger">
                        {{$errors->first('detail')}}  
                       </div> 
                     @endif
                </div>
              </div>
              <div class="col-md-3">
                  
                  <div class="mb-3">
                      <label for="top_id">Chủ đề bài viết</label>
                      <select class="form-control" name="top_id" id="top_id">
                          <option value="0">--Chọn chủ đề--</option>
                           {!!$html_top_id!!}
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="image">Ảnh đại diện</label>
                      <input type="file" value="{{old('image')}}" name="image" id='image' class="form-control" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="mb-3">
                      <label for="status">Trạng thái</label>
                      <select class="form-control" name="status" id="status">
                          <option value="1">Xuất bản </option>
                          <option value="2">Chưa xuất bản</option>
                          
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