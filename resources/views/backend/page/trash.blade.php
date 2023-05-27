@extends('layouts.admin')
@section('title', 'tất cả danh mục sản phẩm')
@section('conten')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tất cả bài viết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Tất cả bài viết</li>
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
                            <button class="btn btn-sm btn-danger" type="submit">
                                <i class="far fa-calendar-times"> Xóa</i></button>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('post.index') }}" class="btn btn-sm btn-info">
                                <i class="fas fa-trash"></i>Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <table class="table table-bordered" id='myTable'>
                        <thead>
                            <tr>
                                <th style="width:10px" class="text-center">#</th>
                                <th style="width:90px">Hình</th>
                                <th style="width:100px">Chủ đề bài viết</th>
                                <th style="width:100px">Slug</th>
                                <th style="width:150px" class="text-center">Ngày đăng</th>
                                <th style="width:180px" class="text-center">Chức năng</th>
                                <th style="width:10px" class="text-center">id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_post as $post)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center"><img style="width:80px" class="img-fluid"
                                            src="{{ asset('images/post/' . $post->image) }}" alt="{{ $post->image }}"></td>
                                    <td class="text-center align-middle">{{ $post->top_id }}</td>
                                    <td class="text-center align-middle">{{ $post->slug }}</td>
                                    <td class="text-center align-middle">{{ $post->created_at }}</td>
                                    <td class="text-center">

                                        <a href="{{ route('post.restore', ['post' => $post->id]) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-undo"></i></a>
                                        <a href="{{ route('post.destroy', ['post' => $post->id]) }}"
                                            class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                    <td class="text-center">{{ $post->id }}</td>

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
