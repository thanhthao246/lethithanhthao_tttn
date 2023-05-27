@extends('layouts.admin')
@section('title', 'tất cả bài viết')
@section('conten')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tất cả chủ đề</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Tất cả chủ đề</li>
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
                            <a href="{{ route('topic.create') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i>Thêm
                            </a>
                            <a href="{{ route('topic.trash') }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>Thùng rác
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th style="width:10px" class="text-center">#</th>
                                <th style="width:90px">Hình</th>
                                <th style="width:100px">Tên chủ đề</th>
                                <th style="width:100px">Slug</th>
                                <th style="width:150px" class="text-center">Ngày đăng</th>
                                <th style="width:180px" class="text-center">Chức năng</th>
                                <th style="width:10px" class="text-center">id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_topic as $topic)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center"><img style="width:80px" class="img-fluid"
                                            src="{{ asset('images/topic/' . $topic->image) }}" alt="{{ $topic->image }}">
                                    </td>
                                    <td class="text-center align-middle">{{ $topic->name }}</td>
                                    <td class="text-center align-middle">{{ $topic->slug }}</td>
                                    <td class="text-center align-middle">{{ $topic->created_at }}</td>
                                    <td class="text-center align-middle">
                                        @if ($topic->status == 1)
                                            <a href="{{ route('topic.status', ['topic' => $topic->id]) }}"
                                                class="btn btn-sm btn-success">
                                                <i class="fas fa-toggle-on"></i></a>
                                        @else
                                            <a href="{{ route('topic.status', ['topic' => $topic->id]) }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-toggle-off"></i></i></a>
                                        @endif
                                        <a href="{{ route('topic.edit', ['topic' => $topic->id]) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="{{ route('topic.show', ['topic' => $topic->id]) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="{{ route('topic.delete', ['topic' => $topic->id]) }}"
                                            class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                    <td class="text-center align-middle">{{ $topic->id }}</td>

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
