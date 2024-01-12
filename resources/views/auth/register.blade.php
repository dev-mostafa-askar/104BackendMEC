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
    <div class="card-body register-card-body">
    <p class="login-box-msg">Register a new membership</p>
    <form action="{{route('post-register')}}" method="post">
        @csrf
    <div class="input-group mb-3">
    <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="Full name">
    @if($errors->has('name'))
    <div style="color: red" class="error">{{ $errors->first('name') }}</div>
    @endif
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-user"></span>
    </div>
    </div>
    </div>
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
    @if($errors->has('password'))
    <div style="color: red" class="error">{{ $errors->first('password') }}</div>
  @endif
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
        @if($errors->has('password_confirmation'))
            <div style="color: red" class="error">{{ $errors->first('password_confirmation') }}</div>
        @endif
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-8">

    </div>

    <div class="col-4">
    <button type="submit" class="btn btn-primary btn-block">Register</button>
    </div>

    </div>
    </form>

    <div class="row">
        <a href="{{route('login')}}">Sing In</a>
    </div>

@endsection

