@extends('layouts.admin')
@section('title', 'Chi tiết danh mục sản phẩm')
@section('conten')

    @method('post')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết bài viết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Chi tiết bài viết</li>
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
                            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>Sửa
                            </a>
                            <a href="{{ route('post.delete', ['post' => $post->id]) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-delete"></i>Xóa
                            </a>
                            <a href="{{ route('post.index') }}" class="btn btn-sm btn-info">
                                <i class="fas fa-trash"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Tên trường</td>
                            <td>Giá trị</td>
                        </tr>
                        <tr>
                            <td>Mã thương hiệu</td>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <td>Tên thương hiệu</td>
                            <td>{{ $post->name }}</td>
                        </tr>
                        <tr>
                            <td>slug</td>
                            <td>{{ $post->slug }}</td>
                        </tr>
                        <tr>
                            <td>Ngày đăng</td>
                            <td>{{ $post->create_id }}</td>
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
