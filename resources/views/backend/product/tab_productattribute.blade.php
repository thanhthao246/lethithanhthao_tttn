<div class="row">
    <div class="col-md-6">
      <div class="md-3">
        <label for="names">Tên thuộc tính</label>
        <input type="text" name="names" value="{{old('names')}}" id="names" class="form-control" placeholder="nhập tên danh mục">
        @if($errors->has('names'))
        <div class="text-danger">
          {{ $errors->first('names')}}
        </div>
        @endif
      </div>
      <div class="md-3">
        <label for="metakeysss">Mô tả</label>
        <textarea name="metakeysss" id="metakeysss" class="form-control" placeholder="Từ khóa tìm kiếm">{{old('metakeysss')}}</textarea>
        @if($errors->has('metakeysss'))
        <div class="text-danger">
          {{ $errors->first('metakeysss')}}
        </div>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="md-3">
        <label for="namess">Giá trị</label>
        <input type="text" name="namess" value="{{old('namess')}}" id="namess" class="form-control" placeholder="nhập tên danh mục">
        @if($errors->has('namess'))
        <div class="text-danger">
          {{ $errors->first('namess')}}
        </div>
        @endif
      </div>
      <div class="md-3">
        <label for="metakeyss">Thứ tự</label>
        <textarea name="metakeyss" id="metakeyss" class="form-control" placeholder="Từ khóa tìm kiếm">{{old('metakeyss')}}</textarea>
        @if($errors->has('metakeyss'))
        <div class="text-danger">
          {{ $errors->first('metakeyss')}}
        </div>
        @endif
      </div>
    </div>
  </div>