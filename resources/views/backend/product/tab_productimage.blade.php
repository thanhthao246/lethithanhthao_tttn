<div class="row">
    <div class="col-md-12">
      <div class="md-3">
        <label for="image">Hình ảnh</label>
        <input type="file" name="image" value="{{old('image')}}" id="image" class="form-control">
        @if($errors->has('image'))
        <div class="text-danger">
          {{ $errors->first('image')}}
        </div>
        @endif
      </div>
    </div>
  </div>