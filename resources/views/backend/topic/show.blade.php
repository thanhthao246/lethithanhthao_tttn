@extends('layouts.admin')
@section('title', 'Chi tiết bài viết')
@section('conten')

    @method('post')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết chủ đề</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Chi tiết chủ đề</li>
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
                            <a href="{{ route('topic.edit', ['topic' => $topic->id]) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>Sửa
                            </a>
                            <a href="{{ route('topic.delete', ['topic' => $topic->id]) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>Xóa
                            </a>
                            <a href="{{ route('topic.index') }}" class="btn btn-sm btn-info">
                                <i class="fas fa-reply"></i> Quay về danh sách
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
                            <td>id</td>
                            <td>{{ $topic->id }}</td>
                        </tr>
                        <tr>
                            <td>name</td>
                            <td>{{ $topic->name }}</td>
                        </tr>
                        <tr>
                            <td>slug</td>
                            <td>{{ $topic->slug }}</td>
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
