@extends('layout.admin-layout')
@section('header')
    <x-content-header title="Edit user informations" />
@endsection

@section('content')
<form action="/admin/update-user/{{$user->id}}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Enter Name">
          @if($errors->has('name'))
            <div style="color: red" class="error">{{ $errors->first('name') }}</div>
          @endif
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          @if($errors->has('email'))
              <div style="color: red" class="error">{{$errors->first('email')}}</div>
          @endif
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        @if($errors->has('password'))
            <div style="color: red" class="error">{{$errors->first('password')}}</div>
       @endif
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection
