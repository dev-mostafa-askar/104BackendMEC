@extends('layout.admin-layout')
@section('header')
<x-content-header title="List all users" />
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

@if(Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>
@endif

<div class="card">
    <div class="card-header">
        <a href="/admin/create-user" class="btn btn-success btn-sm">Create new user</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                        aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $inx => $user)
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$inx+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="/admin/edit-user/{{$user->id}}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="/admin/delete-user/{{$user->id}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
