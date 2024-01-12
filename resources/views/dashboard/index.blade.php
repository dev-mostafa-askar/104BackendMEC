@extends('layout.admin-layout')
@section('header')



    <x-content-header title="Dashboard" />
@endsection
@section('content')
@if(Session::has('create-success'))
    <div class="alert alert-success">{{Session::get('create-success')}}</div>
@endif

@if(Session::has('update-success'))
    <div class="alert alert-info">{{Session::get('update-success')}}</div>
@endif


@if(Session::has('delete'))
    <div class="alert alert-danger">{{Session::get('delete')}}</div>
@endif

@endsection
