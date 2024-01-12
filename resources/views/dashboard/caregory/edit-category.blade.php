@extends('layout.admin-layout')
@section('header')
    <x-content-header title="Edit category informations" />
@endsection

@section('content')
<div class="card card-primary">
    <form action="/admin/update-category/{{$category->id}}" method="Post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}" placeholder="Enter title">
            @if($errors->has('title'))
              <div style="color: red" class="error">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description"  class="form-control" id="description" placeholder="Enter description">{{$category->description}}</textarea>
            @if($errors->has('description'))
                <div style="color: red" class="error">{{$errors->first('description')}}</div>
            @endif
        </div>
        <div class="row d-flex justify-content-between">
          <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image" placeholder="image">
            @if($errors->has('image'))
            <div style="color: red" class="error">{{$errors->first('image')}}</div>
            @endif
          </div>
          <div class="form-group col-md-4">
            <label for="">Old image</label>
            <img src="{{asset($category->image)}}" style="width: 75px; object-fit: contain; " alt="">
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
@endsection
