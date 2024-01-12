@extends('layout.admin-layout')
@section('header')
    <x-content-header title="Create new post" />
@endsection

@section('content')
<div class="card card-primary">
    <form action="/admin/store-post" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Enter title">
            @if($errors->has('title'))
              <div style="color: red" class="error">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description"  class="form-control" id="description" placeholder="Enter description">{{old('description')}}</textarea>
            @if($errors->has('description'))
                <div style="color: red" class="error">{{$errors->first('description')}}</div>
            @endif
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" id="image" placeholder="image">
          @if($errors->has('image'))
              <div style="color: red" class="error">{{$errors->first('image')}}</div>
         @endif
        </div>


        <div class="form-group">
            <label for="category">Post category</label>
            <select class="form-control" name="category_id" id="category">
              <option disabled selected >Select post category</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->title }}</option>
              @endforeach
            </select>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
@endsection
