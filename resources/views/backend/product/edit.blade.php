@extends('layouts.admin')
@section('title', 'Cập nhật sản phẩm')
@section('conten')

    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>CẬP NHẬT SẢN PHẨM</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a>
                                </li>
                                <li class="breadcrumb-item active">cập nhật sản phẩm</li>
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
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                                    Lưu</button>
                                <a href="{{ route('product.index') }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-reply"></i> Quay về danh sách</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.message_alert')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="editproductinfo-tab" data-toggle="tab"
                                    data-target="#editproductinfo" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Thông tin sản phẩm</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productimage-tab" data-toggle="tab" data-target="#productimage"
                                    type="button" role="tab" aria-controls="productimage" aria-selected="false">Hình
                                    ảnh</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productattribute-tab" data-toggle="tab"
                                    data-target="#productattribute" type="button" role="tab"
                                    aria-controls="productattribute" aria-selected="false">Thuộc tính</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productsale-tab" data-toggle="tab" data-target="#productsale"
                                    type="button" role="tab" aria-controls="productsale" aria-selected="false">Khuyến
                                    mãi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productstore-tab" data-toggle="tab" data-target="#productstore"
                                    type="button" role="tab" aria-controls="productstore" aria-selected="false">Nhập
                                    sản phẩm</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active border-right border-bottom border-left p-3"
                                id="editproductinfo" role="tabpanel" aria-labelledby="editproductinfo-tab">
                                @includeIf('backend.product.tab_editproductinfo')
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productimage"
                                role="tabpanel" aria-labelledby="productimage-tab">
                                @includeIf('backend.product.tab_productimage')
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productattribute"
                                role="tabpanel" aria-labelledby="productattribute-tab">
                                @includeIf('backend.product.tab_productattribute')
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productsale"
                                role="tabpanel" aria-labelledby="productsale-tab">
                                @includeIf('backend.product.tab_productsale')
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productstore"
                                role="tabpanel" aria-labelledby="productstore-tab">
                                @includeIf('backend.product.tab_productstore')
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                                    Lưu</button>
                                <a href="{{ route('product.index') }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-trash"></i> Quay về danh sách</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </form>
@endsection
