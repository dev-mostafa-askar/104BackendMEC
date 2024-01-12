@extends('layout.auth-latout')
@section('content')
    <div class="card">
        @if(Session::has('create-success'))
    <div class="alert alert-success">{{Session::get('create-success')}}</div>
@endif

@if(Session::has('update-success'))
    <div class="alert alert-info">{{Session::get('update-success')}}</div>
@endif


@if(Session::has('delete'))
    <div class="alert alert-danger">{{Session::get('delete')}}</div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>
@endif
    <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="{{route('post.login')}}" method="post">
        @csrf
    <div class="input-group mb-3">
    <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email">
    @if($errors->has('email'))
    <div style="color: red" class="error">{{ $errors->first('email') }}</div>
  @endif
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-envelope"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password">
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-8">
    <div class="icheck-primary">
    <input type="checkbox" id="remember">
    <label for="remember">
    Remember Me
    </label>
    </div>
    </div>

    <div class="col-4">
    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </div>

    </div>
    </form>

    <div class="row">
        <a href="{{route('register')}}">Sing Up</a>
    </div>

    @endsection
