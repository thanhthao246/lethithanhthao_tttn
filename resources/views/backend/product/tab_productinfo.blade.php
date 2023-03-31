<div class="row">
    <div class="col-md-9">
      <div class="md-3">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control" placeholder="nhập tên sản phẩm">
        @if($errors->has('name'))
        <div class="text-danger">
          {{ $errors->first('name')}}
        </div>
        @endif
      </div>

      <div class="md-3">
        <label for="detail">Chi tiết</label>
        <textarea name="detail" id="detail" class="form-control" placeholder="chi tiết sản phẩm">{{old('detail')}}</textarea>
        @if($errors->has('detail'))
        <div class="text-danger">
          {{ $errors->first('detail')}}
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
      <!--danh mục-->
      <div class="md-3">
        <label for="category_id">Chọn danh mục</label>
        <select class="form-control" id="category_id" name="category_id">
          <option value="">--Chọn danh mục--</option>
          {!! $html_category_id !!}
        </select>
      </div>
      <!--thương hiệu-->
      <div class="md-3">
        <label for="brand_id">Chọn thương hiệu</label>
        <select class="form-control" id="brand_id" name="brand_id">
          <option value="">--Chọn thương hiệu--</option>
          {!! $html_brand_id !!}
        </select>
      </div>

      <div class="md-3">
        <label for="price_buy">Giá bán</label>
        <input type="text" name="price_buy" value="{{old('price_buy')}}" id="price_buy" class="form-control" placeholder="giá bán">
        @if($errors->has('price_buy'))
        <div class="text-danger">
          {{ $errors->first('price_buy')}}
        </div>
        @endif
      </div>
      
      <div class="md-3">
        <label for="status">Trạng thái</label>
        <select class="form-control" id="status" name="status">
          <option value="1">Trạng thái xuất bản</option>
          <option value="2">Trạng thái chưa xuất bản</option>                
        </select>
      </div>

    </div>
  </div>