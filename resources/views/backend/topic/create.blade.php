@extends('layouts.admin')
@section('title', 'Thêm chủ đeè')
@section('conten')

    <form action="{{ route('topic.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>THÊM CHỦ ĐỀ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm chủ đề</li>
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
                                <button class="btn btn-sm btn-success" type="submit">
                                    <i class="fas fa-save">
                                        Lưu
                                    </i>
                                </button>
                                <a href="{{ route('topic.index') }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-reply"></i>
                                    Quay về danh sách
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.massage_alert')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="name">Tên chủ đề</label>
                                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                                        class="form-control" placeholder="Nhập tên chủ đề">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="metakey">Từ khóa</label>
                                    <textarea name="metakey" id="metakey" class="form-control" placeholder="Từ khóa tìm kiếm">{{ old('metakey') }}</textarea>
                                    @if ($errors->has('metakey'))
                                        <div class="text-danger">
                                            {{ $errors->first('metakey') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="metadesc">Mô tả</label>
                                    <textarea name="metadesc" id="metadesc" class="form-control" placeholder="Nhập mô tả">{{ old('metadesc') }}</textarea>
                                    @if ($errors->has('metadesc'))
                                        <div class="text-danger">
                                            {{ $errors->first('metadesc') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="parent_id">Chủ đề cha</label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="0">--Cấp cha--</option>
                                        {!! $html_parent_id !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sort_order">Vị trí sắp xếp</label>
                                    <select class="form-control" name="sort_order" id="sort_order">
                                        <option value="0">--Vị trí sắp xếp--</option>
                                        {!! $html_sort_order !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình đại diện</label>
                                    <input type="file" name="image" value="{{ old('image') }}" id="image"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Xuất bản</option>
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
